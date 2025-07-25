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
                'role' => 'admin',
                'image' => 'user-icon.png',
                'first_name' => 'Dawranbek',
                'last_name' => 'Sipatdinov',
                'phone' => '933651302',
                'password' => Hash::make(87654321),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Dawranbek',
                'last_name' => 'Sipatdinov',
                'phone' => '912731302',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Aydos',
                'last_name' => 'Oralbaev',
                'phone' => '907270630',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Abat',
                'last_name' => 'Jiyenbaev',
                'phone' => '990611470',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Jandos',
                'last_name' => 'Abdiganiev',
                'phone' => '934420441',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Islam',
                'last_name' => 'Mamutov',
                'phone' => '905751619',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Azizbek',
                'last_name' => 'Qayratdinov',
                'phone' => '500558100',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Muzaffar',
                'last_name' => 'Jumamuratov',
                'phone' => '947160516',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'image' => 'user-icon.png',
                'first_name' => 'Nargiza',
                'last_name' => 'Salieva',
                'phone' => '933691322',
                'password' => Hash::make(12345678),
                'remember_token' => Str::random(9),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('users')->insert($users);
    }
}
