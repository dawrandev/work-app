<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => json_encode([
                    'uz' => 'Transport',
                    'ru' => 'Транспорт',
                    'kr' => 'Transport'
                ]),
                'icon' => 'lni lni-car',
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qurilish',
                    'ru' => 'Строительство',
                    'kr' => 'Qurılıs'
                ]),
                'icon' => 'lni lni-bricks',
            ],
            [
                'name' => json_encode([
                    'uz' => 'Restoran',
                    'ru' => 'Ресторан',
                    'kr' => 'Restoran'
                ]),
                'icon' => 'lni lni-restaurant',
            ],
            [
                'name' => json_encode([
                    'uz' => 'Mehmonxona',
                    'ru' => 'Гостиница',
                    'kr' => 'Miymanxana'
                ]),
                'icon' => 'lni lni-apartment',
            ],
            [
                'name' => json_encode([
                    'uz' => 'Ta\'lim',
                    'ru' => 'Образование',
                    'kr' => 'Tálim'
                ]),
                'icon' => 'lni lni-graduation',
            ],
            [
                'name' => json_encode([
                    'uz' => 'Chakana savdo',
                    'ru' => 'Розничная торговля',
                    'kr' => 'Sawda satıw'
                ]),
                'icon' => 'lni lni-cart',
            ],
            [
                'name' => json_encode([
                    'uz' => 'Uy xodimlari',
                    'ru' => 'Домашний персонал',
                    'kr' => 'Úy xizmetshileri'
                ]),
                'icon' => 'lni lni-home',
            ],
            [
                'name' => json_encode([
                    'uz' => 'Tibbiyot',
                    'ru' => 'Медицина',
                    'kr' => 'Meditsina'
                ]),
                'icon' => 'lni lni-sthethoscope',
            ],
            [
                'name' => json_encode([
                    'uz' => 'IT',
                    'ru' => 'Айти',
                    'kr' => 'IT'
                ]),
                'icon' => 'lni lni-code-alt',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
