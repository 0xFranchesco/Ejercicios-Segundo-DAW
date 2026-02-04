<?php

use App\Http\Controllers\OfertaController;
use App\Models\OfertaTrabajo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/ofertas', OfertaController::class);
