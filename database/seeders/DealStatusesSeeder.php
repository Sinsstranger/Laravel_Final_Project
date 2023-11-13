<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DealStatus;

class DealStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('deal_statuses')->insert([
        //     'name' => 'test-status-1'
        // ]);
        DealStatus::factory()
            ->count(3)
            ->create();
    }
}
