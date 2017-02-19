@extends('base.base')

@section('title', 'Editar '.$comic->titulo.' #'.$comic->numero)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2>Editar {!! $comic->titulo.' #'.$comic->numero !!}</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($comic, ['route' => ['comic.update', $comic->id], 'files' => true]) !!}
            {!! Form::label('titulo', 'Título del comic:', ['class' => 'control-label']) !!}
            {!! Form::text('titulo', $comic->titulo, ['class' => 'form-control', 'id' => 'titulo']) !!}

            {!! Form::label('numero', 'Número:', ['class' => 'control-label']) !!}
            {!! Form::text('numero', $comic->numero,['class' => 'form-control', 'id' => 'numero']) !!}

            {!! Form::label('nro_paginas', 'Páginas:', ['class' => 'control-label']) !!}
            {!! Form::text('nro_paginas', $comic->nro_paginas,['class' => 'form-control', 'id' => 'nro_paginas']) !!}

            {!! Form::label('serie', 'Serie:', ['class' => 'control-label']) !!}
            {!! Form::text('serie', $comic->serie,['class' => 'form-control', 'id' => 'serie']) !!}

            {!! Form::label('idioma', 'Idioma:', ['class' => 'control-label']) !!}
            {!! Form::text('idioma', $comic->idioma,['class' => 'form-control', 'id' => 'idioma']) !!}

            <br>
            {!! Form::label('img_portada', 'Imágen de portada:', ['class' => 'control-label']) !!}
            {!! Form::file('img_portada', ['class' => 'form-control', 'id' => 'img_portada']) !!}

            <br>

            {!! Form::label('id_editorial', 'Editorial:', ['class' => 'control-label']) !!}
            {!! Form::text('id_editorial', $comic->id_editorial,['class' => 'form-control', 'id' => 'id_editorial']) !!}

            <br>
            {!! Form::submit('Editar', ['class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection