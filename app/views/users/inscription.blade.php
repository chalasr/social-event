@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="clearfix"></div>
    <div class="col-md-6">
      <div class="portlet box blue">
        <div class="portlet-title">
          <h3>S'inscrire</h3>
        </div>
        <div class="portlet-body form">
            {{ Form::open(array('url'=>'users/create','class'=>'form-horizontal')) }}
            <div class="form-wizard">
              <div class="form-body" style="height:252px;">
                <div class="tab-content">
                  <div class="tab-pane active">
                    <div class="form-group">
                      <label class="control-label col-md-3">Adresse email <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-8">
                        {{ Form::text('email', null, array('class'=>'form-control')) }}
                        <span class="help-block">
                        exemple : michel@dupont.fr </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Mot de passe <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-8">
                        {{ Form::password('password', array('class'=>'form-control')) }}
                        <span class="help-block">
                        Veuillez indiquer votre mot de passe </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Confirmation mot de passe <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-8">
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
                  <div class="text-center">
                      {{ Form::submit('Inscription', array('class'=>'btn blue button-next'))}}
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
              <div class="form-body" style="height:252px;">
                <div class="tab-content">
                  <div class="tab-pane active">
                    <div class="form-group" id="auth_firstinput">
                      <label class="control-label col-md-3">Adresse email <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-8">
                        {{ Form::text('email', null, array('class'=>'form-control')) }}
                        <span class="help-block">
                        Veuillez indiquer votre adresse email </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Mot de passe <span class="required">
                      * </span>
                      </label>
                      <div class="col-md-8">
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
                  <div class="text-center">
                      {{ Form::submit('Se connecter', array('class'=>'btn blue button-next'))}}
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
