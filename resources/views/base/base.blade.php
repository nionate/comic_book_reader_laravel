<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="theme-color" content="#158CBA">

    <link rel="stylesheet" href="{!! URL::asset('css/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('css/style.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('css/font-awesome.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('css/iziToast.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('css/bootstrap-select.min.css') !!}">

    <title>Comic Book Reader - @yield('title')</title>
</head>
<body>

<nav class="navbar navbar-default" style="margin-bottom: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"
                    aria-expanded="false">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Comic Book Reader</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li>{!! Html::decode(link_to('/', '<i class="fa fa-home" aria-hidden="true"></i> Portada')) !!}</li>
                <li>{!! Html::decode(link_to('/comic', '<i class="fa fa-book" aria-hidden="true"></i> Comics')) !!}</li>
                <li>{!! Html::decode(link_to('/comic/new', '<i class="fa fa-upload" aria-hidden="true"></i> Subir comic')) !!}</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            @if(isset($user->imagen))
                                {!! Html::image($user->imagen, '', ['class' => 'circle']) !!}
                            @else
                                {!! Html::image('img/default_avatar.png', '', ['class' => 'user_avatar_navbar']) !!}
                            @endif
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>{!! Html::decode(link_to('/user/profile/'.\Illuminate\Support\Facades\Auth::id(), '<i class="fa fa-user" aria-hidden="true"></i> Mi perfil')) !!}</li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div id="portada">
    @yield('portada')
</div>
<div class="container">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{!! URL::asset('js/app.js') !!}"></script>
<script src="{!! URL::asset('js/bootbox.min.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>

<script src="{!! URL::asset('js/iziToast.min.js') !!}"></script>

@yield('scripts')

</body>
</html>
