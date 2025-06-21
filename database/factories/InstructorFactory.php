<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'qualification' => 'Driving License A & B1',
            'specialization' => fake()->randomElement(['Manual', 'Automatic']),
            'average_rating' => fake()->randomFloat(1, 4, 5),
        ];
    }
}
