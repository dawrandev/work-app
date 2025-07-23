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
                    'kr' => 'Aydawshı'
                ],
            ],
            [
                'category_id' => 1,
                'name' => [
                    'uz' => 'Yuk tashuvchi',
                    'ru' => 'Грузоперевозчик',
                    'kr' => 'Júk tasıwshı'
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
                'category_id' => 1,
                'name' => [
                    'uz' => 'Avto mexanik',
                    'ru' => 'Автомеханик',
                    'kr' => 'Avto mexanik'
                ],
            ],
            [
                'category_id' => 1,
                'name' => [
                    'uz' => 'Avto yuvuvchi',
                    'ru' => 'Автомойщик',
                    'kr' => 'Avtomobil juwıwshı'
                ],
            ],
            [
                'category_id' => 1,
                'name' => [
                    'uz' => 'Kuryer',
                    'ru' => 'Курьер',
                    'kr' => 'Kúryer'
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
                'category_id' => 2,
                'name' => [
                    'uz' => 'G‘isht teruvchi',
                    'ru' => 'Каменщик',
                    'kr' => 'Gishtshı'
                ],
            ],
            [
                'category_id' => 2,
                'name' => [
                    'uz' => 'Bo‘yoqchi',
                    'ru' => 'Маляр',
                    'kr' => 'Boǵawshı'
                ],
            ],
            [
                'category_id' => 2,
                'name' => [
                    'uz' => 'Gips suvoqchi',
                    'ru' => 'Штукатур',
                    'kr' => 'Suwaqshı'
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
                'category_id' => 3,
                'name' => [
                    'uz' => 'Qadoqlovchi',
                    'ru' => 'Упаковщик',
                    'kr' => 'Qaplawshı'
                ],
            ],
            [
                'category_id' => 3,
                'name' => [
                    'uz' => 'Ovqat yetkazuvchi',
                    'ru' => 'Доставщик еды',
                    'kr' => 'Awqat jetkiziwshı'
                ],
            ],
            [
                'category_id' => 4,
                'name' => [
                    'uz' => 'Qabulxona xodimi',
                    'ru' => 'Сотрудник ресепшн',
                    'kr' => 'Qabıllawxana xızmetkeri'
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
                'category_id' => 4,
                'name' => [
                    'uz' => 'Xavfsizlik xodimi',
                    'ru' => 'Охранник',
                    'kr' => 'Qawipsizlik xızmetkeri'
                ],
            ],
            [
                'category_id' => 4,
                'name' => [
                    'uz' => 'Xona xizmatkori',
                    'ru' => 'Горничная',
                    'kr' => 'Bólme xızmetshisi'
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
                'category_id' => 5,
                'name' => [
                    'uz' => 'O‘quv markazi o‘qituvchisi',
                    'ru' => 'Преподаватель учебного центра',
                    'kr' => 'Oqıw ortalığı oqıtıwshısı'
                ],
            ],
            [
                'category_id' => 5,
                'name' => [
                    'uz' => 'Online dars beruvchi',
                    'ru' => 'Онлайн преподаватель',
                    'kr' => 'Online oqıtıwshı'
                ],
            ],
            [
                'category_id' => 6,
                'name' => [
                    'uz' => "Sotuvchi",
                    "ru" => "Продавец",
                    "kr" => "Satıwshı"
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
                'category_id' => 6,
                'name' => [
                    'uz' => 'Sklad xodimi',
                    'ru' => 'Складской работник',
                    'kr' => 'Qoraxana xızmetkeri'
                ],
            ],
            [
                'category_id' => 6,
                'name' => [
                    'uz' => 'Yetkazib beruvchi',
                    'ru' => 'Доставщик',
                    'kr' => 'Jetkiziwshı'
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
                'category_id' => 7,
                'name' => [
                    'uz' => 'Boǵbon',
                    'ru' => 'Садовник',
                    'kr' => 'Baǵban'
                ],
            ],
            [
                'category_id' => 7,
                'name' => [
                    'uz' => 'Uy oshpazi',
                    'ru' => 'Домашний повар',
                    'kr' => 'Úy aspazı'
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
                    "kr" => "Shıpaker"
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
                'category_id' => 8,
                'name' => [
                    'uz' => 'Tibbiy yordamchi',
                    'ru' => 'Медицинский помощник',
                    'kr' => 'Meditsinalıq járdemshi'
                ],
            ],
            [
                'category_id' => 8,
                'name' => [
                    'uz' => 'Laborant',
                    'ru' => 'Лаборант',
                    'kr' => 'Laborant'
                ],
            ],
            [
                'category_id' => 9,
                'name' => [
                    "uz" => "Programmist",
                    "ru" => "Программист",
                    "kr" => "Programmist"
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
            [
                'category_id' => 9,
                'name' => [
                    'uz' => 'Mobil ilova dasturchisi',
                    'ru' => 'Разработчик мобильных приложений',
                    'kr' => 'Mobil qosımsha programmist'
                ],
            ],
            [
                'category_id' => 9,
                'name' => [
                    'uz' => 'Texnik qo‘llab-quvvatlash',
                    'ru' => 'Техническая поддержка',
                    'kr' => 'Texnik qollaw'
                ],
            ],
        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::create($subCategory);
        }
    }
}
