@extends('layouts.master')

@section('content')
<div class="well logform">
    {{ Form::open(array('route'=> ['admin.update', $category->id], 'method' => 'PUT', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Editer une catégorie</h2>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {{ Form::text('name', $category->name, array('class'=>'input-block-level', 'placeholder'=>'Titre')) }}
        {{ Form::textarea('description',$category->description, array('class'=>'input-block-level', 'placeholder'=>'Description')) }}

        {{ Form::submit('Enregistrer les modifications', array('class'=>'subedit btn btn-primary'))}}
    {{ Form::close() }}
@stop
</div>