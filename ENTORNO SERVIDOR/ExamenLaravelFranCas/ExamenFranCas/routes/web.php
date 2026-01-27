<?php

use App\Http\Controllers\EspeculadorController;
use App\Http\Controllers\ZuloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/zulos', ZuloController::class);
Route::resource('/especuladores', EspeculadorController::class);

