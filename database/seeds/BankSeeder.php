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
                'bank_name' => 'Bank Mandiri',
                'bank_account_number' => '891739817181',
                'bank_account_name' => 'Fatkul Nur Koirudin',
                'note' => '',
                'logo' => ''
            ],
            [
                'bank_name' => 'Bank Bri',
                'bank_account_number' => '398273982',
                'bank_account_name' => 'Fatkul Nur Koirudin',
                'note' => '',
                'logo' => ''
            ],
            [
                'bank_name' => 'Paypal #1',
                'bank_account_number' => 'pay@dibumi.com',
                'bank_account_name' => 'Fatkul Nur Koirudin',
                'note' => '',
                'logo' => '',
                'type' => 'paypal'
            ]
        ];

        foreach ($banks as $bank)
        {
            \App\Bank::create($bank);
        }
    }
}
