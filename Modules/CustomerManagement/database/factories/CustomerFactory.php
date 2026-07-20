<?php

namespace Modules\CustomerManagement\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\CustomerManagement\Models\Customer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
       return [
            'name'   => fake()->name(),
            'mobile' => fake()->unique()->numerify('017########'),
            'email'  => fake()->unique()->safeEmail(),
        ];
    }
}

