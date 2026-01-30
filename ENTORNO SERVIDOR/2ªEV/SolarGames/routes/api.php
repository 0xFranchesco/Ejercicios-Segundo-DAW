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


//-------------------------GAMES-GENRES-REVIEWS----------------------------

Route::get('/users/{user}/reviews', [ReviewController::class, 'UserReviews']);    

Route::apiResource('games', GameController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('reviews', ReviewController::class)->only(['index', 'show']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('games', GameController::class)->except(['index', 'show']);
    Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
    Route::apiResource('reviews', ReviewController::class)->except(['index', 'show']);
});

//-------------------------USUARIOS--------------------------

Route::get('/users', [UserController::class, 'index']);

//-----------------------------------------------------------

//-------------------REGISTER-LOGIN-LOGOUT-------------------

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//-----------------------------------------------------------

Route::get('/genres/{game}/games', [GenreController::class, 'gameGenre'])->name('games.genre');
Route::get('/games/{game}/relationships/genre', [GameController::class, 'gamesRelationshipsGenre'])->name('games.relationships.genre');