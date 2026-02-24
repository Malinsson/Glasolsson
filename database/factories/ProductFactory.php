<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'name' => fake()->unique()->word(),
            'color' => fake()->word(),
            'material' => fake()->word(),
            'description' => fake()->sentences(1, true),
            'price' => fake()->randomFloat(2, 500, 5000),
            'category_id' => fake()->randomElement(Category::pluck('id')),
        ];
    }
}
