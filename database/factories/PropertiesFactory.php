<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropertiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'category_id' => fake()->numberBetween(1, 8),
            'number_of_rooms' => fake()->numberBetween(1, 10),
            'number_of_guests' => fake()->numberBetween(1, 20),
            'description' => fake()->text(),
            'photo' => 'https://loremflickr.com/450/600/furniture,interior/all', // по ссылке генерируются случайные изображения с сайта flickr с ключевыми словами 'design' и 'interior'
            'price_per_day' => fake()->numberBetween(10000, 200000),
            'address_id' => fake()->numberBetween(1, 100),
            'user_id' => fake()->numberBetween(1, 3),
            'is_temporary_registration_possible' => fake()->boolean(),
            'daily_rent' => fake()->boolean(),
        ];
    }
}
