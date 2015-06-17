@extends('layouts.master')

@section('content')
<div class="container">

  {{ Form::open(array('url'=>'complete-register/step4','method' => 'post', 'class'=>'form-signup')) }}
  <div class="well">
      <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Votre entreprise en quelques chiffres</span></h2>
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
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
                   <th>Moyens humains</th>
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
            <div class="submitLarge">
            {{ Form::submit('Finaliser l\'inscripion', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        {{ Form::close() }}
</div>

@stop
