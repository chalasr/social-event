@extends('layouts.master')

@section('content')
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
  <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Catégories</span></h2>
        <ul class="nav nav-pills nav-justified steps">
          <li class="done">
            <a href="{{ URL::to('register/edit-complete') }}" class="step">
            <span class="number">
            1 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Identité </span>
            </a>
          </li>
          <li class="active">
            <a href="#tab2" data-toggle="tab" class="step active">
            <span class="number">
            2 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Catégories </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            3 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Innovation </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            4 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Chiffres </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            5 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Paiement </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            6 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Finaliser </span>
            </a>
          </li>
        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
          <div class="progress-bar progress-bar-success" style="width: 33.75%;"></div>
        </div>
        <hr>
        <div class="note note-success">
            Sélectionnez au maximum 2 categories correspondant à votre innovation.
        </div>
        <div class="well">
            {{ Form::open(array('url'=>'complete-register/step2', 'class'=>'form-signup')) }}
                <div class="well">
              		<table class="table">
              		   <thead>
              		      <tr>
              		         <th>Nom</th>
              		         <th>Description</th>
              		         <th>Sélectionnez</th>
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
