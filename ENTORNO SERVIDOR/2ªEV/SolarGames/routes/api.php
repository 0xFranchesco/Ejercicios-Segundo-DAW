<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function (Request $request) {
    return "Wellcome(Bien venido)";
});

//-------------------------GENRES---------------------------

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{genre}', [GenreController::class, 'show']);
//SIGUE POR AQUI ARREGLANDOLO EN EL BRUNO
Route::patch('/genres/{genre}', [GenreController::class, 'update']);
Route::post('/genres', [GenreController::class, 'store']);
Route::delete('/genres/{genre}', [GenreController::class, 'destroy']);

//----------------------------------------------------------

//-------------------------GAMES----------------------------

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{game}', [GameController::class, 'show']);
Route::patch('/games/{game}', [GameController::class, 'update']);
Route::post('/games', [GameController::class, 'store']);
Route::delete('/games/{games}', [GameController::class, 'destroy']);

//-----------------------------------------------------------

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);