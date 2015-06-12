<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>BrefRH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--         {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('dropzone/css/dropzone.css') }} -->
    <link href="{{ URL::asset('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&ampsubset=all') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet') }}" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/components-md.css" id="style_components') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/plugins-md.css" rel="stylesheet') }}" type="text/css"/>
    <link href="{{ URL::asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ URL::asset('assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
</head>
<<<<<<< HEAD
    <body class="page-md page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo">

        <div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.html">
                <img src="../../assets/admin/layout/img/logo.png" alt="logo" class="logo-default">
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
                        <a href="{{ URL::to('admin/juries/') }}">
                        Gerer le jury</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/juries/create') }}">
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
            @if(Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
            <div class="clearfix"></div>
            <div class="row">
                <div class="portlet light">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Bref RH</p>
    </footer>

    <!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{ URL::asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ URL::asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/pages/scripts/index.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   Index.init();
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>




</body>
</html>
