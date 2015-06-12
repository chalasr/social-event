@extends('layouts.master')

@section('content')
<div class="container">

<div class="well">
    {{ Form::open(array('url'=>'complete-register/step2', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Participation</span></h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div class="well">
      		<table class="table">
      		   <thead>
      		      <tr>
      		         <th>Nom</th>
      		         <th>Description</th>
      		         <th>Actions</th>
      		      </tr>
      		   </thead>
      		   <tbody>
      		   @foreach($categories as $category)
      		      <tr>
      		         <td>{{ $category->name }}</td>
      		         <td>{{ $category->description }}</td>
      		         <td><input type="checkbox" name="{{ $category->id }}"></td>
      			@endforeach
      		   </tbody>
      		</table>
          {{ Form::submit('Valider') }}
      	</div>

      {{ Form::close() }}
</div>

@stop
