@extends('layouts.admin')

@section('content')
<div class="well logform">
    {{ Form::open(array('route'=> ['admin..jurys.update', $jury->id], 'method' => 'PATCH', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Editer un compte jury</h2>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <div class="form-group">
            {{ Form::label('lastname', 'Nom', array('class' => 'label-control')) }}
            {{ Form::text('lastname', $jury->lastname, array('class'=>'input-block-level', 'placeholder'=>'Nom')) }}
        </div>
        <div class="form-group">
            {{ Form::label('firstname', 'Prénom', array('class' => 'label-control')) }}
            {{ Form::text('firstname', $jury->firstname, array('class'=>'input-block-level', 'placeholder'=>'Prénom')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email', array('class' => 'label-control')) }}
            {{ Form::text('email', $jury->email, array('class'=>'input-block-level', 'placeholder'=>'Addresse mail')) }}
        </div>
        <div class="form-group">
            {{ Form::label('society', 'Société', array('class' => 'label-control')) }}
            {{ Form::text('society', $jury->society, array('class'=>'input-block-level', 'placeholder'=>'Société')) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Téléphone', array('class' => 'label-control')) }}
            {{ Form::text('phone', $jury->phone, array('class'=>'input-block-level', 'placeholder'=>'Téléphone')) }}
        </div>
        <div class="form-group">
            {{ Form::label('city', 'Ville', array('class' => 'label-control')) }}
            {{ Form::text('city', $jury->city, array('class'=>'input-block-level', 'placeholder'=>'Ville')) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Mot de passe', array('class' => 'label-control')) }}
            {{ Form::password('password', array('class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Confirmer le mot de passe', array('class' => 'label-control')) }}
            {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirmer mot de passe')) }}
        </div>

        {{ Form::submit('Appliquer', array('class'=>'btn btn-primary'))}}
        {{ Form::close() }}
@stop
</div>
