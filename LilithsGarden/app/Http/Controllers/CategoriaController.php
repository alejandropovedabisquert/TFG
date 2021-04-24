<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{

    public function show(Category $categoria){
        $productos = Category::find($categoria->id)->productos()->orderBy('name')->paginate(12);
        return view('productos.categorias.categoria', compact('productos', 'categoria'));
    }

    public function create(){
            return view('productos.categorias.create');
    }

    public function store(Request $request){

            $categoria = new Category();
            $slug = Str::slug($request->name, "-");
            $categoria->name = $request->name;
            $categoria->slug = $slug;
            $categoria->save();
    
            return redirect()->route('categorias.create');

    }
    public function delete(Category $categoria)
    {
            $categoria->delete();
            return redirect()->route('categorias.index');

    }

    public function index(){
            $categorias = Category::paginate();
            return view('productos.categorias.categoryList', compact('categorias'));
    }

}
