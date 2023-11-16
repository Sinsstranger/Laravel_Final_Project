<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Deal;
use App\Models\DealStatus;
use App\Models\Property;
use App\Models\User;

class DealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        Генерация завершенных сделок (даты в прошлом)
        */
        Deal::factory(30)
            ->finished()
            ->state(new Sequence(
                fn (Sequence $sequence) => ['property_id' => Property::all()->random()],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['tenant_id' => User::all()->random()],
            ))
            ->create();

        /*
        Генерация активных сделок (старт в прошлом, финиш - в будущем)
        */
        Deal::factory(30)
            ->active()
            ->state(new Sequence(
                ['status_id' => '2'],
                ['status_id' => '3'],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['property_id' => Property::all()->random()],
            ))
            ->state(new Sequence(
                fn (Sequence $sequence) => ['tenant_id' => User::all()->random()],
            ))
            ->create();
    }
}
