<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasok>
 */
class PemasokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Mingyu', 'San', 'Aliza', 'Irus']),
            'contact' => fake()->randomElement(['081245365768', '081324576489', '082189543767', '083125476358']),
            'address' => fake()->randomElement(['Korea', 'Cipanas', 'Bandung', 'Jakarta'])
        ];
    }
}
