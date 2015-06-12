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
                @if(Auth::user()->role_id == 3)
                    <li><i class="iconup fa fa-home"></i><a href="{{ URL::to('/') }}">Bref RH</a></li>
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('/admin/categories/') }}">Categories</a></li>
                    <li><i class="iconup fa fa-folder"></i><a href="{{ URL::to('#') }}">CANDIDATS</a></li>
                    <li><i class="iconup fa fa-user"></i><a href="{{ URL::to('/admin/jurys/') }}">JURYS</a></li>
                @endif
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
