@extends('base.base')

@section('title', 'Nuevo Comic')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2>Nuevo Comic</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($comic, ['route' => ['comic.store'], 'files' => true]) !!}

            <div class="col-lg-6">
                {!! Form::label('titulo', 'Título del comic:', ['class' => 'control-label']) !!}
                {!! Form::text('titulo', '',['class' => 'form-control', 'id' => 'titulo']) !!}
            </div>

            <div class="col-lg-6">
                {!! Form::label('numero', 'Número:', ['class' => 'control-label']) !!}
                {!! Form::text('numero', '',['class' => 'form-control', 'id' => 'numero']) !!}
            </div>

            <div class="col-lg-6">
                {!! Form::label('nro_paginas', 'Páginas:', ['class' => 'control-label']) !!}
                {!! Form::text('nro_paginas', '',['class' => 'form-control', 'id' => 'nro_paginas']) !!}
            </div>

            <div class="col-lg-6">
                {!! Form::label('serie', 'Serie:', ['class' => 'control-label']) !!}
                {!! Form::text('serie', '',['class' => 'form-control', 'id' => 'serie']) !!}
            </div>

            <div class="col-lg-6">
                {!! Form::label('idioma', 'Idioma:', ['class' => 'control-label']) !!}
                {!! Form::text('idioma', '',['class' => 'form-control', 'id' => 'idioma']) !!}
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-4">
                        <br>
                        {!! Form::label('id_editorial', 'Editorial:', ['class' => 'control-label']) !!}
                        {!! Form::select('id_editorial', $editoriales, '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-lg-4">
                        <br>
                        {!! Form::label('id_genero[]', 'Género:', ['class' => 'control-label']) !!}
                        {!! Form::select('id_genero[]', $generos, '', ['class' => 'form-control selectpicker', 'multiple' => 'true']) !!}
                    </div>
                    <div class="col-lg-4">
                        <br>
                        {!! Form::label('id_autor[]', 'Autor:', ['class' => 'control-label']) !!}
                        {!! Form::select('id_autor[]', $autores, '', ['class' => 'form-control selectpicker', 'multiple' => 'true']) !!}
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <br>
                {!! Form::label('img_portada', 'Imágen de portada:', ['class' => 'control-label']) !!}
                {!! Form::file('img_portada', ['class' => 'form-control', 'id' => 'img_portada']) !!}
            </div>

            <div class="col-lg-6">
                <br>
                {!! Form::label('archivo_zip', 'Comic comprimido', ['class' => 'control-label']) !!}
                {!! Form::file('archivo_zip', ['class' => 'form-control', 'id' => 'archivo_zip']) !!}
            </div>


            <div class="col-lg-12">
                <br>
                {!! Form::submit('Subir', ['class' => 'btn btn-primary pull-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
@endsection