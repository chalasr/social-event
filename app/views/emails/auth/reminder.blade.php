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
    <style media="screen">
      p{
        font-size: 15px !important;
      }
    </style>
  <div class="row">
		<div class="col-md-12">
			<div class="text-center">
			  	<h1>Bref Rhône-Alpes <br> Trophées de l'innovation</h1>
			  	<hr>
			    <h2>Changement de mot de passe</h2>
			    <div>
		      		<p>
		      		  Pour changer votre mot de passe, veuillez cliquez sur le lien suivant afin d'accéder au formulaire et créer votre nouveau mot de passe :
		      		</p> <br>
               <a class="btn btn-default" href="{{ URL::to('password/reset', array($token)) }}">Nouveau mot de passe</a>
		    		<br><br>
		    		<p>
              Si vous n'arrivez pas à accéder au formulaire, veuillez copier l'adressee suivante et l'ouvrir via votre naviguateur web : <br>
              {{ URL::to('password/reset', array($token)) }}
		    		</p>
		    	</div>
          <hr>
          <div class="text-muted">
              Si vous recevez ceci par erreur, merci de ne pas tenir compte de ce mail.
          </div>
		    </div>
		</div>
	</div>
  </body>
</html>
