@extends('base.base')

@section('title', 'Inicio')

@section('portada')
    <div class="jumbotron" style="height: 500px;">
        {!! link_to('/', 'Comenzar a leer', ['class' => 'btn btn-primary btn-start']) !!}
        {!! Html::image('img/mock.png', '', ['class' => 'centrado']) !!}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h2 >Lorem ipsum</h2>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi consequatur, deleniti dignissimos ea eius esse ex itaque libero molestias nemo nesciunt odio officia possimus praesentium, quia reiciendis totam vitae?</p>
        </div>
        <div class="col-lg-4 col-md-4 image-example">
            {!! Html::image('img/boom.png', '', ['class' => 'circle']) !!}
        </div>

    </div>
@endsection
