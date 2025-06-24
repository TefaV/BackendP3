<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Videojuego;

class VideojuegoSeeder extends Seeder
{
    public function run(): void
    {
        Videojuego::create([
            'titulo' => 'Zelda',
            'categoria_id' => 2,
            'precio' => 59.99,
        ]);

        Videojuego::create([
            'titulo' => 'Dark Souls',
            'categoria_id' => 3,
            'precio' => 49.99,
        ]);
    }
}
