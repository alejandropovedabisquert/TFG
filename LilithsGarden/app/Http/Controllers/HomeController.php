<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Category_Primary;
use App\Models\Photo;
use App\Models\Product;
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
        return view('index', compact('productos'));
        
    }

    public function quienes_somos()
    {
        return view('paginas-informativas.quienes-somos');
    }

}
