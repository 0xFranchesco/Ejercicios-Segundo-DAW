<?php

use App\Http\Controllers\ConsolaController;
use App\Http\Controllers\JuegosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//--------------------JUEGOS----------------------------------
Route::get('/juegos', [JuegosController::class, 'index']);
Route::get('/juegos/{juego}', [JuegosController::class, 'show']);
Route::patch('/juegos/{juego}', [JuegosController::class, 'update']);
Route::post('/juegos', [JuegosController::class, 'store']);
Route::delete('/juegos/{juego}', [JuegosController::class, 'destroy']);
//-------------------------------------------------------------

//--------------------CONSOLAS----------------------------------
Route::get('/consolas', [ConsolaController::class, 'index']);
Route::get('/consolas/{consola}', [ConsolaController::class, 'show']);
Route::patch('/consolas/{consola}', [ConsolaController::class, 'update']);
Route::post('/consolas', [ConsolaController::class, 'store']);
Route::delete('/consolas/{consola}', [ConsolaController::class, 'destroy']);
//--------------------------------------------------------------

