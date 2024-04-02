<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clientgenerator', function () {
    return view('clientgenerator');
})->name('clientgenerator');

Route::get('/clientes', function () {
    return view('clientes');
})->name('clientes');

Route::resource('clientes', ClienteController::class);
Route::resource('tipos-clientes', TipoClienteController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes', [ClienteController::class, 'filtrarclientes'])->name('clientes.filtrarclientes');
    Route::patch('/clientes/{cliente}/cambiarEstado', [ClienteController::class, 'cambiarEstado'])->name('clientes.cambiarEstado');

});

require __DIR__.'/auth.php';
