@extends('layouts.master')

@section('content')
	@if($errors->all() == true)
	    <div class="note note-danger">
	      <ul>
	          @foreach($errors->all() as $error)
	              <li>{{ $error }}</li>
	          @endforeach
	      </ul>
	    </div>
	 @endif
	 <div class="form-wizard">
		<div class="clearfix"></div>
	    <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					Paiement
				</div>
			<div class="clearfix"></div>
			<ul class="nav nav-pills nav-justified steps">
						<li class="done">
							<a href="{{ URL::to('register/edit-complete') }}" class="step">
							<span class="number">
							1 </span>
							<span class="desc">
							<i class="fa fa-check"></i> Identité </span>
							</a>
						</li>
						<li class="done">
							<a href="{{ URL::to('register/edit-complete/step2') }}" class="step">
							<span class="number">
							2 </span>
							<span class="desc">
							<i class="fa fa-check"></i> Catégories </span>
							</a>
						</li>
						<li class="done">
							<a href="{{ URL::to('register/edit-complete/step3') }}" class="step">
							<span class="number">
							3 </span>
							<span class="desc">
							<i class="fa fa-check"></i> Innovation </span>
							</a>
						</li>
	          <li class="done">
	            <a href="{{ URL::to('register/edit-complete/step4') }}" class="step">
	            <span class="number">
	            4 </span>
	            <span class="desc">
	            <i class="fa fa-check"></i> Chiffres </span>
	            </a>
	          </li>
	          <li class="active">
	            <a href="#tab4" data-toggle="tab" class="step">
	            <span class="number">
	            5 </span>
	            <span class="desc">
	            <i class="fa fa-check"></i> Paiement </span>
	            </a>
	          </li>
	          <li>
	            <a class="step">
	            <span class="number">
	            6 </span>
	            <span class="desc">
	            <i class="fa fa-check"></i> Finaliser </span>
	            </a>
	          </li>
        	</ul>
        	<div id="bar" class="progress progress-striped" role="progressbar">
          		<div class="progress-bar progress-bar-success" style="width: 83.50%;"></div>
        	</div>
		</div>
			<div class="portlet-body">
				<div class="row margin-bottom-40">

						<h3>Votre dossier ne sera validé qu'à réception du règlement de votre participation.<br>
							Les frais d'enregistrement s'élèvent à 100€ TTC par dossier de candidature.
						</h3>
						<h3>
							Une facture acquittée vous sera envoyée.
						</h3>
						<hr />
						<div class="col-md-6">
							<div class="pricing hover-effect">
								<div class="pricing-head">
									<h3>Paiement<span>
									par Paypal</span>
									</h3>
								</div>
								<div class="pricing-footer">
		            	<div class="form-actions">
		                	<div class="row">
		                  		<div class="text-center">
		               				<img src="/assets/admin/pages/img/paypalbutton.jpg">
		                      		{{ Form::open(array('url'=>'complete-register/step5/paypal')) }}
															{{ Form::submit('Je paie sur Paypal' ,array('class'=>'btn blue button-next')) }}
															{{ Form::close() }}
		                		</div>
		                	</div>
		              	</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="pricing hover-effect">
									<h3>Paiement<span>
									par chèque</span>
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
									Tél : 04 37 49 77 90<br>
								</div>
								<div class="pricing-footer">
									{{ Form::open(array('url'=>'complete-register/step5/check')) }}
									{{ Form::submit('Je paie par chèque',  array('class'=>'btn blue button-next')) }}
									{{ Form::close() }}
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="text-center">
					<h3>ATTENTION : Date limite des dépôts de candidature vendredi 2 octobre 2015</h3>
				</div>
				<div class="col-md-12">
					<h3 class="form-section">Contacts</h3>
					<p>
						POUR TOUT RENSEIGNEMENT CONCERNANT VOTRE DOSSIER OU VOTRE RÈGLEMENT, VEUILLEZ CONTACTER NOTRE PARTENAIRE, PLUS2SENS
					</p>
					<div class="col-md-4 well">
						<h4>PLUS2SENS</h4>
						<address>
							<strong>Adresse</strong><br>
							104, rue Tronchet<br>
							69006 Lyon
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
			</div>
	</div>
	<hr />
@stop
