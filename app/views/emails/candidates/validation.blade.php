<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>Bref R-A - Validation de votre candidature - Trophées de l'Innovation</title>
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
			  	<h1>Bref Rhône-Alpes <br> Trophée de l'innovation</h1>
			  	<hr>
			    <h2>Notification de validation d'une candidature</h2>
			    <div>
            <br><br>
		      		<p>
                  La candidature de l'entreprise : <b>{{ $enterprise }}</b> vient d'être validée par un administrateur. <br>
                  En cliquant sur le lien ci-dessous, vous pouvez télécharger le dossier candidat de l'entreprise.<br><br>
                  <a class="btn btn-default" href="{{ URL::to('export/'.$user) }}">Candidature {{ $enterprise }}</a>
                  <br>
              </p> <br>
		    	</div>
          <hr>
          <div class="text-muted">
              <a href="http://inscription.trophees-innovation-bref.com/">Trophée de l'innovation - Bref Rhône Alpes</a>
          </div>
		    </div>
		</div>
	</div>
  </body>
</html>
