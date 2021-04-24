<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        if (Auth::user()->role == 1) {
            return view("administrador.index");
        }else {
            $mensaje = "No tiene permisos de aministrador";
            return view('restricciones.authorize', compact('mensaje'));
        }
        
    }
}

