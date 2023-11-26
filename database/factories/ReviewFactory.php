<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Property;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(1,5),
            'description' => fake()->text(),
            // 'author_id' => fake()->numberBetween(1,150),
            'author_id' => User::all()->random(),
            // 'property_id' => fake()->numberBetween(1,80),
            'property_id' => Property::all()->random(),
        ];
    }
}
