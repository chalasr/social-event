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
                <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{ HTML::style("htp://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all") }}
    {{ HTML::style("assets/global/plugins/font-awesome/css/font-awesome.min.css") }}
    {{ HTML::style("assets/global/plugins/simple-line-icons/simple-line-icons.min.css") }}
    {{ HTML::style("assets/global/plugins/bootstrap/css/bootstrap.min.css") }}
    {{ HTML::style("assets/global/plugins/uniform/css/uniform.default.css") }}
    {{ HTML::style("assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") }}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    {{ HTML::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css") }}
    {{ HTML::style("assets/global/plugins/fullcalendar/fullcalendar.min.css") }}
    {{ HTML::style("assets/global/plugins/jqvmap/jqvmap/jqvmap.css") }}
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    {{ HTML::style("assets/admin/pages/css/tasks.css") }}
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    {{ HTML::style("assets/global/css/components-md.css") }}
    {{ HTML::style("assets/global/css/plugins-md.css") }}
    {{ HTML::style("assets/admin/layout/css/layout.css") }}
    {{ HTML::style("assets/admin/layout/css/themes/darkblue.css") }}
    {{ HTML::style("assets/admin/layout/css/custom.css") }}
</head>
<body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo ">
<header class="nav sub-menu menu">
    <nav class="container">
        <ul class="menulist list-unstyled">
          <li><i class="iconup fa fa-home"></i><a href="{{ URL::to('/') }}">Bref RH</a></li>
            @if(Auth::check())
                    <li><i class="iconup fa fa-user"></i> <a href="{{ URL::to('#') }}">Profil</a></li>
                @if(Auth::user()->role_id == 1 && Auth::user()->enterprise_id != 0)
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('/register/complete') }}">Ma candidature</a></li>
                @elseif(Auth::user()->role_id == 1 && Auth::user()->enterprise_id == 0)
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('/register/complete') }}">Finaliser ma candidature</a></li>
                @elseif(Auth::user()->role_id == 2)
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('#') }}">Candidatures</a></li>
                @elseif(Auth::user()->role_id == 3)
                    <li><i class="iconup fa fa-cog"></i><a href="{{ URL::to('/admin/') }}">Administration</a></li>
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
    {{ HTML::script("assets/global/plugins/jquery.min.js") }}
    {{ HTML::script("assets/global/plugins/jquery-migrate.min.js") }}
    <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    {{ HTML::script("assets/global/plugins/jquery-ui/jquery-ui.min.js") }}
    {{ HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js") }}
    {{ HTML::script("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }}
    {{ HTML::script("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}
    {{ HTML::script("assets/global/plugins/jquery.blockui.min.js") }}
    {{ HTML::script("assets/global/plugins/jquery.cokie.min.js") }}
    {{ HTML::script("assets/global/plugins/uniform/jquery.uniform.min.js") }}
    {{ HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{ HTML::script("assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js") }}
    {{ HTML::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js") }}
    {{ HTML::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js") }}
    {{ HTML::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js") }}
    {{ HTML::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js") }}
    {{ HTML::script("assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js") }}
    {{ HTML::script("assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js") }}
    {{ HTML::script("assets/global/plugins/flot/jquery.flot.min.js") }}
    {{ HTML::script("assets/global/plugins/flot/jquery.flot.resize.min.js") }}
    {{ HTML::script("assets/global/plugins/flot/jquery.flot.categories.min.js") }}
    {{ HTML::script("assets/global/plugins/jquery.pulsate.min.js") }}
    {{ HTML::script("assets/global/plugins/bootstrap-daterangepicker/moment.min.js") }}
    {{ HTML::script("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js") }}
    <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
    {{ HTML::script("assets/global/plugins/fullcalendar/fullcalendar.min.js") }}
    {{ HTML::script("assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js") }}
    {{ HTML::script("assets/global/plugins/jquery.sparkline.min.js") }}
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{ HTML::script("assets/global/scripts/metronic.js") }}
    {{ HTML::script("assets/admin/layout/scripts/layout.js") }}
    {{ HTML::script("assets/admin/layout/scripts/quick-sidebar.js") }}
    {{ HTML::script("assets/admin/layout/scripts/demo.js") }}
    {{ HTML::script("assets/admin/pages/scripts/index.js") }}
    {{ HTML::script("assets/admin/pages/scripts/tasks.js") }}
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>
