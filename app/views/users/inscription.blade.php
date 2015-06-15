@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="clearfix"></div>    
    <div class="col-md-6">
      <div class="portlet box blue">
        <div class="portlet-title">
          <h3>S'enregistrer</h3> 
        </div>
        <div class="portlet-body form">
            {{ Form::open(array('url'=>'users/create','class'=>'form-horizontal')) }}
            <div class="form-wizard">
              <div class="form-body">
                <div class="tab-content">
                  <div class="alert alert-danger display-none">
                        <button class="close" data-dismiss="alert"></button>
                        Veuillez verifier les champs.
                  </div>
                  <div class="alert alert-success display-none">
                        <button class="close" data-dismiss="alert"></button>
                        Inscription validé !
                      </div>
                  <div class="tab-pane active">
                    <div class="form-group">
                      <label class="control-label col-md-3">Adresse email <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-4">
                        {{ Form::text('email', null, array('class'=>'form-control')) }}
                        <span class="help-block">
                        Veuillez indiquer votre adresse email </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Mot de passe <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-4">
                        {{ Form::password('password', array('class'=>'form-control')) }}
                        <span class="help-block">
                        Veuillez indiquer votre mot de passe </span>
                      </div>
                    </div>
                                      <div class="form-group">
                      <label class="control-label col-md-3">Confirmation mot de passe <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-4">
                        {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
                        <span class="help-block">
                        Veuillez confirmer votre mot de passe </span>
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
                      {{ Form::submit('Inscription', array('class'=>'btn blue button-next'))}}
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
    <div class="col-md-6">
      <div class="portlet box blue">
        <div class="portlet-title">
          <h3>Se connecter</h3>
        </div>
        <div class="portlet-body form">
            {{ Form::open(array('url'=>'users/signin','class'=>'form-horizontal')) }}
            <div class="form-wizard">
              <div class="form-body" style="height:305px;">
                <div class="tab-content">
                  <div class="tab-pane active">
                    <div class="form-group">
                      <label class="control-label col-md-3">Adresse email <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-4">
                        {{ Form::text('email', null, array('class'=>'form-control')) }}
                        <span class="help-block">
                        Veuillez indiquer votre adresse email </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Mot de passe <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-4">
                        {{ Form::password('password', array('class'=>'form-control')) }}
                        <span class="help-block">
                        Veuillez indiquer votre mot de passe </span>
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
                      {{ Form::submit('Se connecter', array('class'=>'btn blue button-next'))}}
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
</div>
@stop
