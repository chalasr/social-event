@extends('layouts.master')

@section('content')
<div class="container">
    {{ Form::open(array('url'=>'complete-register/step2', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Participation</span></h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="well">
          <div class="form-group">
            {{Form::label('project_arguments', 'Nom de l\'entreprise :', array('class' => 'control-label'))}}
            {{Form::text('project_arguments', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('project_partners', 'Forme juridique :', array('class' => 'control-label'))}}
            {{Form::text('project_partners', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('project_results', 'Forme juridique :', array('class' => 'control-label'))}}
            {{Form::text('project_results', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('project_rewards', 'Date de création :', array('class' => 'control-label'))}}
            {{Form::text('project_rewards', null, array('class'=>'form-control'))}}
          </div>
          <br>
          <div class="submitLarge">
            {{ Form::submit('Valider', ['class' => 'btn btn-primary btn-block']) }}
          </div>
      	</div>

      {{ Form::close() }}
</div>

@stop
