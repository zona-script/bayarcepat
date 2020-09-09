<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            [
                'bank_master_id' => 1,
                'bank_account_number' => '891739817181',
                'bank_account_name' => 'Fatkul Nur Koirudin',
                'note' => ''
            ],
            [
                'bank_master_id' => 3,
                'bank_account_number' => '29187687181',
                'bank_account_name' => 'Fatkul Nur Koirudin',
                'note' => ''
            ],
        ];

        $userBank = [];
        foreach ($banks as $bank)
        {
            $userBank = $bank;
            \App\Bank::create($bank);
        }
    }
}
