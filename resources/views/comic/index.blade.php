@extends('base.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header" style="overflow: hidden;">
                <h2 class="pull-left">Comics</h2>
                <div class="btn-group pull-right">
                    <button class="btn btn-primary">Nuevo Comic</button>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection