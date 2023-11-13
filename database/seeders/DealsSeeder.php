<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Deal;
use App\Models\DealStatus;
use App\Models\Property;

class DealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deal::factory(20)
        ->state(new Sequence(
            fn (Sequence $sequence) => ['status_id' => DealStatus::all()->random()],
        ))
        ->state(new Sequence(
            fn (Sequence $sequence) => ['property_id' => Property::all()->random()],
        ))
        ->create();

        // DB::table('deals')->insert(
        //     $this->getData()
        // );
    }

    // private function getData(): array
    // {
    //     $quantity = 300;
    //     $deals = [];
    //     for ($i = 0; $i <= $quantity; $i++) {
    //         $deals[] = [
    //             'rent_starts_at' => fake()->dateTimeBetween('-1 month', '+1 day'),
    //             'rent_ends_at' => fake()->dateTimeBetween('+1 day', '+1 month'),
    //             'rent_costs' => fake()->numberBetween(10000, 120000),
    //         +    'status_id' => 1,
    //             'property_id' => fake()->numberBetween(1, 120),
    //             'tenant_id' => fake()->numberBetween(1, 20),
    //         ];
    //     }
    //     return $deals;
    // }
}
