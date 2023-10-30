<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('addresses')->insert(
            $this->getData()
        );
    }

    private function getData(): array
    {
        $quantity = 10;
        $addresses = [];
        for ($i = 0; $i <= $quantity; $i++) {
            $addresses[] = [
                'country' => fake()->country(),
                'place' => fake()->city(),
                'street' => fake()->streetName(),
                'house_number' => fake()->numberBetween(1, 123),
                'flat_number' => fake()->numberBetween(1, 300),
            ];
        }
        return $addresses;
    }


}

// [
            //     'category' => '',
            //     'country' => '',
            //     'place' => '',
            //     'street' => '',
            //     'house_number' => ,
            //     'flat' => ,
            //     'user_id' =>
            // ],
