<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>Trophées Bref R-A Innovation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::to('/')}}/favicon.ico" media="screen"  charset="utf-8">
    <link href="{{URL::to('/')}}/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&ampsubset=all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{URL::to('/')}}/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
</head>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content">

        <div class="page-header md-shadow-z-1-i navbar">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{ URL::to('/') }}">
                <img src="{{URL::to('/')}}/assets/admin/pages/img/logo_R-A_Innovation.png" alt="logo" class="logo-default breflogo">
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
                            <span class="username username-hide-on-mobile"> {{ $pseudo = Auth::user()->email }} &nbsp;</span>
                        </a>
                    </li>
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="{{ URL::to('/users/logout') }}" class="dropdown-toggle">
                          <span class="username"> Déconnexion  &nbsp;</span>
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                @elseif(!Auth::check())
                    <li class="dropdown dropdown-user">
                        <a href="{{ URL::to('/register') }}" class="dropdown-toggle">
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
                        Gestion Catégories</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/categories/create') }}">
                        Ajouter une Catégorie</a>
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
                        Gestion Jury</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/jurys/create') }}">
                        Ajouter un Jury</a>
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
                        <a href="{{ URL::to('admin/candidates/')}}">
                        Gestion Candidatures</a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->enterprise_id)
            <li>
                <a href="javascript:;">
                <i class="icon-diamond"></i>
                <span class="title">Ma candidature</span>
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                  <li>
                      <a href="{{ URL::to('/register/complete') }}">Finaliser ma candidature</a>
                  </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height:1010px; margin-top:50px;">
            <div class="clearfix"></div>
            <h3 class="page-title"></h3>
            <div class="row">
                <div class="portlet light top-content">
                    @if(Session::has('message'))
                        <p class="alert alert-success flash-success">{{ Session::get('message') }}</p>
                    @elseif(Session::has('error'))
                        <p class="alert alert-danger flash-danger">{{ Session::get('error') }}</p>
                    @endif
                    <div class="container">
                      @yield('content')
                    </div>
                    <div class="text-center">
                      <img src="{{URL::to('/')}}/assets/admin/pages/img/logos.png" class="footerbanner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Bref R-A Innovation</p>
    </footer>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    x<script src="{{URL::to('/')}}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/jquery.iframe-transport.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/jquery.fileupload.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/script.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        //  Metronic.init(); // init metronic core componets
         Layout.init(); // init layout
         QuickSidebar.init(); // init quick sidebar
    		//  setTimeout("$('.checker').removeClass('checker')",1000 );
    		//  setTimeout("$('.validTd div').addClass('checker')",1500 );
    	});
    </script>
</body>
</html>
