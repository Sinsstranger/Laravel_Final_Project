<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Address;

class AddressesSeeder extends Seeder
{
    public function run(): void
    {
        Address::factory()
            ->count(100)
            ->create();
    }
}
