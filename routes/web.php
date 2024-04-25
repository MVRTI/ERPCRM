<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoClienteController;
use App\Http\Controllers\ProductoServicioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/ventas',[VentaController::class, 'index'])->name('venta.index')->middleware('can:viewSales, App\Models\Venta');
    Route::get('/ventas/create',[VentaController::class, 'create'])->name('venta.create')->middleware('can:gestorSale, App\Models\Venta');
    Route::post('/ventas',[VentaController::class, 'store'])->name('venta.store')->middleware('can:gestorSale, App\Models\Venta');
    Route::get('/ventas/{venta}/edit',[VentaController::class, 'edit'])->name('venta.edit')->middleware('can:gestorSale,venta, App\Models\Venta');
    Route::put('/ventas/{venta}/edit',[VentaController::class, 'update'])->name('venta.update')->middleware('can:gestorSale,venta, App\Models\Venta');
    Route::delete('/ventas/{venta}/delete',[VentaController::class, 'delete'])->name('venta.delete')->middleware('can:gestorSale,venta, App\Models\Venta');
    Route::post('/venta/aceptar/{venta}',[VentaController::class,'aceptar'])->name('venta.aceptar')->middleware('can:gestorSale,venta, App\Models\Venta');
    Route::post('/venta/rechazar/{venta}',[VentaController::class,'rechazar'])->name('venta.rechazar')->middleware('can:gestorSale,venta, App\Models\Venta');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/productos', function () {
        return view('productoservicioshow');
    })->middleware('can:viewProductsVentas, App\Models\ProductoServicio')->name('productoservicio.show');
    Route::get('/productoscreate', function () {
        return view('crearproducto');
    })->middleware('can:viewProducts, App\Models\ProductoServicio')->name('productoservicio.create');
    Route::post('/productosservicios', [ProductoServicioController::class, 'store'])->name('productosservicios.store')->middleware('can:viewProducts, App\Models\ProductoServicio');
    Route::get('/producto', [ProductoServicioController::class, 'index'])->middleware(['auth', 'verified'])->name('producto.index')->middleware('can:viewProductsVentas, App\Models\ProductoServicio');
    Route::delete('/productosservicios/{id}', [ProductoServicioController::class, 'destroy'])->name('productosservicios.destroy')->middleware('can:viewProducts, App\Models\ProductoServicio');
    Route::get('/productosservicios/{id}/edit', [ProductoServicioController::class, 'edit'])->name('productosservicios.edit')->middleware('can:viewProducts, App\Models\ProductoServicio');
    Route::put('/productosservicios/{id}', [ProductoServicioController::class, 'update'])->name('productosservicios.update')->middleware('can:viewProducts, App\Models\ProductoServicio');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/clientgenerator', function () {
        return view('clientgenerator');
    })->name('clientgenerator')->middleware('can:viewAny, App\Models\Cliente');
    /*Route::get('/clientes', function () {
        return view('clientes');
    })->name('clientes.index');*/
    Route::get('/verclientes', [ClienteController::class, 'index'])->name('verclientes.index')->middleware('can:viewAny, App\Models\Cliente');
    Route::resource('clientes', ClienteController::class)->middleware('can:viewAny, App\Models\Cliente');
    Route::resource('tipos-clientes', TipoClienteController::class)->middleware('can:viewAny, App\Models\Cliente');
    Route::get('/clientes', [ClienteController::class, 'filtrarclientes'])->name('clientes.filtrarclientes')->middleware('can:viewAny, App\Models\Cliente');
    Route::get('/api/clientes/count-by-date', [ClienteController::class, 'countByDate'])->middleware('can:viewAny, App\Models\Cliente');

});


Route::middleware(['auth', 'verified'])->group(function () {
Route::get('/usuarios', function () {
    $users = \App\Models\User::all();
    return view('userslist', compact('users'));
})->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create')->middleware('can:paraUsers, App\Models\Cliente');
Route::post('/usuarios', [UserController::class, 'store'])->name('users.store')->middleware('can:paraUsers, App\Models\Cliente');
Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{user}', [UserController::class, 'deleteAccount'])->name('users.destroy')->middleware('can:paraUsers, App\Models\Cliente');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/clientes/{cliente}/cambiarEstado', [ClienteController::class, 'cambiarEstado'])->name('clientes.cambiarEstado');
});

require __DIR__.'/auth.php';