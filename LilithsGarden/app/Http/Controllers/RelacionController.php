<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelacionController extends Controller
{
    public function create(){
        if (Auth::user()->role == 1) {
            $categorias = Category::all();
            $productos = Product::all();
            return view('productos.categorias.relacion', compact('categorias', 'productos'));
        }else {
            return redirect()->route('home');
        }

    }

    public function store(Request $request){
        if (Auth::user()->role == 1) {
           $categoria = Category::find($request->category);
           $producto = Product::find($request->product);
           $categoria->productos()->attach($producto->id);
           return redirect()->route('relacion.create');
        }else {
            return redirect()->route('home');
        }
        

    }
}
