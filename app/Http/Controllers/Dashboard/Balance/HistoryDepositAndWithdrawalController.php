<?php

namespace App\Http\Controllers\Dashboard\Balance;

use App\Models\BankMaster;
use App\Http\Controllers\Controller;
use App\Models\TransactionWallet;
use App\Models\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HistoryDepositAndWithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $transactionWallets = TransactionWallet::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return Inertia::render('Dashboard/Balance/History/Index', [
            'transactionWallets' => $transactionWallets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trxWallet = TransactionWallet::findOrFail($id)
            ->where('user_id', Auth::id())->first();
        $userBankMaster = BankMaster::findOrFail($trxWallet->user_bank['bank_master_id']);

        return response()->view('dashboard.balance.history.show', compact('trxWallet', 'userBankMaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
