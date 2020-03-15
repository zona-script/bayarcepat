<?php

namespace App\Http\Controllers\Dashboard\Market;

use App\Builders\BayarCepatBuilder;
use App\CallbackResponse;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessSendMessagetoTelegram;
use App\Jobs\ProcessSendMessagetoTelegramFromMarket;
use App\Partners\Digiflazz\DigiflazzBuilder;
use App\Partners\Digiflazz\DigiflazzEnum;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrabayarController extends Controller
{
    public function index()
    {
        $products = DigiflazzBuilder::make()->getPrabayar();

        return view('dashboard.market.prabayar.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'phone_number' => 'required',
        ]);

        $productCode = $request->input('product_code');
        $phoneNumber = $request->input('phone_number');
        $product = collect(DigiflazzBuilder::make()
            ->prabayar($productCode)
            ->get()[0]);

        // validate if product not found
        $validateProductCode = $this->validateProductCode($product);
        if (!blank($validateProductCode)) {
            return $validateProductCode;
        }

        // validate if balance kurang
        $validatePrice = $this->validatePrice($product);
        if (!blank($validatePrice)) {
            return $validatePrice;
        }

        // informasi transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'type' => TransactionEnum::$typeMarket,
            'phone_number' => $phoneNumber,
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

//        $result = DigiflazzBuilder::make()->beli($productCode, $phoneNumber, collect($transaction)['id']);

        try {
            $result = DigiflazzBuilder::make()->beli($productCode, $phoneNumber, collect($transaction)['id']);
        } catch (\Exception $exception) {

            // @todo mengembalikan uang & status transaksinya dirubah jadi gagal
//            return $exception->getMessage();
//            return $result;
        }

        /*
         * Mengirim ke telegram
         * */
        dispatch(new ProcessSendMessagetoTelegramFromMarket($transaction));

        $rc = $result["data"]->rc;
        $dataResult = collect($result['data']);

        // save to callback
        $callbackResponse = new CallbackResponse([
//            'transaction_id' => $dataResult['ref_id'],
            'transaction_id' => $transaction->id,
            'status' => $dataResult['status']
        ]);
        $callbackResponse->data = $dataResult->toArray();
        $callbackResponse->save();

        if (DigiflazzEnum::whereInGagal($rc)) {
            $transaction->status = TransactionEnum::$statusFailed;
            $transaction->save();

            // refund
            BayarCepatBuilder::make()
                ->refund($transaction);

            return redirect()
                ->route('web.dashboard.market.prabayar.index')
                ->with('error', "Transaksi anda di market gagal. ");
        } elseif (DigiflazzEnum::whereInPending($rc)) {
            return redirect()
                ->route('web.dashboard.riwayat.show', $transaction->id)
                ->with('success', "Transaksi anda sedang di proses.");
        } elseif (DigiflazzEnum::whereInSuccess($rc)) {
            $transaction->status = TransactionEnum::$statusSuccess;
            $transaction->save();

            return redirect()
                ->route('web.dashboard.riwayat.show', $transaction->id)
                ->with('success', "Transaksi anda sukses.");
        }

        die('TERJADI KESALAHAN DI SISTEM, MOHON MENGHUBUNGI ADMIN DENGAN MENYERTAKAN URL & USERNAME/EMAIL AKUN ANDA.');
    }
    // apakah kode product itu ada
    private function validateProductCode($product)
    {
        if (blank($product)) {
            return redirect()
                ->route('web.dashboard.market.prabayar.index')
                ->with('error', "Produk Tidak ditemukan.");
        }

        return null;
    }

    // cek saldo
    // apakah saldonya cukup untuk membeli produknya
    private function validatePrice($product)
    {
        $product = collect($product);

        $user = Auth::user();
        if ($user['balance'] < $product['price']) {
            return redirect()
                ->route('web.dashboard.market.prabayar.index')
                ->with('error', "Transaksi Tidak di Proses, Karena Saldo anda kurang.");
        }

        return null;
    }
}
