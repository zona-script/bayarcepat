<?php

namespace App\Services\MoneyTransfer;

use App\Enums\Balance;
use App\Enums\BalanceTitle;
use App\Services\Balance\BalanceFactory;
use App\Models\User;

class MoneyTransfer
{
    protected $userSender;
    protected $userReceiver;
    protected $username; // money to this
    protected $amount;
    protected $message = '';
//    protected $type = 1;

    public function __construct($user, $usernameReceiver, $amount, $message = '')
    {
        $this->userSender = $user;
        $this->username = $usernameReceiver;
        $this->amount = $amount;
        $this->message = $message;

        $this->getUserFromUsername($usernameReceiver);
    }

    protected function getUserFromUsername($usernameReceiver)
    {
        $this->userReceiver = User::where('username', $usernameReceiver)->first();
    }

    // 1 = send money, 2 = received money
    protected function transaction()
    {
        if (blank($this->userReceiver)) {
            return $this->returnData(false, 'username tidak diketahui');
        }

        if (!is_integer($this->amount)) {
            return $this->returnData(false, 'Jumlah harus integer');
        }

        if ($this->amount > $this->userSender->balance) {
            return $this->returnData(false, 'Saldo tidak mencukupi.');
        }

        if ($this->userSender == $this->userReceiver) {
            return $this->returnData(false, 'Anda tidak boleh mengirim uang ke diri anda sendiri.');
        }


        $moneyTransfer = \App\Models\MoneyTransfer::create([
            'sender_user_id' => $this->userSender->id,
            'received_user_id' => $this->userReceiver->id,
            'amount' => $this->amount,
            'message' => $this->message,
        ]);

        // pengurangan saldo
        $balance = BalanceFactory::make(
            $this->userSender,
            Balance::OUT,
            $this->amount,
            BalanceTitle::MONEY_TRANSFER,
            '',
            $moneyTransfer->id
        );

        // tambah saldo
        $balance = BalanceFactory::make(
            $this->userReceiver,
            Balance::IN,
            $this->amount,
            BalanceTitle::MONEY_TRANSFER,
            '',
            $moneyTransfer->id
        );

        $message = 'transaksi berhasil dilakukan';

        return $this->returnData(true, $message, $moneyTransfer);

//        if ($this->type) {
//            $moneyTransfer = \App\MoneyTransfer::create([
//                'sender_user_id' => $this->userSender->id,
//                'received_user_id' => $this->userReceiver->id,
//                'type' => 1,
//                'amount' => $this->amount,
//                'message' => $this->message,
//            ]);
//
//            // pengurangan saldo
//            $balance = BalanceFactory::make(
//                $this->userSender,
//                Balance::OUT,
//                $this->amount,
//                BalanceTitle::MONEY_TRANSFER,
//                '',
//                $moneyTransfer->id
//            );
//
//            $message = 'transaksi berhasil dikirim';
//
//            return $this->returnData(true, $message, $moneyTransfer);
//        } else {
//            $moneyTransfer = \App\MoneyTransfer::create([
//                'sender_user_id' => $this->userSender->id,
//                'received_user_id' => $this->userSender->id,
//                'type' => 2,
//                'amount' => $this->amount,
//                'message' => $this->message,
//            ]);
//
//            // penambahan saldo
//            $balance = BalanceFactory::make(
//                $this->userSender,
//                Balance::IN,
//                $this->amount,
//                BalanceTitle::MONEY_TRANSFER,
//                '',
//                $moneyTransfer->id
//            );
//
//            $message = 'transaksi berhasil diterima';
//
//            return $this->returnData(true, $message, $moneyTransfer);
//        }
    }

    protected function returnData($status = true, $message = '', $data = [])
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }

    public function makeTransaction()
    {
        return $this->transaction();
    }
}
