<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\CategoriaController;

// Rutas API
Route::get('/videojuegos', [VideojuegoController::class, 'index']);
Route::post('/videojuegos', [VideojuegoController::class, 'store']);
Route::get('/videojuegos/{id}', [VideojuegoController::class, 'show']);
Route::put('/videojuegos/{id}', [VideojuegoController::class, 'update']);
Route::delete('/videojuegos/{id}', [VideojuegoController::class, 'destroy']);

Route::get('/categorias', [CategoriaController::class, 'index']);
