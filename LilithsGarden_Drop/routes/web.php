<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\CarritoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', InicioController::class);

Route::get('cuenta', [CuentaController::class, 'show'])->name('cuenta.mostrar');

Route::get('cuenta/registro', [CuentaController::class, 'create'])->name('registro.crear');

Route::get('cuenta/inicio-sesion', [CuentaController::class, 'login'])->name('registro.login');

Route::post('cuenta', [CuentaController::class, 'almacenar'])->name('cuenta.almacenar');

Route::get('carrito', [CarritoController::class, 'show'])->name('carrito.mostrar');

Route::get('productos/{id}', [ProductoController::class, 'showProducto'])->name('producto.mostrar');

Route::get('productos/categorias/{categoria}', [ProductoController::class, 'showCategoria'])->name('categoria.mostrar');