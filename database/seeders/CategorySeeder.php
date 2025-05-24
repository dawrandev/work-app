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
                    'kk' => 'Santexnik'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Elektrik',
                    'ru' => 'Электрик',
                    'kk' => 'Elektrik'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Uy tozalash',
                    'ru' => 'Уборка дома',
                    'kk' => 'Üydi tazalaw'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Bog‘dorchilik ishlari',
                    'ru' => 'Садоводство',
                    'kk' => 'Baǵbanshılıq isleri'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Yuk tashish',
                    'ru' => 'Грузоперевозки',
                    'kk' => 'Júk tasıw'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Ta’mirlash ishlari',
                    'ru' => 'Ремонтные работы',
                    'kk' => 'Ońlaw jumısları'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Haydovchilik xizmati',
                    'ru' => 'Услуги водителя',
                    'kk' => 'Aydawshılıq xızmeti'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Mebel yig‘ish',
                    'ru' => 'Сборка мебели',
                    'kk' => 'Mebel jıynaw'
                ]),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
