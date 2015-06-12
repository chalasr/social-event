@extends('layouts.admin')

@section('content')
<div class="well logform">
    {{ Form::open(array('route'=> ['admin..categories.update', $category->id], 'method' => 'PUT', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Editer une catégorie</h2>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="form-group">
            {{ Form::label('name', 'Titre', array('class' => 'label-control')) }}
            {{ Form::text('name', $category->name, array('class'=>'form-control', 'placeholder'=>'Titre')) }}
        </div>
        <div class="form-group">
            {{ Form::label('name', 'Description', array('class' => 'label-control')) }}
            {{ Form::textarea('description',$category->description, array('class'=>'form-control', 'placeholder'=>'Description')) }}
        </div>

        {{ Form::submit('Enregistrer les modifications', array('class'=>'subedit btn btn-primary'))}}
    {{ Form::close() }}
@stop
</div>
