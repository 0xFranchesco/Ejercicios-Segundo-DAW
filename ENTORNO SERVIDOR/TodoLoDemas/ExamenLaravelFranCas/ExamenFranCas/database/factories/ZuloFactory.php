<?php

namespace Database\Factories;

use App\Models\Especulador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zulo>
 */
class ZuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(),
            'descripcion' => fake()->paragraph(),
            'ubicacion'=> fake()->streetAddress(),
            'precio' => fake()->numberBetween(200, 1000),
            'superficie' => fake()->numberBetween(30, 60),
            'especulador_id' => Especulador::inRandomOrder()->first()->id,
        ];
    }
}
