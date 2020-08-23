<?php

namespace App\Services\MoneyTransfer;

use App\User;

abstract class MoneyTransfer
{
    protected $user;
    protected $userFromUsername;
    protected $username; // money to this
    protected $amount;
    protected $message = '';

    public function __construct($user, $username, $amount, $message = '')
    {
        $this->user = $user;
        $this->username = $username;
        $this->amount = $amount;
        $this->message = $message;

        $this->userFromUsername($username);
    }

    protected function userFromUsername($username)
    {
        $this->userFromUsername = User::where('username', $username)->first();
    }

    // 1 = send money, 2 = received money
    protected function transaction($type = '1')
    {
        if (blank($this->userFromUsername)) {
            return $this->returnData(false, 'username tidak diketahui');
        }

        if (!is_integer($this->amount)) {
            return $this->returnData(false, 'Jumlah harus integer');
        }

        if ($type == 1) {
            $moneyTransfer = \App\MoneyTransfer::create([
                'sender_user_id' => $this->user->id,
                'received_user_id' => $this->userFromUsername->id,
                'type' => 1,
                'amount' => $this->amount,
                'message' => $this->message,
            ]);
            $message = 'transaksi berhasil dikirim';

            return $this->returnData(true, $message, $moneyTransfer);
        } else {
            $moneyTransfer = \App\MoneyTransfer::create([
                'sender_user_id' => $this->user->id,
                'received_user_id' => $this->userFromUsername->id,
                'type' => 2,
                'amount' => $this->amount,
                'message' => $this->message,
            ]);
            $message = 'transaksi berhasil dikirim';

            return $this->returnData(true, $message, $moneyTransfer);
        }
    }

    protected function returnData($status = true, $message = '', $data = [])
    {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }
}
