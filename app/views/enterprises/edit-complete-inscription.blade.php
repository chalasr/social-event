@extends('layouts.master')

@section('content')
<div class="container">
  @if($errors->all() == true)
    <div class="note note-danger">
      <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
  @endif
     {{ Form::open(array('url'=> ['edit/complete-register'],'action' => 'updateCompleteRegistration', 'method' => 'PATCH', 'class'=>'form-horizontal')) }}
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
            <a href="#tab2" data-toggle="tab" class="step">
            <span class="number">
            2 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Participation </span>
            </a>
          </li>
          <li>
            <a href="#tab3" data-toggle="tab" class="step">
            <span class="number">
            3 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Entreprise </span>
            </a>
          </li>
          <li>
            <a href="#tab4" data-toggle="tab" class="step">
            <span class="number">
            4 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Activité </span>
            </a>
          </li>
          <li>
            <a href="#tab4" data-toggle="tab" class="step">
            <span class="number">
            5 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Payment </span>
            </a>
          </li>
          <li>
            <a href="#tab4" data-toggle="tab" class="step">
            <span class="number">
            6 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Terminer </span>
            </a>
          </li>
        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
          <div class="progress-bar progress-bar-success" style="width: 17%;"></div>
        </div>
        <hr>
          <div class="note note-success">
             Vous êtes désormais pré-inscris, afin de finaliser votre candidature, vous devez remplir le formulaire ci-dessous.<br>
              Si vous le souhaitez, vous pouvez revenir plus tard pour cette étape.
          </div>
        <hr>
        <div class="clearfix"></div>
        <h4 class="text-center"><b>Entreprise concernée</b></h4>
        <hr>
        <div class="form-group">
          {{Form::label('name', 'Nom de l\'entreprise :', array('class' => 'control-label'))}}
          {{Form::text('name', $enterprise->name, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('juridical_status', 'Forme juridique :', array('class' => 'control-label'))}}
          {{Form::text('juridical_status', $enterprise->juridical_status, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('creation_date', 'Date de création :', array('class' => 'control-label'))}}
          {{Form::input('date', 'creation_date', $enterprise->creation_date, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('have-group', 'Votre entreprise appartient-elle à un groupe ?')}}
          {{Form::text('member_of_group', $enterprise->member_of_group, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
          {{Form::label('postal_address', 'Adresse postale complète :', array('class' => 'control-label'))}}
          {{Form::text('postal_address', $enterprise->postal_address, array('class'=>'form-control'))}}
        </div>
        <div class="flex">
          <div class="form-group">
            {{Form::label('phone', 'Tèl :', array('class' => 'control-label'))}}
            {{Form::text('phone', $enterprise->phone, array('class'=>' form-control'))}}
          </div>
          <div class=" right-label-flex form-group">
            {{Form::label('telecopie', 'Télécopie :', array('class' => 'control-label'))}}
            {{Form::text('telecopie', $enterprise->telecopie, array('class'=>' form-control', 'placeholder' => 'Facultatif'))}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('leaders_informations', 'Nom, fonction, coordonnées et email du (de la) dirigeant(e) :', array('class' => 'control-label'))}}
          {{Form::text('leaders_informations', $enterprise->leaders_informations, array('class'=>'form-control'))}}
        </div>
        <hr>
        <h4 class="text-center"><b>Personne en charge du dossier de candidature</b></h4>
        <hr>
        <div class="form-group">
          {{Form::label('candidate_informations', 'Nom et fonction :', array('class' => 'control-label'))}}
          {{Form::text('candidate_informations', $enterprise->candidate_informations, array('class'=>'form-control'))}}
        </div>
        <div class="flex">
          <div class="form-group">
            {{Form::label('candidate_phone', 'Tèl :', array('class' => 'control-label'))}}
            {{Form::text('candidate_phone', $enterprise->candidate_phone, array('class'=>' form-control'))}}
          </div>
        </div>
          <div class="form-group">
            {{Form::label('candidate_email', 'Email :', array('class' => 'control-label'))}}
            {{Form::text('candidate_email', $enterprise->candidate_email, array('class'=>' form-control'))}}
          </div>
        <br>
        <div class="submitLarge">
          {{ Form::submit('Enregistrer les modifications', array('class'=>'btn btn-primary btn-block')) }}
          <br>
        </div>
      </div>

      {{ Form::close() }}
</div>
@stop
