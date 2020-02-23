<?php

use App\BayarCepatPay;
use App\Enums\BayarCepatPayEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class BayarCepatPaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::firstOrFail();
        for ($i = 0; $i < 20; $i++) {
            $valueUnique =  500;
            $value = 100000;
            $valueTotal = $valueUnique + $value;

            $bank = [
                'bank_account_name' => 'Fatkul Nur Koirudin',
                'bank_name' => 'Bank Mandiri',
                'bank_account_number' => '8921219827121982',
                'value' => $valueTotal,
                'value_unique' => $valueUnique,
                'value_total' => $valueTotal
            ];

            $userBank = [
                'bank_account_name' => 'Fatkul Nur Koirudin',
                'bank_name' => 'Bank Mandiri',
                'bank_account_number' => '8921219827121982'
            ];

            $transaction = \App\Transaction::create([
                'user_id' => $user->id,
                'type' => \App\Enums\TransactionEnum::$typeBayarCepatPayDeposit,
                'message' => '',
                'information' => \App\Enums\TransactionEnum::makeDepositInformation($bank, $userBank),
                'status' => ($i  % 2 == 0 ? \App\Enums\TransactionEnum::$statusSuccess: \App\Enums\TransactionEnum::$statusWaitingPayment)
            ]);

            if ($transaction->status == \App\Enums\TransactionEnum::$statusSuccess) {

                $bayarCepatPayLatest  = BayarCepatPay::where('user_id', collect($user)['id'])
                    ->orderByDesc('id')
                    ->first();

                if (blank(optional($bayarCepatPayLatest)->balance)) {
                    $pbc = 0;
                } else {
                    $pbc = $bayarCepatPayLatest->balance;

                    $out = BayarCepatPay::where('user_id',  collect($user)['id'])
                        ->where('type', BayarCepatPayEnum::$typeOUT)
                        ->sum('value');
                    $in = BayarCepatPay::where('user_id',  collect($user)['id'])
                        ->where('type', BayarCepatPayEnum::$typeIN)
                        ->sum('value');

                    $pbc = ($in - $out);

//                    $pbc = \App\Builders\BayarCepatPayBuilder::make()->getBalance(collect($user)['id']);
                }

                $bayarCepatPay = new BayarCepatPay([
                    'user_id' => $user->id,
                    'type' => \App\Enums\BayarCepatPayEnum::$typeIN,
                    'value' => (int) $bank['value_total'],
                    'previous_balance' => $pbc,
                    'information' => $transaction->id
                ]);
                $bayarCepatPay->save();


//                if ($bayarCepatPayLatest) {
//                    $bayarCepatPay->save([
//                        'previous_balance' => $bayarCepatPayLatest->balance
//                    ]);
//                } else {
//                    $bayarCepatPay->save([
//                        'previous_balance' => '10'
//                    ]);
//                }
            }
        }

    }
}
