<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consola>
 */
class ConsolaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => fake()->word(),
            'release_year' => fake()->year(),
            'price' => fake()->numberBetween(50, 130),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
