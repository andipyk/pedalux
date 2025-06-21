<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    public function definition(): array
    {
        $startTime = fake()->dateTimeBetween('+1 day', '+1 month');
        return [
            'start_time' => $startTime,
            'end_time' => (clone $startTime)->modify('+2 hours'),
            'session_status' => fake()->randomElement(['available', 'booked']),
            'instructor_notes' => fake()->sentence(),
        ];
    }
}
