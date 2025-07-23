<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => json_encode([
                    'uz' => 'Doimiy ish',
                    'kr' => 'Dawamlı jumıs',
                    'ru' => 'Постоянная работа'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Vaqtinchalik ish',
                    'kr' => 'Waqtınshalıq jumıs',
                    'ru' => 'Временная работа'
                ]),
            ]
        ];

        DB::table('types')->insert($types);
    }
}
