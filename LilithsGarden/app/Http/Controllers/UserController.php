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

    public function show(User $usuario)
    {
        if (Auth::user()->id == $usuario->id || Auth::user()->role == 1) {
            return view('usuarios.show', compact('usuario'));
        } else {
            return redirect()->route('usuarios.show', Auth::user()->id);
        }
    }

    public function edit(User $usuario)
    {

        if (Auth::user()->id == $usuario->id || Auth::user()->role == 1) {
            return view('usuarios.edit', compact('usuario'));
        } else {
            return redirect()->route('usuarios.edit', Auth::user()->id);
        }
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'deliveryAddress' => 'required|max:50',
        ]);
        try {

            if (Auth::user()->id == $usuario->id || Auth::user()->role == 1) {
                $usuario->name = $request->name;
                $usuario->deliveryAddress = $request->deliveryAddress;
                $usuario->role = $request->role;        
                if ($request->password != null) {
                    $usuario->password = bcrypt($request->password);
                }
                $usuario->save();
               
                return redirect()->route('usuarios.show', $usuario)->with('success', 'El usuario se ha editado correctamente!');
            } else {
                return redirect()->route('usuarios.edit', Auth::user()->id);
            }
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function destroy(User $usuario)
    {
        try {
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'El usuario "' . $usuario->name . '" se ha eliminado correctamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function index()
    {
        $usuarios = User::paginate(12);
        return view('usuarios.userList', compact('usuarios'));
    }
}
