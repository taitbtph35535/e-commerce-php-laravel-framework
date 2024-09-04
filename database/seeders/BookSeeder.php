<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => fake()->text(25),
                'thumbnail' => fake()->imageUrl(),
                'author' => fake()->text(),
                'publisher' => fake()->text(),
                'Publication' => fake()->dateTime(),
                'Price' => fake()->randomFloat(3, 10, 100),
                // 'Price' => fake()->,
                'Quantity' => fake()->randomNumber(2),
                'Category_id' => rand(102, 106)
            ]);
        }

    }
}
