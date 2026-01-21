<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cursos', CursoController::class);

Route::resource('/profesores', ProfesorController::class);
Route::get('/profesoresExperimentados', [ProfesorController::class, 'experimentados']);