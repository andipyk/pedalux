<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'booking_date' => fake()->dateTimeBetween('-1 month', 'now'),
            'booking_status' => fake()->randomElement(['pending_payment', 'confirmed', 'cancelled']),
            'total_amount' => 0,
        ];
    }
}
