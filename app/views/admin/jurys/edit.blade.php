@extends('layouts.master')

@section('content')
<div class="well logform">
    {{ Form::open(array('route'=> ['admin..jurys.update', $jury->id], 'method' => 'PATCH', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Editer un compte jury</h2>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {{ Form::text('firstname', $jury->firstname, array('class'=>'input-block-level', 'placeholder'=>'Prénom')) }}
        {{ Form::text('lastname', $jury->lastname, array('class'=>'input-block-level', 'placeholder'=>'Nom')) }}
        {{ Form::text('society', $jury->society, array('class'=>'input-block-level', 'placeholder'=>'Société')) }}
        {{ Form::text('phone', $jury->phone, array('class'=>'input-block-level', 'placeholder'=>'Téléphone')) }}
        {{ Form::text('city', $jury->city, array('class'=>'input-block-level', 'placeholder'=>'Ville')) }}
        {{ Form::text('username', $jury->username, array('class'=>'input-block-level', 'placeholder'=>'Login')) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Mot de passe')) }}
        {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirmer mot de passe')) }}
        {{ Form::text('email', $jury->email, array('class'=>'input-block-level', 'placeholder'=>'Addresse mail')) }}

        {{ Form::submit('Appliquer', array('class'=>'btn btn-primary'))}}
        {{ Form::close() }}
@stop
</div>
