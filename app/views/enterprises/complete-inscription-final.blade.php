@extends('layouts.master')

@section('content')
	<div class="container">
		<ul>
				@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
				@endforeach
		</ul>
		<div class="clearfix"></div>
	    <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
				Vous avez finalisé votre inscription.
				</div>
			</div>
			<div class="portlet-body">
				<div class="row margin-bottom-40">
					<div class="col-md-12">
						<h3 class="form-section">Contacts</h3>
						<p>
							POUR TOUT RESEIGNEMENT CONCERNANT VOTRE DOSSIER OU VOTRE RÈGLEMENT, VEUILLEZ CONTACTER NOTRE PARTENAIRE, PLUS2SENS
						</p>
						<div class="col-md-4 well">
							<h4>PLUS2SENS</h4>
							<address>
								<strong>Adresse</strong><br>
								104, rue Tronchet<br>
								69008 Lyon
							</address>
							<adresse>
								<strong>Téléphone</strong><br>
								04 37 24 02 58<br><br>
							</adresse>
							<address>
								<strong>Email</strong><br>
								<a href="mailto:carmela@plus2sens.com">
								carmela@plus2sens.com </a>
							</address>
						</div>
							<div class="col-md-6">
								<div class="text-center">
								<img src="/assets/admin/pages/img/sens2pluslogo.png" style="width: 200px; height: 200px;">
								</div>
							</div>
					</div>
						<div class="clearfix"></div>
						<hr />
						<div class="col-md-6">
							<div class="pricing hover-effect">
									<h3>Payment par chèque<span>
									</span>
									</h3>
									<h4>
									<span>
										À l'ordre de IDM Rhône-Alpes<br>
										Merci de préciser le nom de l'entreprise candidate au dos du chèque, s'il est différent du nom de la structure débitrice. Merci d'envoyer votre chèque à l'adresse suivante :</span>
									</h4>
								<div class="well">
									<h4>Bref Rhône-Alpes</h4>
									<address>
									66, cours Charlemagne<br>
									BP2429<br>
									Le Factory<br>
									69219 Lyon<br>
								</div>
							</div>
						</div>
				</div>
				<hr />
				<div class="text-center">
					<h3>ATTENTION : Date limite des dépôts de candidature vendredi 2 octobre 2015</h3>
				</div>
			</div>
		</div>
	</div>
@stop
