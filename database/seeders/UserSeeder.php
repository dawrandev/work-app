<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role' => 'user',
                'first_name' => 'Dawranbek',
                'last_name' => 'Sipatdinov',
                'phone' => '912731302',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'admin',
                'first_name' => 'Dawranbek',
                'last_name' => 'Sipatdinov',
                'phone' => '933651302',
                'password' => Hash::make(87654321),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('users')->insert($users);
    }
}
