<?php

namespace Database\Seeders;

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
                'user_id' => 1,
                'category_id' => 1,
                'type_id' => 2,
                'district_id' => 8, // Nukus tumani ID si
                'title' => "Vanna quvurini ta’mirlash",
                'description' => "Uydagi vanna quvurlarida suv sizib chiqmoqda. Santexnik kerak.",
                'salary_from' => '50000',
                'salary_to' => '70000',
                'deadline' => now()->addDays(2),
                'address' => "A.Qodiriy ko‘chasi 12-uy",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'type_id' => 1,
                'district_id' => 2, // Beruniy tumani ID si
                'title' => "Xonadondagi elektr simlarini almashtirish",
                'description' => "Eski elektr simlar xavfli holatda. Mutaxassis kerak.",
                'salary_from' => '150000',
                'salary_to' => '200000',
                'deadline' => now()->addDays(7),
                'address' => "Mustaqillik ko‘chasi 45-uy",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'type_id' => 2,
                'district_id' => 4, // Chimboy tumani ID si
                'title' => "1 xonali uy tozalash",
                'description' => "General tozalash. Shaxsiy vosita bilan kelsa yaxshi.",
                'salary_from' => '80000',
                'salary_to' => '100000',
                'deadline' => now()->addDay(),
                'address' => "Guliston MFY",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 4,
                'type_id' => 1,
                'district_id' => 13, // Sho'manoy tumani ID si
                'title' => "Bog‘dagi o‘simliklarni parvarish qilish",
                'description' => "Har kuni ertalab bog‘dagi gul va daraxtlarga qarov kerak.",
                'salary_from' => '30000',
                'salary_to' => '50000',
                'deadline' => now()->addMonth(),
                'address' => "G‘alaba ko‘chasi",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 5,
                'type_id' => 2,
                'district_id' => 15, // To‘rtko‘l tumani ID si
                'title' => "Mehmonxona mebellarini ko‘chirish",
                'description' => "4 ta odam kerak, 3-qavatdan mebellarni olib chiqish kerak.",
                'salary_from' => '200000',
                'salary_to' => '250000',
                'deadline' => now()->addDays(3),
                'address' => "Do‘stlik mahallasi",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'type_id' => 1,
                'district_id' => 13, // To‘rtko‘l tumani ID si
                'title' => "Mebellarini joylashtirish",
                'description' => "3 ta odam kerak, 3-qavatdan mebellarni olib chiqish kerak.",
                'salary_from' => '200000',
                'salary_to' => '250000',
                'deadline' => now()->addDays(3),
                'address' => "Do‘stlik mahallasi",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('jobs')->insert($jobs);
    }
}
