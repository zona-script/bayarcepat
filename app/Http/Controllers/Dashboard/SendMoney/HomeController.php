<?php

namespace App\Http\Controllers\Dashboard\SendMoney;

use App\Http\Controllers\Controller;
use App\MoneyTransfer;
use App\Services\MoneyTransfer\MoneyTransferFactory;
use App\Services\MoneyTransfer\SendMoney;
use App\Services\TransactionWallet\TransactionWalletFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View | Response
     */
    public function index()
    {
        return Inertia::render('Dashboard/Sendmoney/Index');
        return view('dashboard.send-money.index');
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
     * @return array
     */
    public function store(Request $request)
    {
        $resultValidator = Validator::make($request->all(), [
            'username' => 'required|string|max:150',
            'amount' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        if ($resultValidator->fails()) {
            return [
                'status' => false,
                'message' => 'Gagal melakukan pengiriman uang',
                'data' => $request->all()
            ];
        }

        $user = Auth::user();
        $username = $request->username;
        $amount = (integer) $request->amount;

        if ($user->balance >= $amount) {
            $moneyTransfer = MoneyTransferFactory::make(
                $user,
                $username,
                $amount,
                $request->message
            );

            return [
                'status' => $moneyTransfer['status'],
                'message' => $moneyTransfer['message'],
                'data' => $moneyTransfer['data']
            ];
        }

        return [
            'status' => false,
            'message' => 'Saldo tidak mencukupi',
            'data' => $request->all()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
