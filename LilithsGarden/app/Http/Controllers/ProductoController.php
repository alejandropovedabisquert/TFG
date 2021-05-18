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
    public function index()
    {
        $productos = Product::paginate(12);
        return view('productos.productos', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);
        try {
 
            $producto = new Product();
            $slug = Str::slug($request->name, "-");
            $producto->name = $request->name;
            $producto->slug = $slug;
            $producto->price = $request->price;
            $producto->stock = $request->stock;
            $producto->description = $request->description;
            $producto->save();

            return redirect()->route('productos.create')->with('success', '¡El producto "' . $request->name . '" se ha creado correctamente!');

        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function edit(Product $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);
        try {
            $producto->name = $request->name;
            $producto->price = $request->price;
            $producto->stock = $request->stock;
            $producto->description = $request->description;
            $producto->save();

            return redirect()->route('productos.show', $producto)->with('success', '¡El producto se ha editado correctamente!');

        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function destroy(Product $producto)
    {
        try {

            $producto->delete();

            return redirect()->route('productos.index')->with('success', '¡El producto "' . $producto->name . '" se ha eliminado correctamente!');

        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function show(Product $producto)
    {

        $imagenes = $producto->photos;
        $comentarios = $producto->comments();
        $numeroVisorImagenes = 1;
        $subcategorias = $producto->subcategorias()->get();

        return view('productos.producto', compact('producto', 'imagenes', 'comentarios', 'numeroVisorImagenes', 'subcategorias'));
    }
}
