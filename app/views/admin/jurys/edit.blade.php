@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
              <h3>Création compte jury</h3>
            </div>
            <div class="portlet-body form">
                {{ Form::open(array('route'=> ['admin..jurys.update', $jury->id], 'method' => 'PATCH', 'class'=>'form-horizontal')) }}
                <div class="form-wizard">
                  <div class="form-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <h3 class="block"></h3>
                        <div class="form-group">
                          <label class="control-label col-md-3">Nom<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('lastname', $jury->lastname, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer le prénom </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Prénom<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('firstname',$jury->firstname, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer le prénom </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Adresse email<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('email',$jury->email, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer une adresse mail </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Société<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('society',$jury->society, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer une société </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Téléphone<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('phone',$jury->phone, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer un numéro de téléphone </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Ville<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('city',$jury->city, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer une adresse mail </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Mot de passe <span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::password('password', array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer un mot de passe </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Mot de passe <span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez confirmer le mot de passe </span>
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
    </div>
@stop
