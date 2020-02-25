<?php

namespace App\Http\Controllers\Dashboard;

use App\Builders\BayarCepatBuilder;
use App\Enums\BayarCepatPayEnum;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\JavaH2H\JavaH2HBuilder;
use App\Jobs\ProcessSendMessagetoTelegram;
use App\Telegram\TelegramBuilder;
use App\Traits\TelegramTrait;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    use TelegramTrait;

    public function index()
    {
        return view('dashboard.transaksi.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'product_code' => 'required',
            'phone_number' => 'required',
        ]);
        $phoneNumber = $request->input('phone_number');

        $product = $this->getProduct($request);
        $validateProduct = $this->validateProductCode($product);
        if (!blank($validateProduct)) {
            return $validateProduct;
        }

        $validatePrice = $this->validatePrice($product);
        if (!blank($validatePrice)) {
            return $validatePrice;
        }

        // informasi transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'type ' => TransactionEnum::$typeProduct,
            'phone_number' => $request->input('phone_number'),
            'value' => $product['price'],
            'information' => TransactionEnum::makeForProduct(
                $phoneNumber,
                $product,
                false,
                $request->input('id_customer', '')
            )
        ]);

        // pembayaran
        BayarCepatBuilder::make()
            ->payment($transaction);

        // permintaan request pembelian
        switch ($request->type) {
            case 'data':
            case 'pulsa':
            case 'ewallet':
            case 'gift-card':
            case 'pulsa-transfer':
            case 'telepon-dan-sms':
            case 'wifi':
                $result = JavaH2HBuilder::make()
                    ->buyPulsa($product['code'], $phoneNumber, $transaction->id);
                break;
            case 'pln':
                $result = JavaH2HBuilder::make()
                    ->buyPLN($product['code'], $request->input('id_customer'), $phoneNumber, $transaction->id);
                break;
            case 'voucher-game':
                $result = JavaH2HBuilder::make()
                    ->buyGame($product['code'], $phoneNumber, $transaction->id);
                break;
            default:
                $result = collect([]);
        }

        $transaction->message = $result;
        $transaction->save();


        /*
         * Mengirim ke telegram
         * */
        dispatch(new ProcessSendMessagetoTelegram($transaction));

        if ($result['result'] != 'success') {

            $transaction->status = TransactionEnum::$statusFailed;
            $transaction->save();


            // refund
            BayarCepatBuilder::make()
                ->refund($transaction);

            return redirect()
                ->route('web.dashboard.transaksi.index')
                ->with('error', "Transaksi anda tidak dapat diproses.");

        }

        return redirect()
            ->route('web.dashboard.transaksi.index')
            ->with('success', "Transaksi berhasil, silakan lihat di halaman riwayat transaksi untuk liat status transaksi");
    }

    /*
     * Ambil informasi produk
     * */
    private function getProduct(Request $request)
    {
        switch ($request->type) {
            case 'data':
            case 'pulsa':
            case 'ewallet':
            case 'gift-card':
            case 'pulsa-transfer':
            case 'telepon-dan-sms':
            case 'wifi':
                $request->validate([
                    'product_provider_sub' => 'required',
                    'product_operator_sub' => 'required',
                ]);

                $product = collect(JavaH2HBuilder::make()
                    ->findPulsa($request->input('product_code')))
                    ->toArray();

                break;

            case 'pln':
                $request->validate([
                    'id_customer' => 'required',
                    'product_operator_sub' => 'required',
                ]);

                $product = collect(JavaH2HBuilder::make()
                    ->findPLN($request->input('product_code')))
                    ->toArray();
                break;
            case 'voucher-game':
                $product = collect(JavaH2HBuilder::make()
                    ->findVoucherGame($request->input('product_code')))
                    ->toArray();

                break;
            default:
                $product = collect([]);
        }

        return $product;
    }

    // apakah kode product itu ada
    private function validateProductCode($product)
    {
        if (blank($product)) {
            return redirect()
                ->route('web.dashboard.transaksi.index')
                ->with('error', "Produk Tidak ditemukan");
        }

        return null;
    }

    // cek saldo
    // apakah saldonya cukup untuk membeli produknya
    private function validatePrice($product)
    {
        $user = Auth::user();
        if ($user['balance'] < $product['price']) {
            return redirect()
                ->route('web.dashboard.transaksi.index')
                ->with('error', "Transaksi Tidak di Proses, Karena Saldo anda kurang.");
        }

        return null;
    }
}
