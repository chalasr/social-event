<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>Mot de passe oublié trophées Bref R-A Innovation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" media="screen"  charset="utf-8">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&ampsubset=all') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/plugins-md.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>
  </head>
  <body>
  <div class="row">
		<div class="col-md-12">
			<div class="text-center">
			  	<h1>Trophées Bref R-A Innovation</h1>
			  	<hr>
			    <h2>Générer un nouveau mot de passe</h2>
			    <div>
		      		Pour générer un nouveau mot de passe, veuillez complêter ce formulaire : <a href="{{ URL::to('password/reset', array($token)) }}">Lien</a>
		    		<br>
		    		Si vous ne pouvez pas accéder au lien, veuillez copien ce lien {{ URL::to('password/reset', array($token)) }}
		    	</div>
		    </div>
		</div>
	</div>
  </body>
</html>