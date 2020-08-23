<?php

namespace App\Services\MoneyTransfer;

class WalletFactory
{
    public static function make($user, $username, $amount, $message = '')
    {
        $sendMoney = new SendMoney($user, $username, $amount, $message);
        $sendMoney->makeTransaction();
        $receiveMoney = new ReceiveMoney($user, $username, $amount, $message);
        $receiveMoney->makeTransaction();
    }
}
