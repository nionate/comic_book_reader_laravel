@extends('base.base')

@section('title', $comic->titulo.' #'.$comic->numero)

@section('comic')

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>{!! $comic->titulo. ' #'.$comic->numero !!}</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-info-circle"></i> Información</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <span class="label label-primary">Editorial</span>
                            {!! $comic->editorial->nombre !!}
                        </div>
                        <div class="col-md-4">
                            <span class="label label-primary">Géneros</span>
                            @if(isset($comic->genres))
                                @foreach($comic->genres as $genre)
                                    {!! $genre->nombre.',' !!}
                                @endforeach
                            @endif
                        </div>
                        <div class="col-md-4">
                            <span class="label label-primary">Autores</span>
                            @if(isset($comic->authors))
                                @foreach($comic->authors as $author)
                                    {!! $author->nombres.' '.$author->apellidos.',' !!}
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;">
            <div class="col-md-12">

                <div class="col-md-8">
                    {!! Form::label('', 'Página:') !!}
                    {!! Form::select('size', $paginas, $seleccionada, ['class' => 'form-control', 'id' => 'control-paginas', 'onChange' => 'change_page()']) !!}

                    <script>
                        function change_page() {
                            var control = document.getElementById('control-paginas');
                            var new_page = control.value;
                            var old_url = location.href;
                            var url_split = old_url.split('/');
                            url_split[url_split.length - 1] = new_page;
                            var new_url = url_split.join('/');
                            location.href = new_url;
                        }

                    </script>
                </div>

                <div id="control-container" class="col-md-4">
                    {!! Html::decode(link_to('/comic/read/'.$comic->id.'/page/'.$previa, '<i class="fa fa-arrow-left" aria-hidden="true"></i>', ['class' => 'vertical-btn btn btn-primary'])) !!}
                    {!! Html::decode(link_to('/comic/read/'.$comic->id.'/page/'.$siguiente, '<i class="fa fa-arrow-right" aria-hidden="true"></i>', ['class' => 'vertical-btn btn btn-primary'])) !!}
                    {{--  <a href="{{ $comic->id.'/page/'.$previa }}" class="vertical-btn btn btn-primary"><i
                                  class="fa fa-arrow-left" aria-hidden="true"></i></a>
                      <a href="{{ $comic->id.'/page/'.$siguiente }}" class="vertical-btn btn btn-primary"><i
                                  class="fa fa-arrow-right" aria-hidden="true"></i></a>--}}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            {!! Html::image(asset($imagen), '', ['class' => 'img_libro']) !!}
        </div>
    </div>
@endsection

@section('comentarios')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Comentarios</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::model($comentario, ['route' => ['comment.store']]) !!}

            {!! Form::textarea('mensaje', '', ['class' => 'form-control', 'rows'=>'5']) !!}
            {!! Form::hidden('comic', $comic->id) !!}
            {!! Form::submit('Comentar', ['class' => 'btn btn-primary', 'style' => 'width:100%;']) !!}

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            @if(!$comic->comentarios->isEmpty())
                @foreach($comic->comentarios->reverse() as $comentario)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Por : {!! $comentario->user->name !!}
                                <small class="pull-right">Fecha: {!! $comentario->fecha !!}</small>
                            </h3>
                        </div>
                        <div class="panel-body">
                            {!! $comentario->mensaje !!}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-comments text-center">
                    No existen comentarios todavía
                </div>
            @endif
        </div>
    </div>
@endsection