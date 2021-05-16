<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\CarruselController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\generadorFaturaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RelacionController;
use App\Http\Controllers\SubcategoriaController;
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
    
    //Usuarios administracion
    Route::resource('administracion/usuarios', UserController::class);

    //Relacion categoria producto administracion
    Route::get('administracion/productos/categorias/relacion/create', [RelacionController::class, 'create'])->name('relacion.create');
    Route::post('administracion/productos/categorias/relacion', [RelacionController::class, 'store'])->name('relacion.store');

    //Categorias administracion
    Route::resource('administracion/categorias', CategoriaController::class);

    //Subcategorias administracion
    Route::resource('administracion/subcategorias', SubcategoriaController::class);

    //Carruseles administracion
    Route::resource('administracion/carrusel', CarruselController::class);
    
    //Fotos administracion
    Route::get('administracion/productos/foto/create', [FotoController::class, 'create'])->name('foto.create');
    Route::post('administracion/productos/foto', [FotoController::class, 'store'])->name('foto.store');

    //Productos administracion
    Route::resource('administracion/productos', ProductoController::class);

    //Pedidos administracion
    Route::get('administracion/pedidos', [PedidoController::class, 'pedidos'])->name('pedidos.pedidos');
    Route::get('administracion/borrar/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
    
});
//Rutas publicas
Route::get('subcategorias/{subcategoria}', [SubcategoriaController::class, 'show'])->name('subcategorias.show');
Route::get('productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('buscar/productos', [BuscadorController::class, 'buscar'])->name('buscador.productos');
Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');
Route::get('usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show');
Route::put('usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');
Route::get('usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::get('quienes-somos', [HomeController::class, 'quienes_somos'])->name('quienes-somos');
Route::get('politica-privacidad', [HomeController::class, 'privacidad'])->name('politica-privacidad');
Route::get('aviso-legal', [HomeController::class, 'legal'])->name('aviso-legal');



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
    Route::get('pedido', [PedidoController::class, 'pedido'])->name('pedidos.pedido');
    Route::get('linea-pedidos/{pedido}', [PedidoController::class, 'lineasPedido'])->name('pedidos.lineasPedido');
    Route::post('pedido', [PedidoController::class, 'store'])->name('pedido.store');

    //Generador de facturas
    Route::get('factura/{pedido}', [generadorFaturaController::class, 'imprimir'])->name('generador.imprimir');
});





