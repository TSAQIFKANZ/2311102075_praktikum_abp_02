<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            //
            'name' => fake()->words(2, true),
            'sku' => 'SKU-' . fake()->unique()->numberBetween(1000, 9999),
            'category' => fake()->randomElement(['Makanan', 'Minuman', 'Elektronik', 'ATK']),
            'price' => fake()->numberBetween(10000, 100000),
            'stock' => fake()->numberBetween(1, 50),
            'description' => fake()->sentence(),
        ];
    }
}
