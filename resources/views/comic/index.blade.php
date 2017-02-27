@extends('base.base')

@section('title', 'Comics')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header" style="overflow: hidden;">
                <h2 class="pull-left">Comics</h2>
                <div class="btn-group pull-right">
                    {!! Html::decode(link_to('comic/new', '<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Comic', ['class' => 'btn btn-primary'])) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <td></td>
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
                            <td> {!! Html::image(asset('storage/'.$comic->img_portada), '', ['class' => 'img_portada']) !!}</td>
                            <td> {!! $comic->numero !!}</td>
                            <td> {!! $comic->titulo !!}</td>
                            <td> {!! $comic->serie !!}</td>
                            <td> {!! $comic->nro_paginas !!}</td>
                            <td> {!! $comic->idioma !!}</td>
                            <td> {!! $comic->id_editorial !!}</td>
                            <td>
                                {!! Html::decode(link_to('/comic/read/'.$comic->id.'/page/1', '<i class="fa fa-book" aria-hidden="true"></i> Leer', ['class' => 'btn btn-info'])) !!}
                                @if(auth()->check())
                                    {!! Html::decode(link_to('/comic/edit/'.$comic->id, '<i class="fa fa-pencil" aria-hidden="true"></i> Editar', ['class' => 'btn btn-warning'])) !!}

{{--
                                    {!! Form::open(['route' => ['comic.delete', $comic->id], 'style' => 'display:initial;']) !!}
--}}
                                        <a id="btn-eliminar" data-id="{!! $comic->id !!}" data-href="{!! route('comic.delete', [$comic->id]) !!}"  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                                   {{-- {!! Form::close() !!}--}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! URL::asset('js/eliminar.js') !!}"></script>
@endsection