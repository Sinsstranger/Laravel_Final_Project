<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(20)->create();
        
        DB::table('users')->insert([
           [
               'name' => 'admin',
               'email' => 'admin@x.x',
               'is_admin' => 1,
               'password' => Hash::make('00000000') // Восемь нулей (меньше восьми нельзя)
           ],          
       ]);
    }
}
