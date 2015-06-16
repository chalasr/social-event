<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>BrefRH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&ampsubset=all') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
     <link href="{{ URL::asset('assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>

</head>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo">

        <div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{ URL::to('/') }}">
                <img src="/assets/admin/layout/img/logo.png" alt="logo" class="logo-default">
                </a>
                <div class="menu-toggler sidebar-toggler hide">
                </div>
            </div>
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            </a>
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                @if(Auth::check())
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> Bienvenue {{ $pseudo = Auth::user()->username }}</span>
                        </a>
                    </li>
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <?php $url = action('UsersController@getLogout');?>
                        <a href="<?php echo $url; ?>" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                @elseif(!Auth::check())
                    <li class="dropdown dropdown-user">
                                <?php $url = action('UsersController@getRegister');?>
                        <a href="<?php echo $url; ?>" class="dropdown-toggle">
                            <i>Se connecter</i>
                        </a>
                    </li>
                @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="page-sidebar navbar-collapse">
        <ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler">
                </div>
            </li>
            <li>
                <a href="javascript:;">
                <i class="icon-diamond"></i>
                <span class="title">Catégories</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ URL::to('admin/categories/') }}">
                        Gerer les catégories</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/categories/create') }}">
                        Ajouter une catégorie</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                <i class="icon-diamond"></i>
                <span class="title">Jury</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ URL::to('admin/jurys/') }}">
                        Gerer le jury</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/jurys/create') }}">
                        Ajouter un jury</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                <i class="icon-diamond"></i>
                <span class="title">Candidats</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">
                        Gerer les dossiers candidat</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height:1010px; margin-top:50px;">
            <div class="clearfix"></div>
            <h3 class="page-title"></h3>
            <div class="row">
                <div class="portlet light top-content">
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Bref RH</p>
    </footer>
    <script src="{{ URL::asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
           Metronic.init(); // init metronic core componets
           Layout.init(); // init layout
           QuickSidebar.init(); // init quick sidebar
        });
    </script>
</body>
</html>
