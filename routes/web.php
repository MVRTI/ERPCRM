<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoClienteController;
use App\Http\Controllers\ProductoServicioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('productosservicios', ProductoServicioController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('tipos-clientes', TipoClienteController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/productos', function () {
    return view('productoservicioshow');
})->middleware(['auth', 'verified'])->name('productoservicio.show');

Route::get('/productoscreate', function () {
    return view('crearproducto');
})->middleware(['auth', 'verified'])->name('productoservicio.create');

Route::post('/productosservicios', [ProductoServicioController::class, 'store'])->name('productosservicios.store');

Route::get('/producto', [ProductoServicioController::class, 'index'])->middleware(['auth', 'verified'])->name('producto.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/productosservicios/{id}', [ProductoServicioController::class, 'destroy'])->name('productosservicios.destroy');

Route::get('/productosservicios/{id}/edit', [ProductoServicioController::class, 'edit'])->name('productosservicios.edit');

Route::put('/productosservicios/{id}', [ProductoServicioController::class, 'update'])->name('productosservicios.update');


require __DIR__.'/auth.php';
