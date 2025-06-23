<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            DistrictSeeder::class,
            TypeSeeder::class,
            UserSeeder::class,
            SubCategorySeeder::class,
            JobSeeder::class,
        ]);
    }
}
