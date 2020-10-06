<?php

namespace App\Http\Controllers\Api\Balance;

use App\Models\Bank;
use App\Models\BankMaster;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Balance\DepositStore;
use App\Models\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return string
     */
    public function store(DepositStore $request)
    {
//        $bank = BankMaster::findOrFail($request->selected_bank_id);
        $bank = Bank::findOrFail($request->selected_bank_id);
        $userBank = UserBank::with('bankMaster')->findOrFail($request->selected_user_bank_id);

        $trxWallet = \App\Services\TransactionWallet\TransactionWalletFactory::makeDeposit(
            Auth::user(),
            $bank,
            $userBank,
            (integer) $request->amount,
            \App\Enums\TransactionWalletEnum::STATUS_SUCCESS,
            $request->notes
        );

        return response()
            ->json([
                'success' => true,
                'message' => 'Berhasil melakukan permintaan deposit, silakan buka halaman riwayat deposit/withdrawal untuk melihat instrukti.',
                'data' => $trxWallet
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
