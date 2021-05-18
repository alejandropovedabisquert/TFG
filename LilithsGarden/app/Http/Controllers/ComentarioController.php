<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{

    public function index()
    {
        $comentarios = Comment::paginate(12);
        return view('usuarios.comentarios.index', compact('comentarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'comentario' => 'required|max:600',
        ]);
        try {

            $comentario = new Comment();
            $comentario->user_id = auth()->user()->id;
            $comentario->product_id = $request->product_id;
            $comentario->comment = $request->comentario;
            $comentario->save();
            return back()->with('success', '¡Has enviado un comentario correctamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }

    public function destroy(Comment $comentario)
    {
        try {
            $comentario->delete();
            return redirect()->route('comentarios.index')->with('success', '¡El comentario de "' . $comentario->user->name . '" se ha eliminado correctamente!'); 
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }
}
