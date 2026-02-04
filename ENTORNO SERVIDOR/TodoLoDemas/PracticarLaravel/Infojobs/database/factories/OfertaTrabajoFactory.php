<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfertaTrabajo>
 */
class OfertaTrabajoFactory extends Factory
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
            'ubicacion' => fake()->city(),
            'empresa_id' => Empresa::inRandomOrder()->first()->id,
        ];
    }
}
