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
    {{ Form::open(array('url'=>'complete-register', 'class'=>'form-signup')) }}
        <div class="form-wizard">
        <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Carte d'identité</span></h2>
        <ul class="nav nav-pills nav-justified steps">
          <li class="active">
            <a href="#tab1" data-toggle="tab" class="step" aria-expanded="true">
            <span class="number">
            1 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Identité </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            2 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Catégories </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            3 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Innovation </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            4 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Chiffres </span>
            </a>
          </li>
          <li>
            <a class="step">
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
          <div class="progress-bar progress-bar-success" style="width: 17%;"></div>
        </div>
        <hr>
        <div class="note note-success">
          Afin de participer aux Trophées Bref Rhône-Alpes de l'Innovation 2015, veuillez remplir le dossier ci-dessous.<br><br>
          Vous avez la possibilité, après chaque étape déjà validée, de revenir en arrière en vous servant du menu ci-dessus.<br>
          Une fois une étape terminée, vous pouvez quitter l'application et revenir plus tard pour finaliser votre candidature.<br>
          En tant que candidat et pour rencontrer d'autres dirigeants et décideurs, vous serez invité aux cérémonies de remise des Trophées le 23 novembre à Grenoble et le 10 décembre à Lyon.<br><br>
          Nous vous rappelons qu'un dossier clair et complet est un atout supplémentaire pour votre candidature, fortement apprécié par le jury!
        </div>
        <hr>
        <div class="clearfix"></div>
        <h4 class="text-center"><b>Entreprise concernée</b></h4>
        <hr>
        <div class="form-group">
          {{Form::label('name', 'Nom de l\'entreprise :', array('class' => 'control-label'))}}
          {{Form::text('name', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('juridical_status', 'Forme juridique :', array('class' => 'control-label'))}}
          {{Form::text('juridical_status', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('creation_date', 'Date de création :', array('class' => 'control-label'))}}
          {{Form::input('date', 'creation_date', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('have-group', 'Votre entreprise appartient-elle à un groupe ?')}}
          <div class="flex">
            <div>
              <label>{{Form::radio('have-group', 'oui', array('class'=>'form-control'))}}Oui</label>
            </div>
            <div class="right-label-flex">
              <label>{{Form::radio('have-group', 'non', array('class'=>'form-control', 'checked' => 'true'))}}Non</label>
            </div>
          </div>
        </div>
        <div id="ifgroup" class="form-group">
          {{Form::label('member_of_group', 'Si oui, lequel ?', array('class' => 'control-label'))}}
          {{Form::text('member_of_group', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('postal_address', 'Adresse :', array('class' => 'control-label'))}}
          {{Form::text('postal_address', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('address_complement', 'Complément :', array('class' => 'control-label'))}}
          {{Form::text('address_complement', null, array('class'=>'form-control', 'placeholder' => 'Facultatif'))}}
        </div>
        <div class="flex">
          <div class="form-group">
            {{Form::label('postal_code', 'Code postal :', array('class' => 'control-label'))}}
            {{Form::text('postal_code', null, array('class'=>' form-control'))}}
          </div>
          <div class="right-label-flex form-group">
            {{Form::label('city', 'Ville :', array('class' => 'control-label'))}}
            {{Form::text('city', null, array('class'=>' form-control')) }}
          </div>
        </div>
        <div class="flex">
          <div class="form-group">
            {{Form::label('phone', 'Téléphone :', array('class' => 'control-label'))}}
            {{Form::text('phone', null, array('class'=>' form-control'))}}
          </div>
          <div class="right-label-flex form-group">
            {{Form::label('telecopie', 'Télécopie :', array('class' => 'control-label'))}}
            {{Form::text('telecopie', null, array('class'=>' form-control', 'placeholder' => 'Facultatif'))}}
          </div>
        </div>
        <hr>
        <h4 class="text-center"><b>Informations concernant le dirigeant de l'entreprise</b></h4>
        <hr>
        <div class="flex">
          <div class="form-group">
            {{Form::label('leader_name', 'Nom :', array('class' => 'control-label'))}}
            {{Form::text('leader_name', null, array('class'=>'form-control'))}}
          </div>
          <div class="right-label-flex form-group">
            {{Form::label('leader_firstname', 'Prénom :', array('class' => 'control-label'))}}
            {{Form::text('leader_firstname', null, array('class'=>'form-control'))}}
          </div>
          <div class="right-label-flex form-group">
            {{Form::label('leader_position', 'Fonction :', array('class' => 'control-label'))}}
            {{Form::text('leader_position', null, array('class'=>'form-control'))}}
          </div>
        </div>

        <div class="form-group">
          {{Form::label('leader_phone', 'Téléphone :', array('class' => 'control-label'))}}
          {{Form::text('leader_phone', null, array('class'=>'form-control', 'placeholder' => 'Facultatif'))}}
        </div>

        <div class="form-group">
          {{Form::label('leader_email', 'Email :', array('class' => 'control-label'))}}
          {{Form::text('leader_email', null, array('class'=>'form-control', 'placeholder' => 'Facultatif'))}}
        </div>
        <hr>
        <h4 class="text-center"><b>Personne en charge du dossier de candidature</b></h4>
        <hr>
        <div class="flex">
          <div class="form-group">
            {{Form::label('candidate_name', 'Nom :', array('class' => 'control-label'))}}
            {{Form::text('candidate_name', null, array('class'=>'form-control'))}}
          </div>
          <div class="right-label-flex form-group">
            {{Form::label('candidate_firstname', 'Prénom :', array('class' => 'control-label'))}}
            {{Form::text('candidate_firstname', null, array('class'=>'form-control'))}}
          </div>
          <div class="right-label-flex form-group">
            {{Form::label('candidate_informations', 'Fonction :', array('class' => 'control-label'))}}
            {{Form::text('candidate_informations', null, array('class'=>'form-control'))}}
          </div>
        </div>

        <div class="flex">
          <div class="form-group">
            {{Form::label('candidate_phone', 'Téléphone :', array('class' => 'control-label'))}}
            {{Form::text('candidate_phone', null, array('class'=>' form-control'))}}
          </div>
        </div>
          <div class="form-group">
            {{Form::label('candidate_email', 'Email :', array('class' => 'control-label'))}}
            {{Form::text('candidate_email', null, array('class'=>' form-control'))}}
          </div>
        <br>
        <div class="submitLarge">
          {{ Form::submit('Enregistrer et passer à l\'étape suivante', array('class'=>'btn btn-primary btn-block')) }}
          <br>
        </div>
      </div>

      {{ Form::close() }}
@stop
