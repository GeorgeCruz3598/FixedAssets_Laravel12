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

//FOR REPORTS
Route::get('activospdf', [ActivoController::class, 'listpdf'])
->name('activos.activospdf');

//Add routes
Route::resource('activos', ActivoController::class);
Route::resource('estados', EstadoController::class);
Route::resource('grupos', GrupoController::class);
Route::resource('oficinas', OficinaController::class);
Route::resource('responsables', ResponsableController::class);

//FOR REPORTS ACTIVOS
Route::get('activospdf', [ActivoController::class, 'listpdf'])
->name('activos.activospdf');
Route::get('activosdetallepdf', [ActivoController::class, 'detallepdf'])
->name('activos.activosdetallepdf');

//FOR REPORTS RESPONSABLES
Route::get('responsablespdf', [ResponsableController::class, 'listpdf'])
->name('responsables.responsablespdf');

//FOR REPORTS OFICINAS
Route::get('oficinaspdf', [OficinaController::class, 'listpdf']) 
->name('oficinas.oficinaspdf');

//LIST ACTIVOS QRcode
    //activos_qr is the route /public/activos_qr
    //print_qr is the associated function in the ActivoController that generates the QR codes for activos
    //activos represents the resource name for activos
Route::get('activos_qr', [ActivoController::class, 'print_qr'])
->name('activos.activos_qr');
