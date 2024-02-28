<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
           [
               'name' => 'admin',
               'first_name' => 'Иван',
               'last_name' => 'Иванов',
               'email' => 'admin@x.x',
               'phone' => 81111111110,
               'avatar' => 'https://loremflickr.com/320/240/cat/all',
               'is_admin' => 1,
               'password' => Hash::make('00000000') // Восемь нулей (меньше восьми нельзя)
            ],
            [
                'name' => 'user-1',
                'first_name' => 'Сергей',
                'last_name' => 'Петров',
                'email' => 'user@x.x',
                'phone' => 81111111100,
                'avatar' => 'https://loremflickr.com/320/240/cat/all',
                'is_admin' => 0,
                'password' => Hash::make('00000000') // Восемь нулей (меньше восьми нельзя)
            ],
       ]);

       User::factory()
            ->count(200)
            ->create();
    }
}
