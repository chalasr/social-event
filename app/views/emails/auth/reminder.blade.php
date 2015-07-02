<!DOCTYPE html>
<html class="no-js">
	<head>
	    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <meta content="width=device-width, initial-scale=1" name="viewport">
	    <meta content="" name="description">
	    <meta content="" name="author">
	    <title>Mot de passe oublié trophées Bref R-A Innovation</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="{{ URL::asset('assets/global/css/plugins-md.css') }}" rel="stylesheet" type="text/css">
	    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" media="screen"  charset="utf-8">
	    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&ampsubset=all" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
	    <link href="{{ URL::asset('assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
	    <link href="{{ URL::asset('assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="clearfix"></div>
		<div class="col-md-6">
			<div class="portlet box blue">
			    <div class="portlet-title">
					<h2>Mot de passe oublié</h2>
					<div>
						Pour générer un nouveau mot de passe, complêter ce formulaire en cliquant sur le <a href="{{ URL::to('password/reset', array($token)) }}">lien</a><br/>
						Le lien sera expiré dans {{ Config::get('auth.reminder.expire', 60) }} minutes.
					</div>
				</div>
			</div>
		</div>            
		<div class="text-center">
			<img src="/assets/admin/pages/img/logos.jpg" class="footerbanner">
        </div>
    <footer>
        <p>Bref R-A Innovation</p>
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
    <script src="{{ URL::asset('js/script.js') }}" type="text/javascript"></script>
    <script>
    jQuery(document).ready(function() {
       Metronic.init(); // init metronic core componets
       Layout.init(); // init layout
       QuickSidebar.init(); // init quick sidebar
    });
    </script>
    </body>
</html>
