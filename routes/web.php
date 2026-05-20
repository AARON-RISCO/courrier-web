<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    Route::resource('usuarios', UserController::class);
    
});

Route::middleware(['auth', 'role:Administrador'])->group(function () {

    Route::resource('usuarios', UserController::class);

});
Route::middleware(['auth', 'role:Operador'])->group(function () {

    Route::get('/envios', function () {
        return "ENVIOS";
    });

});