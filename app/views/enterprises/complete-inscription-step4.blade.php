@extends('layouts.master')

@section('content')
<div class="container">

  <div class="well">
      {{ Form::open(array('url'=>'complete-register/step2', 'class'=>'form-signup')) }}
          <h2 class="form-signup-heading">UPLOAD <span class="floatRight">Participation</span></h2>
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>

            {{ Form::submit('Valider') }}
        {{ Form::close() }}
  </div>
</div>

@stop
