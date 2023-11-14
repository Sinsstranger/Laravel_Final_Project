<?php

namespace Database\Factories;
use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressesFactory extends Factory
{
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => fake()->country(),
            'place' => fake()->city(),
            'street' => fake()->streetName(),
            'house_number' => fake()->numberBetween(1, 123),
            'flat_number' => fake()->numberBetween(1, 300),
        ];
    }
}
