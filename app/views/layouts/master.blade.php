<!DOCTYPE html>
<html>
<head>
<title>
    BrefRH
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('dropzone/css/dropzone.css') }}
</head>
<body>
<header class="nav sub-menu menu">
    <nav class="container">
        <ul class="menulist list-unstyled">
            @if(Auth::check())
                    <li><i class="iconup fa fa-user"></i> <a href="{{ URL::to('#####') }}">Profil</a></li>
                @if(Auth::user()->role_id == 1)
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('#') }}">Finaliser mon inscription</a></li>
                @elseif(Auth::user()->role_id == 2)
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('#') }}">Candidatures</a></li>
                @elseif(Auth::user()->role_id == 3)
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('/admin') }}">Administration</a></li>
                @endif
            @elseif(!Auth::check())
                <li><i class="iconup fa fa-user"></i> <a href="{{ URL::to('/users/register') }}">S'inscrire</a></li>
            @endif
        </ul>
    </nav>
        @if(Auth::check())
            <?php $url = action('UsersController@getLogout'); ?>
            <?php $pseudo = Auth::user()->username; ?>
           <div><p class="login-bouton info-user"><span style="color: #FFF;">Bienvenue <?php echo $pseudo; ?></span><a class="btn btn-default btn-sm" href="<?php echo $url; ?>">Se déconnecter</a></p></div>
        @endif
    </header>

    <div id="content">
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @elseif(Session::has('error'))
        <p class="alert alert-danger"> {{ Session::get('error') }}<p>
    @endif

        @yield('content')
    </div>

    <footer>
        <p>Bref RH</p>
    </footer>

    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('dropzone/dropzone.min.js') }}
    {{ HTML::script('js/script.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>
