<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function showProducto($name){
        $producto = Product::find($name);
        return view('productos.showProducto', compact('producto'));
    }

    public function showCategoria($categoria){
        return view('productos.showCategoria', compact('categoria'));
    }
}
