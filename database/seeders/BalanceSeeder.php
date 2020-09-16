<?php

namespace Database\Seeders;

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
        $bankMaster = \App\BankMaster::first();
        $bank = \App\Bank::first();


        $userBank = \App\UserBank::create([
            'user_id' => $user->id,
            'bank_master_id' => $bankMaster->id,
            'bank_account_number' => '29187687181',
            'bank_account_name' => 'Fatkul Nur Koirudin',
        ]);

        for ($i = 0; $i < 100; $i++) {
            $amount = rand(99000, 100000);
//            $uniqueCode = rand(100, 1000);
//            $totalAmount = $amount + $uniqueCode;

//            $trxWallet = \App\TransactionWallet::create([
//                'user_id' => $user->id,
//                'bank' => $bank,
//                'unique_code' => $uniqueCode,
//                'amount' => $amount,
//                'total_amount' => $totalAmount,
//                'status' => 2
//            ]);

            $trxWallet = \App\Services\TransactionWallet\TransactionWalletFactory::makeDeposit(
                $user,
                $bank,
                $userBank,
                $amount,
                \App\Enums\TransactionWalletEnum::STATUS_SUCCESS,
                'lorem imsum'
            );

//            $user = \App\User::first();
//            if (blank($user->balance)) {
//                $pb = $totalAmount;
//            } else {
//                $pb = ($user->balance + $totalAmount);
//            }
//
//            $balances = \App\Balances::create([
//                'user_id' => $user->id,
//                'type' => 1,
//                'amount' => $totalAmount,
//                'title' => \App\Enums\BalanceTitle::TRANSACTION_WALLET_DEPOSIT,
//                'trx_id' => $trxWallet->id,
//                'previous_balance' => $pb
//            ]);

            $balances = \App\Services\Balance\BalanceFactory::make(
                $user,
                \App\Enums\Balance::IN,
                $amount,
                \App\Enums\BalanceTitle::TRANSACTION_WALLET_DEPOSIT,
                '',
                $trxWallet->id
            );
        }

    }
}
