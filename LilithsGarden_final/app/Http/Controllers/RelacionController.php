<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelacionController extends Controller
{
    public function create()
    {
        $subcategorias = Subcategory::all();
        $productos = Product::all();
        return view('productos.categorias.subcategorias.relacion', compact('subcategorias', 'productos'));
    }

    public function store(Request $request)
    {
        try {
            $subcategoria = Subcategory::find($request->category);
            $producto = Product::find($request->product);
            $subcategoria->productos()->attach($producto->id);
            return redirect()->route('relacion.create')->with('success', '¡La relación del producto "' . $producto->name . '" con la categoría "' . $subcategoria->name . '" se ha creado correctamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }
}
