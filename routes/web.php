<?php

use App\Http\Controllers\TanqueController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\MunicionController;
use App\Http\Controllers\ConflictoController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\CombustibleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas Resource para Tankpedia
Route::resource('tanques', TanqueController::class);
Route::resource('paises', PaisController::class);
Route::resource('conflictos', ConflictoController::class);
Route::resource('fabricantes', FabricanteController::class);
Route::resource('combustibles', CombustibleController::class);

// Rutas explícitas para municiones (con parámetro personalizado)
Route::get('/municiones', [MunicionController::class, 'index'])->name('municiones.index');
Route::get('/municiones/create', [MunicionController::class, 'create'])->name('municiones.create');
Route::post('/municiones', [MunicionController::class, 'store'])->name('municiones.store');
Route::get('/municiones/{municion}', [MunicionController::class, 'show'])->name('municiones.show');
Route::get('/municiones/{municion}/edit', [MunicionController::class, 'edit'])->name('municiones.edit');
Route::put('/municiones/{municion}', [MunicionController::class, 'update'])->name('municiones.update');
Route::delete('/municiones/{municion}', [MunicionController::class, 'destroy'])->name('municiones.destroy');