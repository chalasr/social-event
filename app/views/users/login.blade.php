@extends('layouts.master')

@section('content')
<div class="tab-content">
    {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">Connexion</h2>

        {{ Form::text('username', null, array('class'=>'control-label col-md-3', 'placeholder'=>'Username')) }}
        {{ Form::password('password', array('class'=>'control-label col-md-3', 'placeholder'=>'Password')) }}

        {{ Form::submit('Se connecter', array('class'=>'btn btn-primary'))}}
    {{ Form::close() }}
</div>
@stop
