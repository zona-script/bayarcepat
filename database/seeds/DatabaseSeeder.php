<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BankMasterSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BalanceSeeder::class);
//         $this->call(UsersTableSeeder::class);
    }
}
