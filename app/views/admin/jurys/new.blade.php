@extends('layouts.admin')

@section('content')
<div class="container">

  <div class="well logform" style='float:left;'>
    {{ Form::open(array('action' => 'JurysController@store', 'class'=>'form-signup')) }}
    <h2 class="form-signup-heading">Creation compte jury</h2>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="form-group">
        {{ Form::label('lastname', 'Nom', array('class' => 'label-control')) }}
        {{ Form::text('lastname', null, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('firstname', 'Prénom', array('class' => 'label-control')) }}
        {{ Form::text('firstname', null, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => 'label-control')) }}
        {{ Form::text('email', null, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('society', 'Société', array('class' => 'label-control')) }}
        {{ Form::text('society', null, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Téléphone', array('class' => 'label-control')) }}
        {{ Form::text('phone', null, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('city', 'Ville', array('class' => 'label-control')) }}
        {{ Form::text('city', null, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Mot de passe', array('class' => 'label-control')) }}
        {{ Form::password('password', array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirmer le mot de passe', array('class' => 'label-control')) }}
        {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
    </div>

    {{ Form::submit('Ajouter', array('class'=>'btn btn-primary'))}}

    {{ Form::close() }}
  </div>

</div>
@stop
