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
    Route::get('/productos', function () {
        return view('productoservicioshow');
    })->middleware('can:viewProducts, App\Models\ProductoServicio')->name('productoservicio.show');

    Route::get('/productoscreate', function () {
        return view('crearproducto');
    })->middleware('can:viewProducts, App\Models\ProductoServicio')->name('productoservicio.create');

    Route::post('/productosservicios', [ProductoServicioController::class, 'store'])
        ->middleware('can:viewProducts, App\Models\ProductoServicio')
        ->name('productosservicios.store');

    Route::get('/producto', [ProductoServicioController::class, 'index'])
        ->middleware('can:viewProducts, App\Models\ProductoServicio')
        ->name('producto.index');

    Route::delete('/productosservicios/{id}', [ProductoServicioController::class, 'destroy'])
        ->middleware('can:viewProducts, App\Models\ProductoServicio')
        ->name('productosservicios.destroy');

    Route::get('/productosservicios/{id}/edit', [ProductoServicioController::class, 'edit'])
        ->middleware('can:viewProducts, App\Models\ProductoServicio')
        ->name('productosservicios.edit');

    Route::put('/productosservicios/{id}', [ProductoServicioController::class, 'update'])
        ->middleware('can:viewProducts, App\Models\ProductoServicio')
        ->name('productosservicios.update');

    Route::get('/ventas', [VentaController::class, 'index'])
        ->name('venta.index')
        ->middleware('can:viewSales, App\Models\Venta');

    Route::get('/ventas/create', [VentaController::class, 'create'])
        ->name('venta.create')
        ->middleware('can:createSale, App\Models\Venta');

    Route::post('/ventas', [VentaController::class, 'store'])
        ->name('venta.store')
        ->middleware('can:createSale, App\Models\Venta');

    Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])
        ->name('venta.edit')
        ->middleware('can:updateSale,venta, App\Models\Venta');

    Route::put('/ventas/{venta}/edit', [VentaController::class, 'update'])
        ->name('venta.update')
        ->middleware('can:updateSale,venta, App\Models\Venta');

    Route::delete('/ventas/{venta}/delete', [VentaController::class, 'delete'])
        ->name('venta.delete')
        ->middleware('can:deleteSale,venta, App\Models\Venta');

    Route::get('/clientes', function () {
            return view('clientes');
        })->name('clientes')        ->middleware('can:viewAny, App\Models\Cliente');

        
    Route::resource('clientes', ClienteController::class)->middleware('can:viewAny, App\Models\Cliente');;
    Route::resource('tipos-clientes', TipoClienteController::class);
    Route::get('/clientgenerator', function () {
            return view('clientgenerator');
        })->name('clientgenerator')        ->middleware('can:viewAny, App\Models\Cliente');


});


Route::get('/usuarios', function () {
    $users = \App\Models\User::all();
    return view('userslist', compact('users'));
})->name('usuarios.index');

Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('users.store');
Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{user}', [UserController::class, 'deleteAccount'])->name('users.destroy');

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