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
            <i class="fa fa-check"></i> Catégories </span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('register/edit-complete/step3') }}" class="step">
            <span class="number">
            3 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Innovation </span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('register/edit-complete/step4') }}" class="step">
            <span class="number">
            4 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Chiffres </span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('register/complete/step5') }}" class="step">
            <span class="number">
            5 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Paiement </span>
            </a>
          </li>
          <li>
            <a href="#tab4" data-toggle="tab" class="step">
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
    <div class="well">
      <div class="portlet-body form">
        {{ Form::open(array('url'=> 'register/edit-complete/step2', 'method' => 'POST', 'class'=>'form-horizontal')) }}
        <div class="form-wizard">
          <div class="form-body">
            <div class="tab-content">
              <div class="tab-pane active" id="tab1">
                <hr>
                <h4 class="text-center"><b>Catégories choisies par le candidat</b></h4>
                <hr>
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
                      @foreach($candidate->categories as $category)
                      <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><a class="btn btn-danger" href="{{ URL::to('edit/complete-register/step2/remove-participation/'.$category->id)}}">Supprimer</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <hr>
                <h4 class="text-center"><b>Non choisies</b></h4>
                <hr>
                <div class="well">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Sélection</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                      <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><a class="btn btn-info" href="{{ URL::to('edit/complete-register/step2/add-participation/' .$category->id)}}">Ajouter</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="submitLarge">
                    {{ Form::submit('Valider', ['class' => 'btn btn-primary btn-block']) }}
                  </div>
              {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@stop
