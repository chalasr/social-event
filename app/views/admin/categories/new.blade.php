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

        <div class="form-group">
            {{ Form::label('name', 'Titre', array('class' => 'label-control')) }}
            {{ Form::text('name', null, array('class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('name', 'Description', array('class' => 'label-control')) }}
            {{ Form::textarea('description', null, array('class'=>'form-control')) }}
        </div>

        {{ Form::submit('Ajouter', array('class'=>'btn btn-primary'))}}
    {{ Form::close() }}
    @stop
</div>
