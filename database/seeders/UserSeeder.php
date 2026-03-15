<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'full_name' => 'Admin User',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'phone_number' => '9800000000',
                'gender' => 'male',
                'address' => 'Admin Address',
                'status' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Test User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'phone_number' => '9811111111',
                'gender' => 'female',
                'address' => 'User Address',
                'status' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
