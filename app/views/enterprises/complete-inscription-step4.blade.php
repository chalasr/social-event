@extends('layouts.master')

@section('content')
<div class="container">

  <div class="well">
      {{ Form::open(array('url'=>'complete-register/step4', 'enctype' => 'multipart/form-data','method' => 'post', 'files' => true, 'class'=>'form-signup')) }}
          <h2 class="form-signup-heading">Ajout de fichier</h2>
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
            {{ Form::file('files[]', array('multiple'=>true)) }}

            {{ Form::submit('Valider l\'ajout') }}
        {{ Form::close() }}
  </div>
</div>

@stop
