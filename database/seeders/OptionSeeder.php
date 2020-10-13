<?php

namespace Database\Seeders;


use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'prepaid', 'value' => true],
            ['name' => 'postpaid', 'value' => true],
            ['name' => 'smm', 'value' => true],
            ['name' => 'sendmoney', 'value' => true],
            ['name' => 'bank', 'value' => true],
            ['name' => 'deposit', 'value' => true],
            ['name' => 'withdrawal', 'value' => true],
            ['name' => 'api', 'value' => true],
            ['name' => 'register', 'value' => false],
        ];


        foreach ($data as $item) {
            Option::create($item);
        }
    }
}
