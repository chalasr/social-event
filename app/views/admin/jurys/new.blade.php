@extends('layouts.admin')

@section('content')
    <div class="container">
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
                            <span class="help-block">
                            Veuillez indiquer le prénom </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Prénom<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('firstname',null, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer le prénom </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Adresse email<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('email',null, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer une adresse mail </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Société<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('society',null, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer une société </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Téléphone<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('phone',null, array('class'=>'form-control')) }}
                            <span class="help-block">
                            Veuillez indiquer un numéro de téléphone </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Ville<span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('city',null, array('class'=>'form-control')) }}
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
                        <a href="javascript:;" class="btn default button-previous disabled" style="display: none;">
                        <i class="m-icon-swapleft"></i> Back </a>
                          {{ Form::submit('Création du compte', array('class'=>'btn blue button-next'))}}
                        <a href="javascript:;" class="btn green button-submit" style="display: none;">
                        Submit <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
          </div>
    </div>
@stop