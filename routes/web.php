<?php

use App\Http\Controllers\DatoPersonalController;
use App\Http\Controllers\Users\ExperienciaLaboralController;
use App\Http\Controllers\Users\IdiomaController;
use App\Http\Controllers\Users\PreparacionConstanteController;
use App\Http\Controllers\Users\PreparacionFormalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('experiencia-laboral', ExperienciaLaboralController::class)->except('show')->names('users.empleos');
Route::resource('idiomas', IdiomaController::class)->except('show')->names('users.idiomas');
Route::resource('preparacion-formal', PreparacionFormalController::class)->except('show')->names('users.preparacion_formal');
Route::resource('preparacion-constante', PreparacionConstanteController::class)->except('show')->names('users.preparacion_constante');

//php artisan route:list -> PARA VER LAS RUTAS Y VER LA VARIABLE CORRECTA QUE SE LE DEBE ENVIAR AL GET, EDIT Y UPDATE

//rutas protegidas
Route::middleware(['auth'])->group(function () {
     //Route::get('/datos/edit/{dato}', [DatoPersonalController::class, 'edit'])->name('users.datos.edit');
    //Route::put('/datos/update/{user}', [DatoPersonalController::class, 'update'])->name('users.datos.update');
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
