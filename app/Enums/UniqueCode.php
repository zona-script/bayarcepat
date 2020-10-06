<?php


namespace App\Enums;


use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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

    public static function providerPanel()
    {
        $randomValue = rand(1, 999);
        $result = md5(Carbon::now()->toDateTimeString() . ' ' . Str::random(16). ' ' . $randomValue);
        $result = Str::limit($result, 50);

        return $result;
    }
}
