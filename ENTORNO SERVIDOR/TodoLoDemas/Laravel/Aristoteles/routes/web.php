<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Livewire\Chat;
use Illuminate\Support\Facades\Mail;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('/chat', 'chat')->name('chat');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::view('/info', 'info')
    ->name('info');

Route::get('/dashboard', fn () => redirect()->route('chat'))->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test-murciano', function (\App\Services\AristotelesAI $ai) {
    return $ai->chat([
        ['role' => 'user', 'content' => 'Dime hola y ya'],
    ], murciano: true);
});


require __DIR__.'/auth.php';
