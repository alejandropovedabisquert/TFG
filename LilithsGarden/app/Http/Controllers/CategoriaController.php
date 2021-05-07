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
    
            return redirect()->route('categorias.create')->with('success','¡La categoría "'.$request->name.'" se ha creado correctamente!');

    }

    public function edit(Category $categoria){
        return view('productos.categorias.edit', compact('categoria'));
        
    }

    public function update(Request $request, Category $categoria)
    {
        $categoria->name = $request->name;
        $categoria->save();
        return back()->with('success','¡La categoría se ha editado correctamente a "'.$request->name.'"!');

    }

    public function destroy(Category $categoria)
    {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success','¡La categoría "'.$categoria->name.'" se ha eliminado correctamente!');

    }

    public function index(){
            $categorias = Category::paginate();
            return view('productos.categorias.categoryList', compact('categorias'));
    }

}
