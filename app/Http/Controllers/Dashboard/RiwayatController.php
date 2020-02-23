<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->orderByDesc('id')
            ->get();

//        return $transactions;
        return view('dashboard.laporan.index', compact('transactions'));
    }

    public function show($id, Request $request)
    {
        $transaction = Transaction::with('callbackResponse')->where('user_id', Auth::id())
            ->where('id', $id)
            ->first();

//        return $transaction;
        return view('dashboard.laporan.detail', compact('transaction'));
    }
}
