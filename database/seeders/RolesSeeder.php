<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'admin', 'buyer', 'developer'
        ];

        foreach ($items as $item){
            \Spatie\Permission\Models\Role::create([
                'name' => $item
            ]);
        }
    }
}
