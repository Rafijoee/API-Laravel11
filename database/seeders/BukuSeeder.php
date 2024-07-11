<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i= 0; $i < 10; $i++){
            \App\Models\Buku::create([
                'user_id' => 1,
                'judul' => $faker->sentence,
                'penulis' => $faker->name,
                'penerbit' => $faker->company,
                'tahun_terbit' => $faker->year,
            ]);
        }
    }
}
