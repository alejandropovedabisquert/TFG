<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BuscadorController extends Controller
{
    public function buscar(Request $request){
        $pregunta = $request->get('pregunta');
        $productos = Product::where('name', 'LIKE', '%'.$pregunta.'%')->get();
        return view('productos.busqueda', compact('productos', 'pregunta'));
    }
}
