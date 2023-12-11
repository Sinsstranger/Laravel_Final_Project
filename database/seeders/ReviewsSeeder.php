<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::factory()->count(120)->create();
        Review::factory()->count(30)->create([
            'property_id' => '3',
        ]);
        Review::factory()->count(5)->create([
            'author_id' => '1',
        ]);
    }
}
