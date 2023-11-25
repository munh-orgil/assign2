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
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(10),
            'author' => 'Мөнх-Оргил',
            'picture' => NULL,
            'published_date' => $this->faker->date(),
            'page_count' => $this->faker->numberBetween(100, 300),
            'remaining_count' => $this->faker->numberBetween(0, 100),
        ];
    }
}
