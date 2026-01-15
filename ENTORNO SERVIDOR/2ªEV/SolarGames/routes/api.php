<?php

use App\Http\Controllers\AuthController;
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
Route::patch('/genres/{genre}', [GenreController::class, 'update'])
->middleware('auth:sanctum');
Route::post('/genres', [GenreController::class, 'store'])
->middleware('auth:sanctum');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])
->middleware('auth:sanctum');

//----------------------------------------------------------

//-------------------------GAMES----------------------------

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{game}', [GameController::class, 'show']);
Route::patch('/games/{game}', [GameController::class, 'update'])
->middleware('auth:sanctum');
Route::post('/games', [GameController::class, 'store'])
->middleware('auth:sanctum');
Route::delete('/games/{game}', [GameController::class, 'destroy'])
->middleware('auth:sanctum');

//-----------------------------------------------------------

//-------------------------REVIEWS---------------------------

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);
Route::patch('/reviews/{review}', [ReviewController::class, 'update'])
->middleware('auth:sanctum');
Route::post('/reviews', [ReviewController::class, 'store'])
->middleware('auth:sanctum');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
->middleware('auth:sanctum');

//-----------------------------------------------------------

//-------------------------USUARIOS--------------------------

Route::get('/users', [UserController::class, 'index']);

//-----------------------------------------------------------

//-------------------REGISTER-LOGIN-LOGOUT-------------------

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//-----------------------------------------------------------
