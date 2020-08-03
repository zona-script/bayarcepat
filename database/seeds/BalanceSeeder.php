<?php

use App\BayarCepatPay;
use App\Enums\BayarCepatPayEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::first();
        $bank = \App\Bank::first();
        for ($i = 0; $i < 100; $i++) {
            $amount = rand(99000, 100000);
            $uniqueCode = rand(100, 1000);
//            $amount = 99000;
//            $uniqueCode = 1000;
            $totalAmount = $amount + $uniqueCode;

            $trxWallet = \App\TransactionWallet::create([
                'user_id' => $user->id,
                'bank' => $bank,
                'unique_code' => $uniqueCode,
                'amount' => $amount,
                'total_amount' => $totalAmount,
                'status' => 2
            ]);

            $user = \App\User::first();
            if (blank($user->balance)) {
                $pb = $totalAmount;
            } else {
                $pb = ($user->balance + $totalAmount);
            }

            $balances = \App\Balances::create([
                'user_id' => $user->id,
                'type' => 1,
                'amount' => $totalAmount,
                'title' => \App\Services\BalanceTitle::TRANSACTION_WALLET_DEPOSIT,
                'trx_id' => $trxWallet->id,
                'previous_balance' => $pb
            ]);
        }

    }
}
