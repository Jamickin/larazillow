<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'page' => fake()->numberBetween(1, 300),
        'chapter' => fake()->numberBetween(1, 100),
        'name' => fake()->sentence(4),
        'author' => fake()->name(),
        ];
    }
}