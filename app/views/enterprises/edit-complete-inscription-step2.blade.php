@extends('layouts.master')

@section('content')
<div class="container">
    @if($errors->all() == true)
    <div class="note note-danger">
      <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
  @endif
  <div class="form-wizard">
  <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Participation</span></h2>
        <ul class="nav nav-pills nav-justified steps">
          <li>
            <a href="{{ URL::to('register/edit-complete') }}" class="step" >
            <span class="number">
            1 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Identité </span>
            </a>
          </li>
          <li class="active">
            <a href="{{ URL::to('register/edit-complete/step2') }}" class="step" aria-expanded="true">
            <span class="number">
            2 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Participation </span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('register/edit-complete/step3') }}" class="step">
            <span class="number">
            3 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Entreprise </span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('register/edit-complete/step4') }}" class="step">
            <span class="number">
            4 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Activité </span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('register/complete/step5') }}" class="step">
            <span class="number">
            5 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Payment </span>
            </a>
          </li>
          <li>
            <a href="#tab4" data-toggle="tab" class="step">
            <span class="number">
            6 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Terminer </span>
            </a>
          </li>
        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
          <div class="progress-bar progress-bar-success" style="width: 33.75%;"></div>
        </div>
  <div class="well">
      {{ Form::open(array('url'=> ['edit/complete-register-step2'],'action' => 'updateCompleteRegistrationStep2', 'method' => 'PATCH', 'class'=>'form-horizontal')) }}
          <div class="well">
        		<table class="table">
        		   <thead>
        		      <tr>
        		         <th>Nom</th>
        		         <th>Description</th>
        		         <th>Selectionner</th>
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
</div>

@stop
