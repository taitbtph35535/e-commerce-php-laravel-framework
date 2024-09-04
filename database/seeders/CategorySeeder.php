<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('categories')->insert([
        //     'name' => 'Tiêu đề 1'
        // ]);
        for ($i = 0; $i < 5; $i++) {
            DB::table('categories')->insert([
                'name' => fake()->text(25)
            ]);
        }
    }
}
