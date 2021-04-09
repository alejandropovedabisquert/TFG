<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Product::paginate();
        return view('productos.productos', compact('productos'));
    }

    public function show(Product $producto){
        return view('productos.producto', compact('producto'));
    }
}
