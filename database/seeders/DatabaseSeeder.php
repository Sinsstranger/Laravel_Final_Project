<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            AddressesSeeder::class,
            CategoriesSeeder::class,
            PropertiesSeeder::class,
            DealStatusesSeeder::class,
            DealsSeeder::class,
        ]);
    }
}
