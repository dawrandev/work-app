<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobImages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobImages = [
            [
                'job_id' => 1,
                'image' => 'job1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_id' => 2,
                'image' => 'job2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('job_images')->insert($jobImages);
    }
}
