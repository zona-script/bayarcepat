<?php


namespace App\Services\Balance;


class BalanceFactory
{
    // TYPE (1=IN, 2=OUT)
    public static function make($user, $type = 1, $amount = 0, $title = '', $note = '', $trxID = '', $information = '')
    {
        return (new Balance($user, $type, $amount, $title, $note, $trxID, $information))->create();
    }

    public static function getBalance($user)
    {
        return $user->balance;
    }

    public static function getPreviousBalance($user)
    {
        return (new PreviousBalance($user))->get();
    }
}
