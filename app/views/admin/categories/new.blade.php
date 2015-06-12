@extends('layouts.admin')

@section('content')
<div class="well logform">
    {{ Form::open(array('action' => 'CategoriesController@store')) }}
        <h2 class="form-signup-heading">Ajouter une catégorie</h2>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'Titre')) }}
        {{ Form::text('description', null, array('class'=>'input-block-level', 'placeholder'=>'Description')) }}

        {{ Form::submit('Ajouter', array('class'=>'btn btn-primary'))}}
    {{ Form::close() }}
    @stop
</div>
