<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Add controllers
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\ResponsableController;

Route::get('/', function () {
    return view('welcome'); // welcoming /starting page
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Add routes
Route::resource('activos', ActivoController::class);
Route::resource('estados', EstadoController::class);
Route::resource('grupos', GrupoController::class);
Route::resource('oficinas', OficinaController::class);
Route::resource('responsables', ResponsableController::class);