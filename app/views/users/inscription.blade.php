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

  {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Adresse email')) }}
  {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
  {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
  {{ Form::submit('Register', array('class'=>'btn btn-primary'))}}

  {{ Form::close() }}
</div>
<div class="well logform floatRight">
  {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
  <h2 class="form-signin-heading">Continuer mon inscription</h2>

  {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Adresse email')) }}
  {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}

  {{ Form::submit('Se connecter', array('class'=>'btn btn-primary'))}}
  {{ Form::close() }}
</div>
</div>
@stop
