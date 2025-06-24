<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employment_types')->insert([
            [
                'id' => 1,
                'name' => json_encode([
                    'uz' => 'To\'liq vaqtli',
                    'ru' => 'Полный рабочий день',
                    'kr' => 'Tolıq waqıtlı'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => json_encode([
                    'uz' => 'Yarim vaqtli',
                    'ru' => 'Неполный рабочий день',
                    'kr' => 'Yarım waqıtlı'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => json_encode([
                    'uz' => 'Shartnoma',
                    'ru' => 'Контракт',
                    'kr' => 'Shartnama'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => json_encode([
                    'uz' => 'Frilanser',
                    'ru' => 'Фриланс',
                    'kr' => 'Frilanser'
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
