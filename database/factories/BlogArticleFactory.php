<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'content' => fake()->paragraphs(5, true),
            'publish_date' => now(),
        ];
    }
}
