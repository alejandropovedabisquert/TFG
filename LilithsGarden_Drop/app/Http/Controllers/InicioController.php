<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke(){
        $products = Product::paginate();
        return view('inicio', compact('products'));
    }
}
