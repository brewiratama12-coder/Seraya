<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!DB::table('users')->where('email', 'testuser@example.com')->exists()) {
            $data = [
                'username' => 'testuser',
                'nama_lengkap' => 'Test User',
                'email' => 'testuser@example.com',
                'no_hp' => '081234567890',
                'password' => Hash::make('secret123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // only include 'role' if column exists
            if (Schema::hasColumn('users', 'role')) {
                $data['role'] = 'user';
            }

            DB::table('users')->insert($data);
        }
    }
}
