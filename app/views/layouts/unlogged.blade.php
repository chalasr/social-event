<!DOCTYPE html>
<html>
<head>
<title>
Bref RH</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}
</head>
<body>
<header class="nav sub-menu menu">
    <nav class="container">
        <ul class="menulist list-unstyled">
                <li class="unlogmenu"><a href="{{ URL::to('/') }}"><i class="icondrop fa fa-home"></i><b> Bref RH</b></a></li>
                <li>{{ HTML::link('users/register', 'Inscription') }}</li>
                <li>{{ HTML::link('users/login', 'Connexion') }}</li>
        </ul>
    </nav>
</header>

    <div id="content">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @elseif(Session::has('error'))
            <p class="alert alert-danger"> {{ Session::get('error') }}<p>
        @endif

        @yield('content')
    </div>

    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/script.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>
