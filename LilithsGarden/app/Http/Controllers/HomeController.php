<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Category_Primary;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        $productos = Product::orderBy('created_at', 'desc')->paginate(12);
        $subcategorias = Subcategory::orderBy('created_at', 'desc')->get();
        $randomizadorProductos = Product::inRandomOrder()->get();
        return view('index', compact('productos', 'subcategorias', 'randomizadorProductos'));
        
    }

    public function show(){
        return view("administrador.index");
}

    public function quienes_somos()
    {
        return view('paginas-informativas.quienes-somos');
    }

    public function privacidad()
    {
        return view('paginas-informativas.politica-privacidad');
    }
    
    public function legal()
    {
        return view('paginas-informativas.aviso-legal');
    }

}
