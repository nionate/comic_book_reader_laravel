@extends('base.base')

@section('title', 'Comics')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header" style="overflow: hidden;">
                <h2 class="pull-left">Comics</h2>
                <div class="btn-group pull-right">
                    {!! link_to('comic/new', 'Nuevo Comic', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Título</th>
                        <th>Serie</th>
                        <th>Páginas</th>
                        <th>Idioma</th>
                        <th>Editorial</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comics as $comic)
                        <tr>
                            <td> {!! $comic->numero !!}</td>
                            <td> {!! $comic->titulo !!}</td>
                            <td> {!! $comic->serie !!}</td>
                            <td> {!! $comic->nro_paginas !!}</td>
                            <td> {!! $comic->idioma !!}</td>
                            <td> {!! $comic->id_editorial !!}</td>
                            <td>
                                {!! link_to('/comic/read/'.$comic->id, 'Leer', ['class' => 'btn btn-info']) !!}
                                @if(auth()->check())
                                    {!! link_to('/comic/edit/'.$comic->id, 'Editar', ['class' => 'btn btn-warning']) !!}

                                    {!! Form::open(['route' => ['comic.delete', $comic->id], 'style' => 'display:initial;']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection