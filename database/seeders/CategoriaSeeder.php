<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['nombre' => 'Acción']);
        Categoria::create(['nombre' => 'Aventura']);
        Categoria::create(['nombre' => 'RPG']);
    }
}
