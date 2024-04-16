<?php

use App\Http\Controllers\Users\DatosPersonalesController;
use App\Http\Controllers\Users\UserDatosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/datos/edit/{dato}', [UserDatosController::class, 'edit'])->name('users.datos.edit');
    Route::put('/datos/update/{user}', [UserDatosController::class, 'update'])->name('users.datos.update');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
