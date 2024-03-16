<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Decide how many products you want to create
        $numberOfProducts = 50;

        for ($i = 0; $i < $numberOfProducts; $i++) {
            DB::table('products')->insert([
                'name' => $faker->words(3, true), // Generates a string of 3 words
                'description' => $faker->sentence(10), // Generates a sentence of 10 words
                'price' => $faker->randomFloat(2, 5, 150), // Generates a random float number
                'quantity' => $faker->numberBetween(10, 100), // Generates a random number
                'category_id' => $faker->numberBetween(1, 10), // Adjust the range based on your actual categories
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
