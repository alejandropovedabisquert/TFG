<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClient;

class CuentaController extends Controller
{
    public function show(){
        return view('usuarios.show');
    }

    public function login(){
        return view('usuarios.login');
    }

    public function create(){
        return view('usuarios.create');
    }

    public function almacenar(StoreClient $request){

        $cuenta = new Client();
        $cuenta->name = $request->name;
        $cuenta->surname = $request->surname;
        $cuenta->email = $request->email;
        $cuenta->deliveryAddress = $request->deliveryAddress;
        $cuenta->password = $request->password;

        $cuenta->save();

        return redirect()->route('cuenta.mostrar', $cuenta);
    }
}
