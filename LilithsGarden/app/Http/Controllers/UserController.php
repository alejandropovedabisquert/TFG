<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $usuario){
        if (Auth::user()->id == $usuario->id || Auth::user()->role == 1) {
            return view('usuarios.show', compact('usuario'));
        }else {
            return redirect()->route('usuarios.show', Auth::user()->id);
        }
    }
    
    public function edit(User $usuario){
        
        if (Auth::user()->id == $usuario->id || Auth::user()->role == 1) {
            return view('usuarios.edit', compact('usuario'));
        }else {
            return redirect()->route('usuarios.edit', Auth::user()->id);
        }
        
    }

    public function update(Request $request, User $usuario)
    {
        if (Auth::user()->id == $usuario->id || Auth::user()->role == 1) {
        $usuario->name = $request->name;
        $usuario->deliveryAddress = $request->deliveryAddress;
        $usuario->role = $request->role;
        $usuario->save();

        if ( $request->has('password')==null  ) {
            $usuario->password = bcrypt($request->password);
            $usuario->save();
        }
        return redirect()->route('usuarios.show', $usuario)->with('success','El usuario se ha editado correctamente!');
        }else {
            return redirect()->route('usuarios.edit', Auth::user()->id);
        }

    }

    public function destroy(User $usuario)
    {
        if (Auth::user()->role == 1) {
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('success','El usuario "'.$usuario->name.'" se ha eliminado correctamente!');
        }else {
            return redirect()->route('usuarios.show', $usuario->id);
        }
       
     

    }

    public function index(){
        if (Auth::user()->role == 1) {
            $usuarios = User::paginate();
            return view('usuarios.userList', compact('usuarios'));
        }else {
            return redirect()->route('home');
        }
    }
}
