<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', IndexController::class)->name('index');
Route::resource('productos/categorias', CategoriaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('cuenta', CuentaController::class);
Route::resource('carrito', CarritoController::class);

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');