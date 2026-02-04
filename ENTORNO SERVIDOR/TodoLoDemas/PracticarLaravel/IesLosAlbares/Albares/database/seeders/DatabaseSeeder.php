<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\PerfilProfesor;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PerfilProfesor::factory(10)->create();
        $categorias = Categoria::factory(8)->create();    
        $cursos = Curso::factory(10)->create();
        foreach($cursos as $curso){
            $categoriasAleatorias = $categorias->random(2);
            $curso->categorias()->attach($categoriasAleatorias);
        }
    }
}
