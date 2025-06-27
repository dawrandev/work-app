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
                    'uz' => 'doimiy ish',
                    'kr' => 'dawamlı jumıs',
                    'ru' => 'постоянная работа'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'vaqtinchalik ish',
                    'kr' => 'waqtınshalıq jumıs',
                    'ru' => 'временная работа'
                ]),
            ]
        ];

        DB::table('types')->insert($types);
    }
}
