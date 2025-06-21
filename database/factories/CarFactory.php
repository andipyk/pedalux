<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'license_plate' => fake()->bothify('B #### ???'),
            'transmission_type' => fake()->randomElement(['Manual', 'Automatic']),
            'status' => 'Available',
        ];
    }
}
