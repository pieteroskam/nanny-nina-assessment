<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => fake()->word(),
            'title' => fake()->words(5, true),
            'vendor'=>fake()->company(),
            'price'=>fake()->randomFloat(2,0.1,100),
            'rating'=>fake()->numberBetween(0,5)
        ];
    }
}
