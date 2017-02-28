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
            @foreach($comics as $comic)

                <div class="col-lg-3">
                    <div class="panel panel-primary" style="margin: 10px;">
                        <div class="panel-heading">{!! $comic->titulo.' #'.$comic->numero !!}</div>
                        <div class="panel-body" style="text-align: center;">
                            {!! Html::image(asset('storage/'.$comic->img_portada), '', ['class' => 'img_portada']) !!}
                        </div>
                        <div class="panel-footer" style="text-align: center;">
                            {!! Html::decode(link_to('/comic/read/'.$comic->id.'/page/1', '<i class="fa fa-book" aria-hidden="true"></i> ', ['class' => 'btn btn-info'])) !!}
                            @if(auth()->check())
                                {!! Html::decode(link_to('/comic/edit/'.$comic->id, '<i class="fa fa-pencil" aria-hidden="true"></i> ', ['class' => 'btn btn-warning'])) !!}

                                <a id="btn-eliminar" data-id="{!! $comic->id !!}"
                                   data-href="{!! route('comic.delete', [$comic->id]) !!}" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i> </a>

                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-lg-12" style="text-align: center;">
            {!! $comics->links() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! URL::asset('js/eliminar.js') !!}"></script>
@endsection