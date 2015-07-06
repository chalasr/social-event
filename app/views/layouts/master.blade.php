<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
    <link href="{{URL::to('/')}}/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{URL::to('/')}}/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{URL::to('/')}}/css/jquery.fileupload.css" media="screen" title="no title" charset="utf-8">
</head>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content">
    <div class="page-header md-shadow-z-1-i navbar">
        <div class="page-header-inner">
            <div class="page-logo">
                <a href="{{ URL::to('/') }}">
                <img src="{{ URL::asset('assets/admin/pages/img/logo_R-A_Innovation.png') }}" alt="logo" class="logo-default breflogo">
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
                     <li class="dropdown dropdown-user">
                        <?php $url = action('UsersController@getLogout');?>
                        <a href="<?php echo $url; ?>" class="dropdown-toggle">
                            <span class="username"> Déconnexion  &nbsp;</span>
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                @elseif(!Auth::check())
                    <li class="dropdown dropdown-user">
                        <?php $url = action('UsersController@getRegister');?>
                        <a href="<?php echo $url; ?>" class="dropdown-toggle">
                            <i>Inscription/Connexion</i>
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
            @if(Auth::check())
                @if(Auth::user()->role_id == 1)
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
                @elseif(Auth::user()->role_id == 2)
                    <li>
                        <a href="javascript:;">
                        <i class="icon-diamond"></i>
                        <span class="title">Candidature</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ URL::to('#') }}">Afficher les candidatures</a>
                            </li>
                        </ul>
                    </li>
                @elseif(Auth::user()->role_id == 3)
                    <li>
                        <a href="javascript:;">
                        <i class="icon-diamond"></i>
                        <span class="title">Administration</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                <i class="icon-diamond"></i>
                                <span class="title">Catégories</span>
                                <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ URL::to('admin/categories/') }}">Gestion Catégories</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('admin/categories/create') }}">Ajouter une Catégorie</a>
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
                                        <a href="{{ URL::to('admin/jurys/') }}">Gestion Jury</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('admin/jurys/create') }}">Ajouter un Jury</a>
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
                                      <a href="{{ URL::to('admin/candidates/')}}">Gerer les Candidatures</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
            @elseif(!Auth::check())
                    <li>
                        <a href="{{URL::to('/register') }}">
                        <i class="icon-diamond"></i>
                        <span class="title">Accés Candidat</span>
                        </a>
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
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
            <div class="text-center">
                    <img src="/assets/admin/pages/img/logos.jpg" class="footerbanner">
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
    <script src="{{URL::to('/')}}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/script.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/jquery.iframe-transport.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/jquery.fileupload.js" type="text/javascript"></script>
    <script>
    jQuery(document).ready(function() {
       Metronic.init(); // init metronic core componets
       Layout.init(); // init layout
       QuickSidebar.init(); // init quick sidebar
    });
    $(function () {
       'use strict';
       // Change this to the location of your server-side upload handler:
       var url = '{{ URL::to('upload') }}';
       var deleteUrl = '/file/remove/';
       $('#fileupload').fileupload({
           url: url,
           dataType: 'json',
           done: function (e, data) {
               $.each(data.result.files, function (index, file) {
                   $('<p/>').text(file.name).appendTo('#files');
                  /*
                   $('<p/>').html('<a href="'+deleteUrl+file.id+'">Delete</a>').appendTo('#files');
                  **/

               });
           },
           progressall: function (e, data) {
               var progress = parseInt(data.loaded / data.total * 100, 10);
               $('#progress .progress-bar').css(
                   'width',
                   progress + '%'
               );
           }
       }).prop('disabled', !$.support.fileInput)
           .parent().addClass($.support.fileInput ? undefined : 'disabled');
   });
    </script>
    </body>
</html>
