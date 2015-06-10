@extends('layouts.unlogged')

@section('content')
<div class="container">

<div class="well logform" style='float:left;'>
    {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Finaliser votre Inscription</h2>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
        {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
        {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
        {{ Form::submit('Register', array('class'=>'btn btn-primary'))}}

      {{ Form::close() }}
</div>
