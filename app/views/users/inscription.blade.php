@extends('layouts.master')

@section('content')
<div class="container">

    <div class="well logform floatLeft">
      {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
      <h2 class="form-signup-heading">Inscription</h2>
      <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      <div class="form-group">
          {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Adresse email')) }}
      </div>
      <div class="form-group">
          {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
      </div>
      <div class="form-group">
          {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
      </div>
      <div class="form-group">
          {{ Form::submit('Register', array('class'=>'btn btn-primary'))}}
      </div>
      {{ Form::close() }}
    </div>

    <div class="well logform floatRight">
      {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
      <h2 class="form-signin-heading">Continuer mon inscription</h2>

      <div class="form-group">
          {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Adresse email')) }}
      </div>
      <div class="form-group">
          {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
      </div>
      <div class="form-group">
          {{ Form::submit('Se connecter', array('class'=>'btn btn-primary'))}}
      </div>
      {{ Form::close() }}
    </div>

</div>
@stop
