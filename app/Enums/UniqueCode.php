<?php


namespace App\Enums;


use App\Transaction;

class UniqueCode
{
    public function deposit()
    {
        $randomValue = rand(1, 999);

        $transaction = '';

        do {
            $transaction = Transaction::where('type', TransactionEnum::$typeBayarCepatPayDeposit)
                ->where('status', '!=', TransactionEnum::$statusSuccess)
                ->where('status', '!=', TransactionEnum::$statusFailed)
                ->where('status', '!=', TransactionEnum::$statusRefund)
                ->where('status', '!=', TransactionEnum::$statusCancel)
                ->first();
        } while(blank($transaction));

        return $randomValue;
    }
}
