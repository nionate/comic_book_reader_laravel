@extends('base.base')

@section('title', 'Perfil - '.$user->name)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3">

                @if(isset($user->imagen))
                    {!! Html::image($user->imagen, '', ['class' => 'circle']) !!}
                @else
                    {!! Html::image('img/default_avatar.png', '', ['class' => 'user_avatar_profile']) !!}
                @endif

                <div class="user_details">
                    <h3>{!! $user->name !!}</h3>
                    <small>{!! $user->email !!}</small>
                </div>

                @if($owner)
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            <i class="fa fa-clock-o"></i> Actividad reciente
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-book" aria-hidden="true"></i> Comics leídos
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comments" aria-hidden="true"></i> Comentarios
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection