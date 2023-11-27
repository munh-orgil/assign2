<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(2, true),
            'description' => fake()->paragraph(4),
            'author' => fake()->firstName(),
            'picture' => null,
            'published_date' => fake()->date(),
            'page_count' => fake()->numberBetween(100, 300),
            'remaining_count' => fake()->numberBetween(0, 40),
            'created_at' => now()->format('Y-m-d H:i:s'),
            'created_by' => fake()->numberBetween(1, 10),
            'updated_at' => now()->format('Y-m-d H:i:s'),
            'updated_by' => fake()->optional()->numberBetween(1, 10),
        ];
    }
}
