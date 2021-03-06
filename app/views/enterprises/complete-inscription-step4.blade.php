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
    {{ Form::open(array('url'=>'complete-register/step4','method' => 'post', 'class'=>'form-signup')) }}
      <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Votre entreprise en quelques chiffres</span></h2>
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
          <li class="active">
            <a href="#tab4" data-toggle="tab" class="step active">
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
          <div class="progress-bar progress-bar-success" style="width: 67.30%;"></div>
        </div>
        <div class="note note-success">
          <h4>Bref s'engage à conserver ces données <b>confidentielles</b> .</h4>
        </div>
      <div class="well">
          <table class="table">
             <thead>
                <tr>
                   <th>Année</th>
                   <th>CA</th>
                   <th>Résultat net</th>
                   <th>Effectif</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td>2013</td>
                   <td>{{ Form::text('ca_2013', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('net_2013', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_2013', null, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2014</td>
                   <td>{{ Form::text('ca_2014', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('net_2014', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_2014', null, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2015 (prévision)</td>
                   <td>{{ Form::text('ca_2015', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('net_2015', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_2015', null, array('class' => 'form-control'))}}</td>
                </tr>
             </tbody>
          </table>
      </div>
      <hr>
      <div class="well">
          <table class="table">
             <thead>
                <tr>
                   <th>Année</th>
                   <th>Montant R&D (en % du C.A.)</th>
                   <th>Effectif R&D</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td>2013</td>
                   <td>{{ Form::text('rd_2013', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_rd_2013', null, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2014</td>
                   <td>{{ Form::text('rd_2014', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_rd_2014', null, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2015 (prévision)</td>
                   <td>{{ Form::text('rd_2015', null, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_rd_2015', null, array('class' => 'form-control'))}}</td>
                </tr>
             </tbody>
          </table>
      </div>
      <hr>
      <div class="well">
        <h4><b>Votre recherche est-elle réalisée  :</b></h4>
        <div class="form-group">
          <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_internal_search', ' En interne ?')}}
          <div class="flex">
            <div>
              <label>{{Form::radio('have_internal_search', 'oui', array('class'=>'form-control'))}}Oui</label>
            </div>
            <div class="right-label-flex">
              <label>{{Form::radio('have_internal_search', 'non', array('class'=>'form-control', 'checked' => 'true'))}}Non</label>
            </div>
          </div>
          <br>
          <div class="form-group" id="internal_collaborators_input">
            {{Form::label('internal_collaborators', 'Par combien de personnes ?')}}
            {{ Form::text('internal_collaborators', null, array('class' => 'form-control'))}}
          </div>
        </div>
        <div class="form-group">
          <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_external_search', ' Avec l’aide de prestataires extérieurs ?')}}
          <div class="flex">
            <div>
              <label>{{Form::radio('have_external_search', 'oui', array('class'=>'form-control'))}}Oui</label>
            </div>
            <div class="right-label-flex">
              <label>{{Form::radio('have_external_search', 'non', array('class'=>'form-control'))}}Non</label>
            </div>
          </div>
          <br>
          <div class="form-group" id="external_collaborators_input">
            {{Form::label('external_collaborators_type', 'Lesquels ?')}}
            {{ Form::text('external_collaborators_type', null, array('class' => 'form-control'))}}
          </div>
        </div>
        <br>
        <div class="form-group">
          <h4><b>Déposez-vous des brevets, marques, dessins ou modèles ?</b></h4>
          <div class="flex">
            <div>
              <label>{{Form::radio('have_certificates', 'oui', array('class'=>'form-control'))}}Oui</label>
            </div>
            <div class="right-label-flex">
              <label>{{Form::radio('have_certificates', 'non', array('class'=>'form-control', 'checked' => 'true'))}}Non</label>
            </div>
          </div>
          <br>
          <div class="form-group" id="have_certificates_input">
            {{Form::label('project_certificates', 'Précisez le nombre de brevets, marques ou dessins et modèles déposés et pour quel type de produits ou services :')}}
            {{ Form::text('project_certificates', null, array('class' => 'form-control'))}}
          </div>
        </div>
      <div class="submitLarge">
      {{ Form::submit('Passer au paiement', ['class' => 'btn btn-primary btn-block']) }}
      </div>
      </div>
      {{ Form::close() }}
    </div>

@stop
