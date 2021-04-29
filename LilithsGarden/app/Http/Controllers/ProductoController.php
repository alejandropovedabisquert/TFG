<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['index','create', 'store', 'destroy', 'update']]);
    }

    public function index(){
        if (Auth::user()->role == 1) {
            $productos = Product::paginate(12);
            return view('productos.productos', compact('productos'));

        }else {
            return redirect()->route('home');
        }
       
    }

    public function create(){
        if (Auth::user()->role == 1) {
            return view('productos.create');
        }else {
            return redirect()->route('home');
        }
    }

    public function store(Request $request){
        if (Auth::user()->role == 1) {
            $producto = new Product();
            $slug = Str::slug($request->name, "-");
            $producto->name = $request->name;
            $producto->slug = $slug;
            $producto->price = $request->price;
            $producto->stock = $request->stock;
            $producto->description = $request->description;
            $producto->save();
    
            return redirect()->route('productos.create');

        }else {
             return redirect()->route('home');
        }
        

    }
    public function delete(Product $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function show(Product $producto){
        $imagenes = $producto->photos;
        $comentarios = $producto->comments;
        return view('productos.producto', compact('producto', 'imagenes', 'comentarios'));
    }
}
