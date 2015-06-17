@extends('layouts.master')

@section('content')
<div class="container">

          <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Participation</span></h2>
  <div class="well">
      {{ Form::open(array('url'=>'complete-register/step2', 'class'=>'form-signup')) }}
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
                    </tr>
        			@endforeach
        		   </tbody>
        		</table>
            <div class="submitLarge">
              {{ Form::submit('Valider', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        	</div>

        {{ Form::close() }}
  </div>
</div>

@stop
