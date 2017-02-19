<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', ['comics' => $comics]);
    }

    public function create()
    {
        $comic = new Comic();
        return view('comic.create', ['comic' => $comic]);
    }

    public function store(Request $request)
    {
       // dd($request);
        $comic = new Comic();
        $comic->titulo = $request->titulo;
        $comic->numero = $request->numero;
        $comic->nro_paginas = $request->nro_paginas;
        $comic->serie = $request->serie;
        $comic->idioma = $request->idioma;
        $comic->id_editorial = $request->id_editorial;
        $comic->img_portada = $request->file('img_portada')->store('img_comic/'.$comic->titulo.''.$comic->numero);

        $comic->save();
        return back();
    }

    public function edit($id)
    {
        $comic = Comic::find($id);
        return view('comic.edit', ['comic' => $comic]);
    }

    public function update(Request $request, $id)
    {
        $comic = Comic::find($id);
        $comic->titulo = $request->titulo;
        $comic->numero = $request->numero;
        $comic->nro_paginas = $request->nro_paginas;
        $comic->serie = $request->serie;
        $comic->idioma = $request->idioma;
        $comic->id_editorial = $request->id_editorial;
        $comic->save();

        return back();
    }

    public function delete($id)
    {
        $comic = Comic::find($id);
        $comic->delete();
        return back();
    }


}
