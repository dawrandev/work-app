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
                    'kr' => 'Amudarya rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Beruniy tumani',
                    'ru' => 'Беруни район',
                    'kr' => 'Beruniy rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Boʻzatov tumani',
                    'ru' => 'Бозатов район',
                    'kr' => 'Bozataw rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Chimboy tumani',
                    'ru' => 'Чимбай район',
                    'kr' => 'Shımbay rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Ellikqalʼa tumani',
                    'ru' => 'Элликкала район',
                    'kr' => 'Ellikqala rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Kegeyli tumani',
                    'ru' => 'Кегейли район',
                    'kr' => 'Kegeyli rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Moʻynoq tumani',
                    'ru' => 'Муйнак район',
                    'kr' => 'Moynaq rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Nukus tumani',
                    'ru' => 'Нукус район',
                    'kr' => 'Nókis rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qanlikoʻl tumani',
                    'ru' => 'Канлыкуль район',
                    'kr' => 'Qanlıkól rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qoʻngʻirot tumani',
                    'ru' => 'Кунград район',
                    'kr' => 'Qońırat rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qoraoʻzak tumani',
                    'ru' => 'Караузяк район',
                    'kr' => 'Qaraózek rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Shoʻmanoy tumani',
                    'ru' => 'Шуманай район',
                    'kr' => 'Shomanay rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Taxtakoʻpir tumani',
                    'ru' => 'Тахтакупыр район',
                    'kr' => 'Taxtakópir rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Taxiatosh tumani',
                    'ru' => 'Тахиаташ район',
                    'kr' => 'Taqıyatash rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Toʻrtkoʻl tumani',
                    'ru' => 'Турткуль район',
                    'kr' => 'Tórtkúl rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Xoʻjayli tumani',
                    'ru' => 'Ходжейли район',
                    'kr' => 'Xojeli rayonı'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Nukus shahri',
                    'ru' => 'Город Нукус',
                    'kr' => 'Nókis qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Taxiatosh shahri',
                    'ru' => 'Город Тахиаташ',
                    'kr' => 'Taqıyatash qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Beruniy shahri',
                    'ru' => 'Город Беруни',
                    'kr' => 'Beruniy qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Toʻrtkoʻl shahri',
                    'ru' => 'Город Турткуль',
                    'kr' => 'Tórtkúl qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qoʻngʻirot shahri',
                    'ru' => 'Город Кунград',
                    'kr' => 'Qońırat qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Xoʻjayli shahri',
                    'ru' => 'Город Ходжейли',
                    'kr' => 'Xojeli qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Chimboy shahri',
                    'ru' => 'Город Чимбай',
                    'kr' => 'Shımbay qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Moʻynoq shahri',
                    'ru' => 'Город Муйнак',
                    'kr' => 'Moynaq qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Amudaryo shahri',
                    'ru' => 'Город Амударья',
                    'kr' => 'Amudarya qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Kegeyli shahri',
                    'ru' => 'Город Кегейли',
                    'kr' => 'Kegeyli qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Shumanay shahri',
                    'ru' => 'Город Шуманай',
                    'kr' => 'Shomanay qalası'
                ]),
            ],
            [
                'name' => json_encode([
                    'uz' => 'Qanlikoʻl shahri',
                    'ru' => 'Город Канлыкуль',
                    'kr' => 'Qanlıkól qalası'
                ]),
            ],
        ];

        DB::table('districts')->insert($districts);
    }
}
