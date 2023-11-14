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
        User::factory(20)->create();

        DB::table('users')->insert([
           [
               'name' => 'admin',
               'email' => 'admin@x.x',
               'phone' => 81111111110,
               'is_admin' => 1,
               'password' => Hash::make('00000000') // Восемь нулей (меньше восьми нельзя)
            ],
            [
                'name' => 'user-1',
                'email' => 'u1@x.x',
                'phone' => 81111111100,
                'is_admin' => 0,
                'password' => Hash::make('00000000') // Восемь нулей (меньше восьми нельзя)
            ],
       ]);
    }
}
