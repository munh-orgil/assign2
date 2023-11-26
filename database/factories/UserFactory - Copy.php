<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'reg_no' => fake()->unique()->bothify('??########'),
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'address' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'phone_no' => fake()->phoneNumber(),
            'role' => fake()->numberBetween(0,2),
            'is_valid' => fake()->numberBetween(0,1),
            'balance' => fake()->numberBetween(0,50000),
            'validated_at' => now()->format('Y-m-d H:i:s'),
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
