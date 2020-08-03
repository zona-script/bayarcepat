<?php

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
            'admin', 'consumer', 'developer'
        ];

        foreach ($items as $item){
            \Spatie\Permission\Models\Role::create([
                'name' => $item
            ]);
        }
    }
}
