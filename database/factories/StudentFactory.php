<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'address' => fake()->address(),
            'learning_progress' => fake()->randomElement(Student::getLearningProgress()),
        ];
    }
}
