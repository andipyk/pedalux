<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(4, 5),
            'comment' => fake()->paragraph(2),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
