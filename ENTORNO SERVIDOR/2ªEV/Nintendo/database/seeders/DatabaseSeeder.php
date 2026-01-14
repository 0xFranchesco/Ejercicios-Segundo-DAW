<?php

namespace Database\Seeders;

use App\Models\Consola;
use App\Models\Juegos;
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
        // User::factory(10)->create();

        User::factory(5)->create();
        Consola::factory(7)->create();
        Juegos::factory(10)->create();

    }
}
