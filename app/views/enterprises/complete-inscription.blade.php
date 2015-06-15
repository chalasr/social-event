@extends('layouts.master')

@section('content')
<div class="well">
    {{ Form::open(array('url'=>'complete-register', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Carte d'identité</span></h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <hr>
        <h4 class="text-center"><b>Entreprise concernée</b></h4>
        <hr>
        <div class="form-group">
          {{Form::label('name', 'Nom de l\'entreprise :', array('class' => 'control-label'))}}
          {{Form::text('name', null, array('class'=>'input-block-level'))}}
        </div>
        <div class="form-group">
          {{Form::label('juridical_status', 'Forme juridique :', array('class' => 'control-label'))}}
          {{Form::text('juridical_status', null, array('class'=>'input-block-level'))}}
        </div>
        <div class="form-group">
          {{Form::label('creation_date', 'Date de création :', array('class' => 'control-label'))}}
          {{Form::text('creation_date', null, array('class'=>'input-block-level'))}}
        </div>
        <div class="form-group">
          {{Form::label('have-group', 'Votre entreprise appartient-elle à un groupe ?')}}
          <div class="flex">
            <div class="radio">
              <label>{{Form::radio('have-group', 'oui', array('class'=>'input-block-level'))}}Oui</label>
            </div>
            <div class="right-label-flex radio">
              <label>{{Form::radio('have-group', 'non', array('class'=>'input-block-level'))}}Non</label>
            </div>
          </div>
        <div id="ifgroup" class="form-group">
          {{Form::label('member_of_group', 'Si oui, lequel ?', array('class' => 'control-label'))}}
          {{Form::text('member_of_group', null, array('class'=>'input-block-level'))}}
        </div>
        <div class="form-group">
          {{Form::label('postal_address', 'Adresse postale complète :', array('class' => 'control-label'))}}
          {{Form::text('postal_address', null, array('class'=>'input-block-level'))}}
        </div>
        <div class="flex">
          <div class="form-group">
            {{Form::label('phone', 'Tèl :', array('class' => 'control-label'))}}
            {{Form::text('phone', null, array('class'=>' form-control'))}}
          </div>
          <div class=" right-label-flex form-group">
            {{Form::label('telecopie', 'Télécopie :', array('class' => 'control-label'))}}
            {{Form::text('telecopie', null, array('class'=>' form-control', 'placeholder' => 'Facultatif'))}}
          </div>
        </div>
        <div class="form-group">
          {{Form::label('leaders_informations', 'Nom, fonction, coordonnées et email du (de la) dirigeant(e) :', array('class' => 'control-label'))}}
          {{Form::text('leaders_informations', null, array('class'=>'input-block-level'))}}
        </div>
        <hr>
        <h4 class="text-center"><b>Personne en charge du dossier de candidature</b></h4>
        <hr>
        <div class="form-group">
          {{Form::label('candidate_informations', 'Nom et fonction :', array('class' => 'control-label'))}}
          {{Form::text('candidate_informations', null, array('class'=>'input-block-level'))}}
        </div>
        <div class="flex">
          <div class="form-group">
            {{Form::label('candidate_phone', 'Tèl :', array('class' => 'control-label'))}}
            {{Form::text('candidate_phone', null, array('class'=>' form-control'))}}
          </div>
          <div class="right-label-flex form-group">
            {{Form::label('candidate_email', 'Email :', array('class' => 'control-label'))}}
            {{Form::text('candidate_email', null, array('class'=>' form-control'))}}
          </div>
        </div>
        <br>
        <div class="submitLarge">
          {{ Form::submit('Enregistrer et passer à l\'étape suivante', array('class'=>'btn btn-primary btn-block btn-lg')) }}
          <br>
        </div>

      {{ Form::close() }}
</div>
@stop
