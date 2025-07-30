<?php
// database/factories/JobFactory.php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\District;
use App\Models\Type;
use App\Models\EmploymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => 1, // Test uchun hard-coded yoki factory bilan
            'subcategory_id' => 1,
            'district_id' => 1,
            'type_id' => 1,
            'employment_type_id' => 1,
            'phone' => fake()->numberBetween(900000000, 999999999),
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'salary_from' => fake()->numberBetween(1000000, 5000000),
            'salary_to' => fake()->numberBetween(5000000, 10000000),
            'deadline' => fake()->dateTimeBetween('now', '+30 days'),
            'address' => fake()->address(),
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'status' => 'active',
            'approval_status' => 'approved',
        ];
    }

    // Ma'lum user bilan job yaratish
    public function forUser(User $user)
    {
        return $this->state(fn(array $attributes) => [
            'user_id' => $user->id,
        ]);
    }

    // Pending status bilan
    public function pending()
    {
        return $this->state(fn(array $attributes) => [
            'approval_status' => 'pending',
        ]);
    }

    // Inactive status bilan
    public function inactive()
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'inactive',
        ]);
    }
}
