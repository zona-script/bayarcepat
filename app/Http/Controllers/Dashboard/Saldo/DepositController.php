<?php

namespace App\Http\Controllers\Dashboard\Saldo;

use App\Bank;
use App\Enums\CurrencyRateEnum;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        return view('dashboard.saldo.deposit.index');
    }

    public function create(Request $request)
    {
        if ($request->input('type') == 'paypal') {
            return view('dashboard.saldo.deposit.paypal');
        }

        return view('dashboard.saldo.deposit.bank');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required',
            'amount_money' => 'required',
            'note' => 'nullable'
        ]);
        $bank = Bank::findOrFail($request->input('bank_id'));

        if ($request->input('type') == 'paypal') {
            $type = 'paypal';
            $amount = (int) $request->only('amount_money');
            $amount = ($amount / CurrencyRateEnum::live()['live_with_fee']);
            $fee = ceil($amount) * CurrencyRateEnum::$fee;
            $amount = $amount - $fee;
        } else {
            $amount = $request->only('amount_money');
        }

        // informasi transaksi
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'type' => TransactionEnum::$typeBayarCepatPayDeposit,
            'message' => $request->only('note'),
            'information' => $this->formatInformation($bank, $type, $this->formatCurrency($amount))
        ]);

        return redirect()
            ->route('web.dashboard.saldo.deposit.create')
            ->with('success', 'Pengajuan deposit anda sedang di proses. Buka halaman riwayat transaksi untuk melihat status deposit.');
    }

    private function formatInformation($bank,$type= 'bank', $amount)
    {
        return [
            'payment' => $bank,
            'type' => $type,
            'amount' => $amount,
        ];
    }

    private function formatCurrency($nominal, $currency = 'idr', $live = 1)
    {
        return [
            'nominal' => $nominal,
            'currency' => $currency,
            'live_price' => $live
        ];
    }
}
