<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::inRandomOrder()->first(),
            'product_id'=>Product::inRandomOrder()->first(),
            'quantity' => fake()->numberBetween(1, 10),
            'total'=> fake()->randomFloat(2,0.1,1000),
        ];
    }
}
