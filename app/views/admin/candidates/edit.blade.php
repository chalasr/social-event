@extends('layouts.admin')

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
  <div class="clearfix"></div>
  <div class="col-md-12">
    <h3>Modifier le dossier candidat</h3>
    {{-- Identifiants --}}
    <div class="portlet box blue" id="form_wizard_1">
      <div class="portlet-title">
        <h4>Identifiants</h4>
      </div>
      <div class="portlet-body form">
        {{ Form::open(array('route'=> ['admin..candidates.update', $candidate->id], 'method' => 'PATCH', 'class'=>'form-horizontal')) }}
        <div class="form-wizard">
          <div class="form-body">
            <div class="tab-content">
              <div class="tab-pane active" id="tab1">
                <div class="form-group">
                  <label class="control-label col-md-3">Adresse email<span class="required">
                    * </span>
                  </label>
                  <div class="col-md-4">
                    {{ Form::text('email',$candidate->email, array('class'=>'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Mot de passe <span class="required">
                    * </span>
                  </label>
                  <div class="col-md-4">
                    {{ Form::password('password', array('class'=>'form-control')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Confirmation <span class="required">
                    * </span>
                  </label>
                  <div class="col-md-4">
                    {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-offset-3 col-md-9">
                {{ Form::submit('Appliquer', array('class'=>'btn blue button-next'))}}
              </div>
            </div>
          </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
    {{-- Participation --}}
    <div class="portlet box blue" id="form_wizard_1">
      <div class="portlet-title">
        <h4><b>Participation</b></h4>
      </div>
      <div class="portlet-body form">
        {{ Form::open(array('route'=> ['admin..candidates.update', $candidate->id], 'method' => 'PATCH', 'class'=>'form-horizontal')) }}
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
                        <td><a class="btn btn-danger" href="{{ URL::to('/admin/candidates/remove-participation/'.$candidate->id.'/'.$category->id)}}">Supprimer</a></td>
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
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                      <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><a class="btn btn-info" href="{{ URL::to('/admin/candidates/add-participation/'.$candidate->id.'/'.$category->id)}}">Ajouter</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
