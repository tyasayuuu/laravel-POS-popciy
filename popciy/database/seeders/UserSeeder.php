<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run() {
        User::insert([
            [
                'name' => 'superuser',
                'password' => Hash::make('password'),
                'role' => 'su'
            ],
            [
                'name' => 'admin1',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'kasir1',
                'password' => Hash::make('password'),
                'role' => 'kasir'
            ],
        ]);
    }
}

