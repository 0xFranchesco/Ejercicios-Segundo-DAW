<?php

namespace Database\Factories;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->jobTitle(),
            'descripcion' => fake()->paragraph(),
            'duracion_horas' => fake()->numberBetween(2, 8),
            'profesor_id' => Profesor::inRandomOrder()->first()->id ?? Profesor::factory(),
        ];
    }
}
