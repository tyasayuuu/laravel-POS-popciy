<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HmUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('hm_user')->insert([
            [
                'id'       => 1,
                'name'     => 'super user',
                'email'    => 'su@gmail.com',
                'password' => Hash::make('pos'),  // password 'pos'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'       => 2,
                'name'     => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'       => 3,
                'name'     => 'kasir',
                'email'    => 'kasir@gmail.com',
                'password' => Hash::make('kasir'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
