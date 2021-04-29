<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request){
        $comentario = new Comment();
        $comentario->user_id = $request->user_id;
        $comentario->product_id = $request->product_id;
        $comentario->rating = $request->rating;
        $comentario->comment = $request->comment;
        $comentario->save();
        return back();



    }
}
