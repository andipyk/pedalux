<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'payment_method' => fake()->randomElement(['Bank Transfer', 'E-Wallet', 'Credit Card']),
            'payment_status' => 'Paid',
            'payment_timestamp' => now(),
        ];
    }
}
