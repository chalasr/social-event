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
            {{Form::label('project_arguments', 'Argumentez votre candidature en décrivant l\'origine du projet et l\'intêret de l\'innovation :', array('class' => 'control-label'))}}
            {{Form::text('project_arguments', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('project_results', 'Quels sont les premiers résultats (qualitatifs et quantitatifs) de cette innovation ? Quelles en sont les perspectives commerciales ou stratégiques ?', array('class' => 'control-label'))}}
            {{Form::text('project_results', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('have_partners', 'Votre innovation est-elle soutenue par des organismes ou des institutions ?', array('class' => 'control-label'))}}
            <div class="flex">
              <div>
                <label>{{Form::radio('have-group', 'oui', array('class'=>'form-control'))}}Oui</label>
              </div>
              <div class="right-label-flex">
                <label>{{Form::radio('have-group', 'non', array('class'=>'form-control'))}}Non</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            {{Form::label('project_partners', 'Lesquels ?', array('class' => 'control-label'))}}
            {{Form::text('project_partners', null, array('class'=>'form-control'))}}
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
