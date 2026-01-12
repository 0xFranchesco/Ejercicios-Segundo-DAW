<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'synopsis' => fake()->paragraph(3),
            'developer' => fake()->company(),
            'publisher' => fake()->company(),
            'release_year' => fake()->year(),
            'genre_id' => Genre::inRandomOrder()->first()->id,
        ];
    }
}
