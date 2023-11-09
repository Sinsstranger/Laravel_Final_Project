<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('properties')->insert(
            $this->getData()
        );
    }



    private function getData(): array
    {
        $quantity = 120;
        $properties = [];
        for ($i = 0; $i <= $quantity; $i++) {
            $properties[] = [
                'title' => fake()->words(3, true),
                'category_id' => fake()->numberBetween(1, 8),
                'number_of_rooms' => fake()->numberBetween(1, 10),
                'number_of_guests' => fake()->numberBetween(1, 20),
                'description' => fake()->text(),
                'photo' => 'https://loremflickr.com/450/600/furniture,interior/all', // по ссылке генерируются случайные изображения с сайта flickr с ключевыми словами 'design' и 'interior'
                'price_per_day' => fake()->numberBetween(10000, 200000),
                'address_id' => fake()->numberBetween(1, 10),
                'user_id' => fake()->numberBetween(1, 3),
                'is_temporary_registration_possible' => fake()->boolean(),
                'daily_rent' => fake()->boolean(),
            ];
        }
        return $properties;
    }
}
