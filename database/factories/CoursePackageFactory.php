<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CoursePackageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'package_name' => 'Package ' . fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->randomElement([500000, 750000, 1000000]),
            'total_hours' => fake()->randomElement([10, 15, 20]),
            'number_of_sessions' => fake()->randomElement([5, 8, 10]),
        ];
    }
}
