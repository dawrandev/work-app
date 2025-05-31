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
                    'uz' => 'uzoq muddatli',
                    'kr' => 'uzaq múddetli',
                    'ru' => 'долговременный'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'qisqa muddatli',
                    'kr' => 'qısqa múddetli',
                    'ru' => 'кратковременный'
                ]),
            ]
        ];

        DB::table('types')->insert($types);
    }
}
