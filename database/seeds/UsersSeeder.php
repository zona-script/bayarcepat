<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Fatkul Nur Koirudin',
            'username' => 'fatkulnurk',
            'email' => 'fatkulnurk@gmail.com',
            'phone_number' => '085607100255',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user->assignRole(\App\Enums\RoleEnum::getAll());
        unset($user);

        $user = User::create([
            'name' => 'Aminatus Sadiyah',
            'username' => 'aminatus',
            'email' => 'ami@dibumi.com',
            'phone_number' => '085000000000',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user->assignRole(\App\Enums\RoleEnum::getAll());
        unset($user);

        $user = User::create([
            'name' => 'Aku siapa hayoo',
            'username' => 'admin',
            'email' => 'admin@bayarcepat.com',
            'phone_number' => '085000000001',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user->assignRole(\App\Enums\RoleEnum::$roleAdmin);
        unset($user);

        $user = User::create([
            'name' => 'Aku siapa hayoo',
            'username' => 'developer',
            'email' => 'developer@bayarcepat.com',
            'phone_number' => '085000000002',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user->assignRole(\App\Enums\RoleEnum::$roleDeveloper);
        unset($user);

        $user = User::create([
            'name' => 'Aku siapa hayoo',
            'username' => 'reseller',
            'email' => 'reseller@bayarcepat.com',
            'phone_number' => '085000000003',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user->assignRole(\App\Enums\RoleEnum::$roleConsumer);
        unset($user);

        $user = User::create([
            'name' => 'Aku siapa hayoo',
            'username' => 'consumer',
            'email' => 'consumer@bayarcepat.com',
            'phone_number' => '085000000004',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user->assignRole(\App\Enums\RoleEnum::$roleDeveloper);
        unset($user);
    }
}
