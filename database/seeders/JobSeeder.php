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
        // Job::create([
        //     'user_id' => 1,
        //     'category_id' => 1, // Haydovchi category
        //     'subcategory_id' => 1,
        //     'type_id' => 1,
        //     'empoyment_type_id' => 1,
        //     'district_id' => 1,
        //     'title' => 'Haydovchi kerak',
        //     'description' => 'Tajribali haydovchi kerak. Ish vaqti 9:00 dan 18:00 gacha.',
        //     'salary_from' => '3000000',
        //     'salary_to' => '4000000',
        //     'deadline' => now()->addDays(10),
        //     'address' => 'Toshkent shahar, Chilonzor tumani',
        // ]);

        // Job::create([
        //     'user_id' => 1,
        //     'category_id' => 2, // Elektrik category
        //     'subcategory_id' => 4,
        //     'type_id' => 2,
        //     'empoyment_type_id' => 2,
        //     'district_id' => 2,
        //     'title' => 'Elektrik kerak',
        //     'description' => 'Uy ichidagi elektr simlarini o‘rnatish uchun usta kerak.',
        //     'salary_from' => '3500000',
        //     'salary_to' => '4500000',
        //     'deadline' => now()->addDays(7),
        //     'address' => 'Toshkent shahar, Yakkasaroy tumani',
        // ]);
    }
}
