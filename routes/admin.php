<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
/* Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home'); */


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    // Rutas de administración
});

/* Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.home');
        // Agrega aquí las demás rutas del administrador
    });
});
 */

