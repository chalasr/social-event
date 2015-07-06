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
  <div class="form-wizard">
        {{ Form::open(array('url'=> ['edit/complete-register/step4'],'action' => 'updateCompleteRegistrationStep4', 'method' => 'PATCH', 'class'=>'form-horizontal')) }}

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
          <a href="{{ URL::to('register/edit-complete/step4') }}" class="step"  aria-expanded="true">
          <span class="number">
          4 </span>
          <span class="desc">
          <i class="fa fa-check"></i> Chiffres </span>
          </a>
        </li>
        <li>
          <a href="{{ URL::to('register/complete/step5') }}" class="step">
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
                   <td>{{ Form::text('ca_2013', $activity->ca_2013, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('net_2013', $activity->net_2013, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_2013', $activity->effectif_2013, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2014</td>
                   <td>{{ Form::text('ca_2014',  $activity->ca_2014, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('net_2014',  $activity->net_2014, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_2014', $activity->effectif_2014, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2015 (prévision)</td>
                   <td>{{ Form::text('ca_2015', $activity->ca_2015, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('net_2015', $activity->net_2015, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_2015', $activity->effectif_2015, array('class' => 'form-control'))}}</td>
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
                   <th>Éffectif R&D</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td>2013</td>
                   <td>{{ Form::text('rd_2013', $activity->rd_2013, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_rd_2013', $activity->effectif_rd_2013, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2014</td>
                   <td>{{ Form::text('rd_2014', $activity->rd_2014, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_rd_2014', $activity->effectif_rd_2014, array('class' => 'form-control'))}}</td>
                </tr>
                <tr>
                   <td>2015 (prévision)</td>
                   <td>{{ Form::text('rd_2015', $activity->rd_2015, array('class' => 'form-control'))}}</td>
                   <td>{{ Form::text('effectif_rd_2015', $activity->effectif_rd_2015, array('class' => 'form-control'))}}</td>
                </tr>
             </tbody>
          </table>
      </div>
      <hr>
      <div class="well">
        <h4><b>Votre recherche est-elle réalisée  :</b></h4>
        <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_internal_search', ' En interne ?')}}
        <br>
        <div class="form-group" >
          {{Form::label('internal_collaborators', 'Par combien de personnes ?')}}
          {{ Form::text('internal_collaborators', $enterprise->internal_collaborators != null ? $enterprise->internal_collaborators : 'Non', array('class' => 'form-control', 'checked' => 'true'))}}
        </div>
        <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_external_search', ' Avec l’aide de prestataires extérieurs ?')}}
        <br><br>
        <div class="form-group">
          {{Form::label('external_collaborators_type', 'Lesquels ?', array('class' => 'control-label'))}}
          {{ Form::text('external_collaborators_type', $enterprise->external_collaborators_type != null ? $enterprise->external_collaborators_type : 'Non', array('class' => 'form-control'))}}
        </div>
        <br>
        <h4><b>Déposez-vous des brevets, marques, dessins ou modèles ?</b></h4>
        <br>
        <div class="form-group">
          {{Form::label('project_certificates', 'Précisez le nombre de brevets, marques ou dessins et modèles déposés et pour quel type de produits ou services :')}}
          {{ Form::text('project_certificates', $enterprise->project_certificates != null ? $enterprise->project_certificates : 'Non', array('class' => 'form-control'))}}
        </div>
        <div class="submitLarge">
        {{ Form::submit('Finaliser mon inscription', ['class' => 'btn btn-primary btn-block']) }}
        </div>
      </div>
      {{ Form::close() }}
  </div>
</div>

@stop
