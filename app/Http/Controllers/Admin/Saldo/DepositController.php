<?php

namespace App\Http\Controllers\Admin\Saldo;

use App\Builders\BayarCepatBuilder;
use App\Enums\BayarCepatPayEnum;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('type', TransactionEnum::$typeBayarCepatPayDeposit)
            ->orderByDesc('id')
            ->get();

        return view('admin.saldo.deposit.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::with('user')->findOrFail($id);

//        return $transaction;
        return view('admin.saldo.deposit.detail', compact('transaction'));
    }

    public function update($id)
    {
        $transaction = Transaction::with('user')
            ->findOrFail($id);

        BayarCepatBuilder::make($transaction->user_id)
            ->deposit($transaction);

        return redirect()
            ->route('web.admin.saldo.deposit.show', $transaction->id)->with('success', 'update sudah sukses.');
    }
}
