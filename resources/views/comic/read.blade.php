@extends('base.base')

@section('title', $comic->titulo.' #'.$comic->numero)

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>{!! $comic->titulo. ' #'.$comic->numero !!}</h2>
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
                        function change_page()
                        {
                            var control = document.getElementById('control-paginas');
                            var new_page = control.value;
                            var old_url = location.href;
                            var url_split = old_url.split('/');
                            url_split[ url_split.length-1] = new_page;
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
        <div class="col-md-12 text-center">
            {!! Html::image(asset($imagen), '', ['class' => 'img_libro']) !!}
        </div>
    </div>
@endsection