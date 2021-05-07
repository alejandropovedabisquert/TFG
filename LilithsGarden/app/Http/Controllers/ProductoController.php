<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function index(){
            $productos = Product::paginate(12);
            return view('productos.productos', compact('productos'));
       
    }

    public function create(){
            return view('productos.create');
    }

    public function store(Request $request){
        // $request->validate([
        //     'name' => 'required|min:2|max:30',
        //     'price' => 'required|email|max:50',
        //     'stock' => 'max:9|min:9|numeric',
        //     'description' => 'required',
        // ]);
            $producto = new Product();
            $slug = Str::slug($request->name, "-");
            $producto->name = $request->name;
            $producto->slug = $slug;
            $producto->price = $request->price;
            $producto->stock = $request->stock;
            $producto->description = $request->description;
            $producto->save();
            return redirect()->route('productos.create')->with('success','¡El producto "'.$request->name.'" se ha creado correctamente!');

    }

    public function edit(Product $producto){
        return view('productos.edit', compact('producto'));
        
    }
    public function update(Request $request, Product $producto)
    {
        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->description = $request->description;
        $producto->save();

        return redirect()->route('productos.show', $producto)->with('success','El producto se ha editado correctamente!');

    }

    public function destroy(Product $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success','¡El producto "'.$producto->name.'" se ha eliminado correctamente!');
    }

    public function show(Product $producto){
        $imagenes = $producto->photos;
        $comprobarExistencia = $imagenes->isEmpty();
        $comentarios = $producto->comments();
        $numeroVisorImagenes = 1;
        $categorias = Product::find($producto->id)->categorias()->get();
        return view('productos.producto', compact('producto', 'imagenes', 'comentarios', 'numeroVisorImagenes', 'categorias', 'comprobarExistencia'));
    }
}
