<?php

namespace App\Http\Controllers;

use App\Author;
use App\Comic;
use App\Comment;
use App\Editorial;
use App\Genre;
use Chumper\Zipper\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ComicController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $comics = Comic::paginate(8);
        return view('comic.index', ['comics' => $comics]);
    }

    public function create()
    {
        $comic = new Comic();
        $editoriales = Editorial::all();
        $generos = Genre::all();
        $autores = Author::all();

        $editoriales_ = [];
        $generos_ = [];
        $autores_ = [];

        foreach ($editoriales as $editorial){
            $editoriales_[$editorial->id] = $editorial->nombre;
        }
        foreach ($generos as $genero){
            $generos_[$genero->id] = $genero->nombre;
        }
        foreach ($autores as $autor){
            $autores_[$autor->id] = $autor->nombres.' '.$autor->apellidos;
        }

        return view('comic.create', ['comic' => $comic, 'editoriales' => $editoriales_, 'generos' => $generos_, 'autores' => $autores_]);
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

        $img_path = $request->file('img_portada')->store('public/portadas/'.$comic->titulo.''.$comic->numero);

        $comic->img_portada = str_replace("public/", "", $img_path);

        $comic->save();

        $comic->genres()->attach($request->id_genero);
        $comic->authors()->attach($request->id_autor);

        //archivo zip
        $zip_path = 'public/libros/'.$comic->id;
        $zip_name = $comic->titulo.''.$comic->numero.'.zip';
        $request->file('archivo_zip')->storeAs($zip_path, $zip_name);
        $zipper = new Zipper();
        $zipper->make('storage/libros/'.$comic->id.'/'.$zip_name)->extractTo('storage/libros/'.$comic->id);

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

    public function read($id)
    {
        $comic = Comic::find($id);
        $files = File::allFiles('storage/libros/'.$comic->id);
        $imagenes = [];
        foreach ($files as $file){
            $info = pathinfo($file);
            if ($info['extension'] == 'jpg' || $info['extension'] == 'png'){
                $imagenes[] = $info['dirname'].'/'.$info['basename'];
            }
        }

        sort($imagenes, SORT_NATURAL);

        $paginas = [];
        for($i = 0; $i < $comic->nro_paginas; $i++)
        {
            $paginas[$i+1] = $i+1;
        }

        $previa = 1;
        $siguiente = 2;

        return view('comic.read', [
            'comic' => $comic,
            'imagen' => $imagenes[0],
            'paginas' => $paginas,
            'seleccionada' => 1,
            'previa' => $previa,
            'siguiente' => $siguiente]);
    }

    public function page($id_comic, $id_page)
    {
        $comentario = new Comment();
        $comic = Comic::find($id_comic);
        $files = File::allFiles('storage/libros/'.$comic->id);
        $imagen = '';
        foreach ($files as $file){
            $info = pathinfo($file);

            if ($info['filename'] == $id_page  && ($info['extension'] == 'jpg' || $info['extension'] == 'png')){
                $imagen = $info['dirname'].'/'.$info['basename'];
                break;
            }
        }

        $paginas = [];
        for($i = 0; $i < $comic->nro_paginas; $i++)
        {
            $paginas[$i+1] = $i+1;
        }

        $seleccionada = $id_page;

        if($id_page-1 > 1)
            $previa = $id_page-1;
        else
            $previa = 1;

        if($id_page+1 <= $comic->nro_paginas)
            $siguiente = $id_page+1;
        else
            $siguiente = $id_page;



        return view('comic.read', [
            'comic' => $comic,
            'imagen' => $imagen,
            'paginas' => $paginas,
            'seleccionada' => $seleccionada,
            'previa' => $previa,
            'siguiente' => $siguiente,
            'comentario' => $comentario
        ]);
    }
}
