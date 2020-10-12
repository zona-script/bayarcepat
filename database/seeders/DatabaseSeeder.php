<?php
namespace Database\Seeders;
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
        $this->call([
            OptionSeeder::class,
            BankMasterSeeder::class,
            RolesSeeder::class,
            BankSeeder::class,
            UsersTableSeeder::class,
            BalanceSeeder::class,
            ProviderPanelSeeder::class
        ]);
    }
}
