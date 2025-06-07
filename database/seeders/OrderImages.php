<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderImages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'order_id' => 1,
                'image' => 'order1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1,
                'image' => 'order2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1,
                'image' => 'order3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ];

        DB::table('order_images')->insert($images);
    }
}
