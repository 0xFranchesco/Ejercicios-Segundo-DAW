<?php

namespace Database\Seeders;

use App\Models\Especulador;
use App\Models\User;
use App\Models\Zulo;
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
        Especulador::factory(10)->create();

        $zulos = Zulo::factory(20)->create();
        $users = User::factory(10)->create();

        foreach ($zulos as $zulo) {
            $interesadosAleatorios = $users->random(5);
            $zulo->interesados()->attach($interesadosAleatorios);
        }
       
    }
}
