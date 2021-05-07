<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RelacionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;

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


Route::get('/', HomeController::class)->name('home');
Auth::routes();

//Grupo para administracion
Route::group(['middleware' => 'admin'], function (){
    //Mostrara la pantalla de administracion
    Route::get('administrador', [AdminController::class, 'show'])->name('administrador.show');
    
    //Relacion categoria producto
    Route::get('productos/categorias/relacion/create', [RelacionController::class, 'create'])->name('relacion.create');
    Route::post('productos/categorias/relacion', [RelacionController::class, 'store'])->name('relacion.store');

    //Categorias
    Route::resource('productos/categorias', CategoriaController::class);
    // Route::get('productos/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    // Route::get('productos/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    // Route::post('productos/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    // Route::get('productos/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    // Route::put('productos/categoria/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    // Route::delete('productos/categorias/{categoria}', [CategoriaController::class, 'delete'])->name('categorias.destroy');

    //Fotos
    Route::get('productos/foto/create', [FotoController::class, 'create'])->name('foto.create');
    Route::post('productos/foto', [FotoController::class, 'store'])->name('foto.store');

    //Productos
    Route::resource('productos', ProductoController::class);
    // Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
    // Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');
    // Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
    // Route::get('productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    // Route::put('productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    // Route::delete('productos/{producto}', [ProductoController::class, 'delete'])->name('productos.destroy');

    
});

//Usuarios
Route::resource('usuarios', UserController::class);

//Rutas con inicio de sesion obligatorio
Route::group(['middleware' => 'auth'], function(){
    //Carrito
    Route::get('carrito', [CartController::class , 'checkout'])->name('cart.checkout');
    Route::post('anyadir-carrito/{producto}', [CartController::class, 'add'])->name('cart.add');
    Route::get('actualizar-carrito/{producto}', [CartController::class, 'update'])->name('cart.update');
    Route::get('borrar-carrito/{producto}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('limpiar-carrito/', [CartController::class, 'clear'])->name('cart.clear');

    //Comentarios
    Route::post('comentario', [ComentarioController::class, 'store'])->name('comentario.store');

    //pedidos
    Route::get('pedido', [PedidoController::class, 'pedidos'])->name('pedidos.pedidos');
    Route::get('linea-pedidos/{pedido}', [PedidoController::class, 'lineasPedido'])->name('pedidos.lineasPedido');
    Route::post('pedido', [PedidoController::class, 'store'])->name('pedido.store');
});


//Rutas publicas
Route::get('productos/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('buscar/productos', [BuscadorController::class, 'buscar'])->name('buscador.productos');
Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');


