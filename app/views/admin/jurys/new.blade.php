@extends('layouts.admin')

@section('content')
    <div class="container">
      <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
              <h3>Création compte jury</h3>
            </div>
            <div class="portlet-body form">
                {{ Form::open(array('action'=>'JurysController@store','class'=>'form-horizontal')) }}
                <div class="form-wizard">
                  <div class="form-body">
                    <div class="tab-content">
                      <div class="tab-pane active">
                        <h3 class="block"></h3>
                        <div class="form-group">
                          <label class="control-label col-md-3">Nom<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('lastname', null, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Prénom<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('firstname',null, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Adresse email<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('email',null, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Société<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('society',null, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Téléphone<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('phone',null, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Ville<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('city',null, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Catégorie<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            <select class="form-control input-large" name="category">
                              <option selected disabled>Veuillez selectionner</option>
                              @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                            </select>
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
                          <label class="control-label col-md-3">Confirmation du Mot de passe <span class="required">
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
                          {{ Form::submit('Création du compte', array('class'=>'btn blue button-next'))}}
                      </div>
                    </div>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
          </div>
      </div>
    </div>
@stop
