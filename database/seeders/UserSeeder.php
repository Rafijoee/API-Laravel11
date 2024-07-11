<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i= 0; $i < 10; $i++){
            \App\Models\User::create([
                'username' => $faker->username,
                'email' => $faker->email,
                'password' => crypt('password', ''),
            ]);
        }
    }
}
