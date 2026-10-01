<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);

        // Akun User Biasa
        User::create([
            'name'     => 'User Biasa',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('password123'),
            'role'     => 'user',
        ]);
    }
}