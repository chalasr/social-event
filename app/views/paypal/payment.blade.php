@extends('layouts.master')

@section('content')
<div class="tab-content">
    {{ Form::open(array('url' => '/payment', 'class'=>'form-signin')) }}

        {{ Form::submit('Se connecter', array('class'=>'btn btn-primary'))}}
    {{ Form::close() }}
</div>
@stop