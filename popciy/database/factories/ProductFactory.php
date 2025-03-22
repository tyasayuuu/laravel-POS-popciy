<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Product;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = DB::table('categories')->inRandomOrder()->select('id')->first();
        return [
            'name' => fake()->word(),
            'price' => fake()->numberBetween(10000, 20000),
            'stock' => fake()->numberBetween(100, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
