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
                    'uz' => 'Santexnik',
                    'ru' => 'Сантехник',
                    'kr' => 'Santexnik'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Elektrik',
                    'ru' => 'Электрик',
                    'kr' => 'Elektrik'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Uy tozalash',
                    'ru' => 'Уборка дома',
                    'kr' => 'Üydi tazalaw'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Bog‘dorchilik ishlari',
                    'ru' => 'Садоводство',
                    'kr' => 'Baǵbanshılıq isleri'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Yuk tashish',
                    'ru' => 'Грузоперевозки',
                    'kr' => 'Júk tasıw'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Ta’mirlash ishlari',
                    'ru' => 'Ремонтные работы',
                    'kr' => 'Ońlaw jumısları'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Haydovchilik xizmati',
                    'ru' => 'Услуги водителя',
                    'kr' => 'Aydawshılıq xızmeti'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Mebel yig‘ish',
                    'ru' => 'Сборка мебели',
                    'kr' => 'Mebel jıynaw'
                ]),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
