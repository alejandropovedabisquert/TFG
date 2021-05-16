<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Category::paginate(12);
        return view('productos.categorias.index', compact('categorias'));
    }

    public function destroy(Category $categoria)
    {
        try {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', '¡La categoría "' . $categoria->name . '" se ha eliminado correctamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function create()
    {
        return view('productos.categorias.create');
    }

    public function store(Request $request)
    {
        try {
            $cateogria = new Category();
            $slug = Str::slug($request->name, "-");
            $cateogria->name = $request->name;
            $cateogria->slug = $slug;
            $cateogria->save();
            return redirect()->route('categorias.create')->with('success', '¡La categoría "' . $request->name . '" se ha creado correctamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function edit()
    {
        return back();
    }
}
