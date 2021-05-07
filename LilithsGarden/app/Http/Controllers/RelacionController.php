<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelacionController extends Controller
{
    public function create(){
            $categorias = Category::all();
            $productos = Product::all();
            return view('productos.categorias.relacion', compact('categorias', 'productos'));

    }

    public function store(Request $request){
           $categoria = Category::find($request->category);
           $producto = Product::find($request->product);
           $categoria->productos()->attach($producto->id);
           return redirect()->route('relacion.create')->with('success','¡La relación del producto "'.$producto->name.'" con la categoría "'.$categoria->name.'" se ha creado correctamente!');        

    }
}
