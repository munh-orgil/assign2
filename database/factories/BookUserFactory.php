<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookUser>
 */
class BookUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'book_id' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->numberBetween(0, 3),
            'created_at' => $this->faker->date(),
            'received_at' => $this->faker->date(),
            'expire_at' => $this->faker->date(),
        ];
    }
}
