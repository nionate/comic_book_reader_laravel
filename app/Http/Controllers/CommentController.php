<?php

namespace App\Http\Controllers;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request)
    {

        $comentario = new Comment();
        $comentario->mensaje = $request->mensaje;
        $comentario->fecha = Carbon::now()->toDateString();
        $comentario->id_comic = $request->comic;
        $comentario->id_usuario = Auth::id();

        $comentario->save();
        return back();
    }
}
