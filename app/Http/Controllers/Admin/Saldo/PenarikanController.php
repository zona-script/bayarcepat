<?php

namespace App\Http\Controllers\Admin\Saldo;

use App\Builders\BayarCepatBuilder;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('type', TransactionEnum::$typeBayarCepatPayWithdrawal)
            ->orderByDesc('id')
            ->get();

        return view('admin.saldo.penarikan.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::with('user')->findOrFail($id);

//        return $transaction;
        return view('admin.saldo.penarikan.detail', compact('transaction'));
    }

    public function update($id)
    {
        $transaction = Transaction::with('user')->findOrFail($id);

        BayarCepatBuilder::make()
            ->deposit($transaction);

        return redirect()
            ->route('web.admin.saldo.penarikan.show', $transaction->id)->with('success', 'update status sukses.');
    }
}
