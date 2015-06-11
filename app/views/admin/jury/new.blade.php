@extends('layouts.master')

@section('content')
<div class="container">

  <div class="well logform" style='float:left;'>
    {{ Form::open(array('action' => 'JuryController@store', 'class'=>'form-signup')) }}
    <h2 class="form-signup-heading">Creation compte jury</h2>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'Prénom')) }}
    {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Nom')) }}
    {{ Form::text('society', null, array('class'=>'input-block-level', 'placeholder'=>'Société')) }}
    {{ Form::text('phone', null, array('class'=>'input-block-level', 'placeholder'=>'Téléphone')) }}
    {{ Form::text('city', null, array('class'=>'input-block-level', 'placeholder'=>'Ville')) }}
    {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Login')) }}
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Mot de passe')) }}
    {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirmer mot de passe')) }}
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Addresse mail')) }}
    {{ Form::submit('Register', array('class'=>'btn btn-primary'))}}

    {{ Form::close() }}
  </div>

</div>
@stop
