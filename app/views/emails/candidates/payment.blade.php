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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&ampsubset=all" rel="stylesheet" type="text/css"/>
    <link href="http://bref.dev5.sutunam.com/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
  			    <h2>Notification de paiement effectué par un candidat</h2>
  			    <div>
              <br><br>
  		      		<p>
                    La candidat représentant l'entreprise : <b>{{ $enterprise }}</b> vient d'effectuer le paiement de sa participation aux Trophées de l'Innovation. <br>
                    Mode de paiement: <b>{{ $paymentMode }}</b> <br>
                    En cliquant sur le lien ci-dessous, vous pouvez télécharger le dossier candidat de l'entreprise.<br><br>
                    <a class="btn btn-default" href="{{ URL::to('export/'.$user) }}">Candidature {{ $enterprise }}</a>
                    <br>
                </p> <br>
  		    	</div>
            <hr>
            <div class="text-muted">
                <a href="http://inscription.trophees-innovation-bref.com/">Trophées de l'innovation - Bref Rhône Alpes</a>
            </div>
  		    </div>
  		</div>
  	</div>
  </body>
</html>
