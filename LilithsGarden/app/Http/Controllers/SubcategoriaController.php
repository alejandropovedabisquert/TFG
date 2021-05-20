<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoriaController extends Controller
{
    public function show(Subcategory $subcategoria){
        $productos = Subcategory::find($subcategoria->id)->productos()->orderBy('name')->paginate(12);
        return view('productos.categorias.subcategorias.subcategoria', compact('productos', 'subcategoria'));
    }

    public function create(){
        $categorias = Category::all();
        return view('productos.categorias.subcategorias.create', compact('categorias'));
    }

    public function store(Request $request){

        try {
            $subcategoria = new Subcategory();
            $slug = Str::slug($request->name, "-");
            $subcategoria->name = $request->name;
            $subcategoria->slug = $slug;
            $subcategoria->category_id = $request->category;
            $subcategoria->save();
    
            return redirect()->route('subcategorias.create')->with('success','¡La subcategoría "'.$request->name.'" se ha creado correctamente!');

        } catch (\Throwable $th) {
            
        }
            
    }

    public function edit(Subcategory $subcategoria){
        return view('productos.categorias.subcategorias.edit', compact('subcategoria'));
        
    }

    public function update(Request $request, Subcategory $subcategoria)
    {
        try {
            $slug = Str::slug($request->name, "-");
            $subcategoria->name = $request->name;
            $subcategoria->slug = $slug;
            $subcategoria->save();
            return redirect()->route('subcategorias.edit', $slug)->with('success','¡La subcategoría se ha editado correctamente a "'.$request->name.'"!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
       

    }

    public function destroy(Subcategory $subcategoria)
    {
            try {
                $subcategoria->delete();
                return redirect()->route('subcategorias.index')->with('success','¡La subcategoría "'.$subcategoria->name.'" se ha eliminado correctamente!');
            } catch (\Throwable $th) {
                abort(403, 'Bad Request');
            }
           

    }

    public function index(){
            $subcategorias = Subcategory::paginate(12);
            return view('productos.categorias.subcategorias.subcategoryList', compact('subcategorias'));
    }
}
