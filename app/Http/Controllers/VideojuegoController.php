<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    public function index()
    {
        return Videojuego::with('categoria')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric'
        ]);

        return Videojuego::create($validated);
    }

    public function show($id)
    {
        return Videojuego::with('categoria')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $videojuego = Videojuego::findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric'
        ]);

        $videojuego->update($validated);
        return $videojuego;
    }

    public function destroy($id)
    {
        $videojuego = Videojuego::findOrFail($id);
        $videojuego->delete();
        return response()->json(['message' => 'Eliminado correctamente']);
    }
}
