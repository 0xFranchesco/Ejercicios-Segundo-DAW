<?php

namespace Database\Factories;

use App\Models\Consola;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juegos>
 */
class JuegosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'developer' => fake()->sentence(2),
            'release_year' => fake()->year(),
            'price' => fake()->numberBetween(20, 80),
            'consola_id' => Consola::inRandomOrder()->first()->id,
        ];
    }
}
