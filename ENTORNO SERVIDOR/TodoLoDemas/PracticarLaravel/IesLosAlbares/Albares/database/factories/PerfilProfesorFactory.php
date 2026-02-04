<?php

namespace Database\Factories;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerfilProfesor>
 */
class PerfilProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'biografia' => fake()->paragraph() ,
            'experiencia_anios' => fake()->numberBetween(10, 40) , 
            'profesor_id' => Profesor::factory(),
        ];
    }


}
