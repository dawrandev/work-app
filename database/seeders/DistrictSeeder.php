<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            [
                'name' => json_encode([
                    'uz' => 'Amudaryo tumani',
                    'ru' => 'Амударья район',
                    'kk' => 'Amudarya rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Beruniy tumani',
                    'ru' => 'Беруни район',
                    'kk' => 'Beruniy rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Boʻzatov tumani',
                    'ru' => 'Бозатов район',
                    'kk' => 'Bozatov rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Chimboy tumani',
                    'ru' => 'Чимбай район',
                    'kk' => 'Shımbay rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Ellikqalʼa tumani',
                    'ru' => 'Элликкала район',
                    'kk' => 'Ellikqala rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Kegeyli tumani',
                    'ru' => 'Кегейли район',
                    'kk' => 'Kegeyli rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Moʻynoq tumani',
                    'ru' => 'Муйнак район',
                    'kk' => 'Moynaq rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Nukus tumani',
                    'ru' => 'Нукус район',
                    'kk' => 'Nókis rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qanlikoʻl tumani',
                    'ru' => 'Канлыкуль район',
                    'kk' => 'Qanlıkól rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qoʻngʻirot tumani',
                    'ru' => 'Кунград район',
                    'kk' => 'Qońırat rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qoraoʻzak tumani',
                    'ru' => 'Караузяк район',
                    'kk' => 'Qaraózek rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Shoʻmanoy tumani',
                    'ru' => 'Шуманай район',
                    'kk' => 'Shomanay rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Taxtakoʻpir tumani',
                    'ru' => 'Тахтакупыр район',
                    'kk' => 'Taxtakópir rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Taxiatosh tumani',
                    'ru' => 'Тахиаташ район',
                    'kk' => 'Taqiyatas rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Toʻrtkoʻl tumani',
                    'ru' => 'Турткуль район',
                    'kk' => 'Tórtkúl rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Xoʻjayli tumani',
                    'ru' => 'Ходжейли район',
                    'kk' => 'Xojeli rayonı'
                ]),
            ],
        ];

        DB::table('districts')->insert($districts);
    }
}
