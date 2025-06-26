<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@seacatering.com',
            'phone_number' => '+6281234567890',
            'password' => Hash::make('admin123'), // Change this password!
            'role' => 'admin',
            'status' => 'active',
        ]);
    }
}
