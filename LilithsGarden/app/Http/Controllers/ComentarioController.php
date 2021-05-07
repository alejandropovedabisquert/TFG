<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'product_id' => 'required',
            'comentario' => 'required|max:600',
        ]);
        $comentario = new Comment();
        $comentario->user_id = auth()->user()->id;
        $comentario->product_id = $request->product_id;
        $comentario->comment = $request->comentario;
        $comentario->save();
        return back();



    }
}
