<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PropertiesSeeder extends Seeder
{
    public function run(): void
    {
        /*
        Объявления от имени админа (для тестирования)
        */
        DB::table('properties')->insert([
                [
                    'title' => "Квартира",
                    'category_id' => 1,
                    'number_of_rooms' => 3,
                    'number_of_guests' => 5,
                    'description' => fake()->text(),
                    'photo' => json_encode(["https://loremflickr.com/450/600/furniture,interior/all"]), // по ссылке генерируются случайные изображения с сайта flickr с ключевыми словами 'design' и 'interior'
                    'price_per_day' => fake()->numberBetween(10000, 200000),
                    'address_id' => 1,
                    'user_id' => 1,
                    'is_temporary_registration_possible' => false,
                    'daily_rent' => false,
                ],
                [
                    'title' => "Дом",
                    'category_id' => 2,
                    'number_of_rooms' => 3,
                    'number_of_guests' => 5,
                    'description' => fake()->text(),
                    'photo' => json_encode(["https://loremflickr.com/450/600/furniture,interior/all"]), // по ссылке генерируются случайные изображения с сайта flickr с ключевыми словами 'design' и 'interior'
                    'price_per_day' => fake()->numberBetween(10000, 200000),
                    'address_id' => 2,
                    'user_id' => 1,
                    'is_temporary_registration_possible' => false,
                    'daily_rent' => true,
                ],
                [
                    'title' => "Квартира",
                    'category_id' => 1,
                    'number_of_rooms' => 2,
                    'number_of_guests' => 2,
                    'description' => fake()->text(),
                    'photo' => json_encode(["https://loremflickr.com/450/600/furniture,interior/all"]), // по ссылке генерируются случайные изображения с сайта flickr с ключевыми словами 'design' и 'interior'
                    'price_per_day' => fake()->numberBetween(10000, 200000),
                    'address_id' => 3,
                    'user_id' => 1,
                    'is_temporary_registration_possible' => true,
                    'daily_rent' => false,
                ],
                [
                    'title' => "Дом",
                    'category_id' => 2,
                    'number_of_rooms' => 3,
                    'number_of_guests' => 5,
                    'description' => fake()->text(),
                    'photo' => json_encode(["https://loremflickr.com/450/600/furniture,interior/all"]), // по ссылке генерируются случайные изображения с сайта flickr с ключевыми словами 'design' и 'interior'
                    'price_per_day' => fake()->numberBetween(10000, 200000),
                    'address_id' => 4,
                    'user_id' => 1,
                    'is_temporary_registration_possible' => true,
                    'daily_rent' => true,
                ],
            ]
        );

        /*
        Генерация случайных объявлений
        */
        DB::table('properties')->insert(
            $this->getData()
        );
    }

    private function getData(): array
    {
        $quantity = 80;
        $usersQty = User::all()->count();
        $properties = [];
        $categories = [
            1 => [
                'name' => 'Квартира',
                'minRooms' => 1,
                'maxRooms' => 4
            ],
            2 => [
                'name' => 'Дом',
                'minRooms' => 2,
                'maxRooms' => 8
            ],
        ];

        for ($i = 0; $i <= $quantity; $i++) {

            $category = fake()->numberBetween(1, 2);
            $rooms = fake()->numberBetween($categories[$category]['minRooms'], $categories[$category]['maxRooms']);

            $properties[] = [
                'title' => $categories[$category]['name'],
                'category_id' => $category,
                'number_of_rooms' => $rooms,
                'number_of_guests' => fake()->numberBetween($rooms, $rooms * 3),
                'description' => fake()->text(),
                'photo' => json_encode(['https://loremflickr.com/450/600/furniture,interior/all']), // по ссылке генерируются случайные изображения с сайта flickr с ключевыми словами 'design' и 'interior'
                'price_per_day' => fake()->numberBetween(10000, 200000),
                'address_id' => fake()->numberBetween(1, 100),
                'user_id' => fake()->numberBetween(1, $usersQty),
                'is_temporary_registration_possible' => fake()->boolean(),
                'daily_rent' => fake()->boolean(),
            ];
        }
        return $properties;
    }
}
