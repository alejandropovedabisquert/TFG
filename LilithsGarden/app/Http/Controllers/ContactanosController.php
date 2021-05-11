<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function PHPSTORM_META\type;

class ContactanosController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        $pedidosUsuario = $usuario->order;
        return view('contactanos.index', compact('pedidosUsuario'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|min:2|max:30',
                'email' => 'required|email|max:50',
                'mobile' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',
                'message' => 'required',
            ]);

            $correo = new ContactanosMailable($request->all());
            Mail::to('alex2001bis@gmail.com')->send($correo);
            return redirect()->route('contactanos.index')->with('success', '¡El mensaje se ha enviado correctamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }
}
