<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i= 0; $i < 10; $i++){
            \App\Models\Post::create([
            'user_id' => $faker->numberBetween(1, 10),
            'title' => $faker->sentence,
            'content' => $faker->paragraph,
            ]);
        }
    }
}
