<?php

namespace App\Services\MoneyTransfer;

abstract class MoneyTransfer
{
    protected $user;
    protected $username; // money to this
    protected $amount;
    protected $message = '';

    public function __construct($user, $username, $amount, $message = '')
    {
        $this->user = $user;
        $this->username = $username;
        $this->amount = $amount;
        $this->message = $message;
    }

    private function transactionWallet($type = )
}
