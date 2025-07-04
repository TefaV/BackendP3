<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'categoria_id', 'precio'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
