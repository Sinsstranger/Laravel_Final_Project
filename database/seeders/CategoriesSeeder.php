<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['title' => 'Квартира'],
            ['title' => 'Дом'],
            ['title' => 'Коттедж'],
            ['title' => 'Комната'],
            ['title' => 'Гостиница'],
            ['title' => 'Кемпинг'],
            ['title' => 'База отдыха'],
            ['title' => 'Хостел'],
        ]);
    }
}
