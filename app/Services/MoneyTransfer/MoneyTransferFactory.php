<?php

namespace App\Services\MoneyTransfer;

class MoneyTransferFactory
{
    public static function make($userSender, $usernameReceiver, $amount, $message = '')
    {
        $moneyTransfer = new MoneyTransfer($userSender, $usernameReceiver, $amount, $message);
        $result = $moneyTransfer->makeTransaction();

//        $sendMoney = new SendMoney($userSender, $usernameReceiver, $amount, $message);
//        $result['send'] = $sendMoney->makeTransaction();
//        $receiveMoney = new ReceiveMoney($userSender, $usernameReceiver, $amount, $message);
//        $result['received'] = $receiveMoney->makeTransaction();

        return $result;
    }

    public static function history($user, $orderBy = 'id', $sortBy = 'desc')
    {
        return \App\Models\MoneyTransfer::where('sender_user_id', $user->id)
            ->where('received_user_id', $user->id)
            ->orderBy($orderBy, $sortBy)
            ->get();
    }
}
