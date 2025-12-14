<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!DB::table('users')->where('email', 'admin@example.com')->exists()) {
            $data = [
                'username' => 'admin',
                'nama_lengkap' => 'Administrator',
                'email' => 'admin@example.com',
                'no_hp' => '081111111111',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (Schema::hasColumn('users', 'role')) {
                $data['role'] = 'admin';
            }

            DB::table('users')->insert($data);
        }
    }
}
