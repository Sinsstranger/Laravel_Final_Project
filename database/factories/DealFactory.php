<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rent_starts_at' => fake()->dateTimeBetween('-1 month', '+1 day'),
            'rent_ends_at' => fake()->dateTimeBetween('+1 day', '+1 year'),
            'property_id' => '1',
            'tenant_id' => '1',
            'rent_costs' => '1000',
            'status_id' => '1',
        ];
    }
}
