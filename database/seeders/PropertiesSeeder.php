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
        $quantity = 12;
        $properties = [];
        for ($i = 0; $i <= $quantity; $i++) {
            $properties[] = [
                'title' => "квартира " . fake()->numberBetween(1, 5) . "-комнатная",
                'description' => fake()->text(),
                'price_per_day' => fake()->randomFloat(2, 1000, 999999),
                'is_temporary_registration_possible' => fake()->boolean(),
                'address_id' => fake()->numberBetween(1, 10)
            ];
        }
        return $properties;
    }
}
