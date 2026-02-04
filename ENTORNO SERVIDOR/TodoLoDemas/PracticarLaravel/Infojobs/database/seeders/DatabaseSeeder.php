<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\OfertaTrabajo;
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
        Empresa::factory(5)->create();
        $ofertasTrabajo = OfertaTrabajo::factory(10)->create();
        $users = User::factory(10)->create();
        
        foreach($ofertasTrabajo as $oferta){
            $candidatosAleatorios = $users->random(5);
            $oferta->user()->attach($candidatosAleatorios);
        }

    }
      
}
