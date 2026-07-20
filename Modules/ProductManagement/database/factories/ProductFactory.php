<?php

namespace Modules\ProductManagement\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ProductManagement\Models\Product;

class ProductFactory  extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'sku' => strtoupper(fake()->unique()->bothify('SKU-#####??')),
            'price' => fake()->randomFloat(2, 50, 5000),
            'quantity' => fake()->numberBetween(0, 500),
            'created_by' => 1, // Change if you have users seeded
        ];
    }
}

