<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            [
                'category_id' => 1,
                'name' => [
                    'uz' => 'Haydovchi',
                    'ru' => 'Водитель',
                    'kr' => 'aydawshı'
                ],
            ],
            [
                'category_id' => 1,
                'name' => [
                    'uz' => 'Yuk tashuvchi',
                    'ru' => 'Грузоперевозчик',
                    'kr' => 'Yük tasıwshı'
                ],
            ],
            [
                'category_id' => 1,
                'name' => [
                    'uz' => 'Taksi',
                    'ru' => 'Такси',
                    'kr' => 'Taksi'
                ],
            ],
            [
                'category_id' => 2,
                'name' => [
                    'uz' => 'Santexnik',
                    'ru' => 'Сантехник',
                    'kr' => 'Santexnik'
                ],
            ],
            [
                'category_id' => 2,
                'name' => [
                    'uz' => 'Elektrik',
                    'ru' => 'Электрик',
                    'kr' => 'Elektrik'
                ],
            ],
            [
                'category_id' => 2,
                'name' => [
                    'uz' => 'Svarshik',
                    'ru' => 'Сварщик',
                    'kr' => 'Svarshik'
                ],
            ],
            [
                'category_id' => 3,
                'name' => [
                    'uz' => 'Oshpaz',
                    'ru' => 'Повар',
                    'kr' => 'Aspaz'
                ],
            ],
            [
                'category_id' => 3,
                'name' => [
                    'uz' => 'Ofitsiant',
                    'ru' => 'Официант',
                    'kr' => 'Ofitsiant'
                ],
            ],
            [
                'category_id' => 3,
                'name' => [
                    'uz' => 'Barmen',
                    'ru' => 'Бармен',
                    'kr' => 'Barmen'
                ],
            ],
            [
                'category_id' => 4,
                'name' => [
                    'uz' => 'Qabulxona xodimi',
                    'ru' => 'Сотрудник ресепшн',
                    'kr' => 'Qabulxana xızmetkeri'
                ],
            ],
            [
                'category_id' => 4,
                'name' => [
                    'uz' => 'Adminstrator',
                    'ru' => 'Администратор',
                    'kr' => 'Adminstrator'
                ],
            ],
            [
                'category_id' => 4,
                'name' => [
                    'uz' => 'Farrosh',
                    'ru' => 'уборщица',
                    'kr' => 'Tazalawshı'
                ],
            ],
            [
                'category_id' => 5,
                'name' => [
                    'uz' => 'O\'qituvchi',
                    'ru' => 'Учитель',
                    'kr' => "Oqıtıwshı"
                ],
            ],
            [
                'category_id' => 5,
                'name' => [
                    'uz' => 'Repititor',
                    'ru' => 'Репетитор',
                    'kr' => 'Repititor'
                ],
            ],
            [
                'category_id' => 5,
                'name' => [
                    'uz' => 'Tarbiyachi',
                    'ru' => 'Воспитатель',
                    'kr' => 'Tarbiyashı'
                ],
            ],
            [
                'category_id' => 6,
                'name' => [
                    'uz' => "Sotuvchi",
                    "ru" => "Продавец",
                    "kr" => "Satwshı"
                ],
            ],
            [
                'category_id' => 6,
                'name' => [
                    'uz' => "Operator/savdo menedjeri",
                    "ru" => "Оператор/менеджер по продажам",
                    "kr" => "Operator/sawda menedjeri"
                ],
            ],
            [
                'category_id' => 6,
                'name' => [
                    'uz' => "Kassir",
                    "ru" => "Кассир",
                    "kr" => "Kassir"
                ],
            ],
            [
                'category_id' => 6,
                'name' => [
                    'uz' => "savdo agenti",
                    "ru" => "Агент по продажам",
                    "kr" => "Sawda agenti"
                ],
            ],
            [
                'category_id' => 7,
                'name' => [
                    "uz" => "Uy tozalovchi",
                    "ru" => "Уборщица",
                    "kr" => "Úy tazalawshı"
                ],
            ],
            [
                'category_id' => 7,
                'name' => [
                    "uz" => "Enaga",
                    "ru" => "Няня",
                    "kr" => "Enege"
                ],
            ],
            [
                'category_id' => 8,
                'name' => [
                    "uz" => "Sanitarka",
                    "ru" => "Санитарка",
                    "kr" => "Sanitarka"
                ],
            ],
            [
                'category_id' => 8,
                'name' => [
                    "uz" => "Shifokor",
                    "ru" => "Врач",
                    "kr" => "Shifakor"
                ],
            ],
            [
                'category_id' => 8,
                'name' => [
                    "uz" => "Tish shifokori",
                    "ru" => "Стоматолог",
                    "kr" => "Tis doktorı"
                ],
            ],
            [
                'category_id' => 9,
                'name' => [
                    "uz" => "Programmist",
                    "ru" => "Программист",
                    "kr" => "Dasturchı"
                ],
            ],
            [
                'category_id' => 9,
                'name' => [
                    "uz" => "Web dizayner",
                    "ru" => "Веб-дизайнер",
                    "kr" => "Web dizayner"
                ],
            ],
            [
                'category_id' => 9,
                'name' => [
                    "uz" => "Call Center operator",
                    "ru" => "Оператор Call Center",
                    "kr" => "Call Center operatorı"
                ],
            ],
        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::create($subCategory);
        }
    }
}
