<?php

namespace Database\Seeders;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'user_id' => 3,
                'category_id' => 1, // Transport
                'subcategory_id' => 1, // Haydovchi
                'type_id' => 1, // Doimiy ish
                'district_id' => 17, // Nukus shahri
                'employment_type_id' => 1, // To'liq vaqtli
                'phone' => '901234567',
                'title' => 'Tajribali haydovchi kerak',
                'salary_from' => '3000000',
                'salary_to' => '4500000',
                'deadline' => Carbon::now()->addDays(30),
                'description' => 'Bizning kompaniyamizga tajribali haydovchi kerak. 3 yildan ortiq tajriba talab qilinadi. B toifadagi prava bo\'lishi shart. Ish vaqti 9:00-18:00.',
                'address' => 'Nukus shahri, Amir Temur ko\'chasi 25-uy',
                'latitude' => 42.4531,
                'longitude' => 59.6103,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 4,
                'category_id' => 2, // Qurilish
                'subcategory_id' => 7, // Santexnik
                'type_id' => 1, // Doimiy ish
                'district_id' => 8, // Nukus tumani
                'employment_type_id' => 1, // To'liq vaqtli
                'phone' => '902345678',
                'title' => 'Malakali santexnik ishga taklif qilinadi',
                'salary_from' => '2500000',
                'salary_to' => '3800000',
                'deadline' => Carbon::now()->addDays(25),
                'description' => 'Qurilish kompaniyasiga malakali santexnik kerak. Suv-kanalizatsiya tizimlarini o\'rnatish va ta\'mirlash bo\'yicha tajriba talab qilinadi. Barcha qurollar kompaniya tomonidan beriladi.',
                'address' => 'Nukus tumani, Mustaqillik MFY',
                'latitude' => 42.4631,
                'longitude' => 59.6203,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 5,
                'category_id' => 3, // Restoran
                'subcategory_id' => 13, // Oshpaz
                'type_id' => 1, // Doimiy ish
                'district_id' => 17, // Nukus shahri
                'employment_type_id' => 1, // To'liq vaqtli
                'phone' => '903456789',
                'title' => 'Milliy taomlar oshpazi kerak',
                'salary_from' => '2800000',
                'salary_to' => '4200000',
                'deadline' => Carbon::now()->addDays(20),
                'description' => 'Yangi ochilgan restoraniga milliy taomlar tayyorlash bo\'yicha tajribali oshpaz kerak. Palov, manti, lag\'mon va boshqa milliy taomlarini mukammal tayyorlay olishi shart.',
                'address' => 'Nukus shahri, Navoi ko\'chasi 15-uy',
                'latitude' => 42.4431,
                'longitude' => 59.6003,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 6,
                'category_id' => 5, // Ta'lim
                'subcategory_id' => 23, // O'qituvchi
                'type_id' => 1, // Doimiy ish
                'district_id' => 2, // Beruniy tumani
                'employment_type_id' => 1, // To'liq vaqtli
                'phone' => '904567890',
                'title' => 'Ingliz tili o\'qituvchisi kerak',
                'salary_from' => '3500000',
                'salary_to' => '5000000',
                'deadline' => Carbon::now()->addDays(35),
                'description' => 'Xususiy o\'quv markaziga ingliz tili o\'qituvchisi kerak. IELTS/CEFR sertifikati bo\'lishi afzallik. Yoshlar bilan ishlash tajribasi bo\'lishi shart. Zamonaviy o\'qitish metodlari bilishi kerak.',
                'address' => 'Beruniy tumani, Markaz ko\'chasi 8-uy',
                'latitude' => 41.6275,
                'longitude' => 60.7587,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 7,
                'category_id' => 6, // Chakana savdo
                'subcategory_id' => 29, // Sotuvchi
                'type_id' => 2, // Vaqtinchalik ish
                'district_id' => 17, // Nukus shahri
                'employment_type_id' => 2, // Yarim vaqtli
                'phone' => '905678901',
                'title' => 'Do\'kon sotuvchisi (yarim stavka)',
                'salary_from' => '1800000',
                'salary_to' => '2500000',
                'deadline' => Carbon::now()->addDays(15),
                'description' => 'Kichik do\'konimizga yarim stavkaga sotuvchi kerak. Ish vaqti 14:00-20:00. Mijozlar bilan muomala qilish ko\'nikmalari bo\'lishi kerak. Talabalar uchun qulay.',
                'address' => 'Nukus shahri, Dustlik ko\'chasi 32-uy',
                'latitude' => 42.4731,
                'longitude' => 59.6303,
                'status' => 'active',
                'approval_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 8,
                'category_id' => 9, // IT
                'subcategory_id' => 44, // Programmist
                'type_id' => 1, // Doimiy ish
                'district_id' => 17, // Nukus shahri
                'employment_type_id' => 1, // To'liq vaqtli
                'phone' => '906789012',
                'title' => 'PHP Laravel dasturchi kerak',
                'salary_from' => '8000000',
                'salary_to' => '12000000',
                'deadline' => Carbon::now()->addDays(40),
                'description' => 'IT kompaniyasiga PHP Laravel framework bo\'yicha tajribali dasturchi kerak. 2+ yil tajriba, MySQL, JavaScript bilishi shart. Vue.js bilishi afzallik. Remote ishlash imkoniyati bor.',
                'address' => 'Nukus shahri, IT Park, 1-qavat',
                'latitude' => 42.4831,
                'longitude' => 59.6403,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'category_id' => 4, // Mehmonxona
                'subcategory_id' => 18, // Qabulxona xodimi
                'type_id' => 1, // Doimiy ish
                'district_id' => 17, // Nukus shahri
                'employment_type_id' => 1, // To'liq vaqtli
                'phone' => '907890123',
                'title' => 'Hotel resepsheni xodimi',
                'salary_from' => '2200000',
                'salary_to' => '3000000',
                'deadline' => Carbon::now()->addDays(28),
                'description' => 'Mehmonxonaga qabulxona xodimi kerak. Ingliz va rus tillarini bilishi shart. Kompyuter dasturlari bilan ishlash ko\'nikmalari. Smenali ish rejimi.',
                'address' => 'Nukus shahri, Doslik Hotel, 1-qavat',
                'latitude' => 42.4331,
                'longitude' => 59.5903,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 4,
                'category_id' => 8, // Tibbiyot
                'subcategory_id' => 40, // Sanitarka
                'type_id' => 1, // Doimiy ish
                'district_id' => 20, // Toʻrtkoʻl shahri
                'employment_type_id' => 1, // To'liq vaqtli
                'phone' => '908901234',
                'title' => 'Poliklinikaga sanitarka kerak',
                'salary_from' => '1500000',
                'salary_to' => '2000000',
                'deadline' => Carbon::now()->addDays(22),
                'description' => 'Poliklinikaga sanitarka kerak. Tibbiy muassasada ishlash tajribasi bo\'lishi afzallik. Javobgarlik va halollik muhim. Ish vaqti 8:00-17:00.',
                'address' => 'Toʻrtkoʻl shahri, Poliklinika ko\'chasi 5-uy',
                'latitude' => 41.5464,
                'longitude' => 60.3475,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 5,
                'category_id' => 1, // Transport
                'subcategory_id' => 6, // Kuryer
                'type_id' => 2, // Vaqtinchalik ish
                'district_id' => 17, // Nukus shahri
                'employment_type_id' => 3, // Shartnoma
                'phone' => '909012345',
                'title' => 'Ovqat yetkazish kuryeri',
                'salary_from' => '2000000',
                'salary_to' => '3500000',
                'deadline' => Carbon::now()->addDays(18),
                'description' => 'Ovqat yetkazish xizmatiga kuryer kerak. O\'z motortsikli bo\'lishi shart. Shahardagi yo\'llarni yaxshi bilishi kerak. Kun davomida va kechqurun ishlash.',
                'address' => 'Nukus shahri, Yosh Avlod ko\'chasi 12-uy',
                'latitude' => 42.4631,
                'longitude' => 59.6103,
                'status' => 'active',
                'approval_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 6,
                'category_id' => 7, // Uy xodimlari
                'subcategory_id' => 35, // Uy tozalovchi
                'type_id' => 2, // Vaqtinchalik ish
                'district_id' => 19, // Beruniy shahri
                'employment_type_id' => 2, // Yarim vaqtli
                'phone' => '900123456',
                'title' => 'Uy farroshi (haftada 3 kun)',
                'salary_from' => '1200000',
                'salary_to' => '1800000',
                'deadline' => Carbon::now()->addDays(12),
                'description' => 'Xususiy uyga farrosh kerak. Haftada 3 kun, har kuni 4 soatdan. Tozalash vositalari beriladi. Ishonchli va mas\'uliyatli bo\'lishi shart.',
                'address' => 'Beruniy shahri, Guliston MFY, 25-uy',
                'latitude' => 41.6375,
                'longitude' => 60.7687,
                'status' => 'active',
                'approval_status' => 'approved',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('jobs')->insert($jobs);
    }
}
