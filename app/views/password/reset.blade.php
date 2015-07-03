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
  <div class="clearfix"></div>
  <div class="col-md-8 col-md-offset-2">
    <div class="portlet box blue">
      <div class="portlet-title">
        <h3>Demande de changement de mot de passe</h3>
      </div>
      <div class="portlet-body form">
        <form action="{{ action('RemindersController@postReset') }}" method="POST" class="form-horizontal">
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="form-wizard">
            <div class="form-body">
              <div class="tab-content">
                <div class="form-group">
                  <label class="control-label col-md-3">Adresse email <span class="required">
                    * </span>
                  </label>
                  <div class="col-md-8">
                    <input type="email" name="email" class="form-control">
                    <span class="help-block">
                      exemple : michel@dupont.fr </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nouveau mot de passe <span class="required">
                      * </span>
                    </label>
                    <div class="col-md-8">
                      <input type="password" name="password" class="form-control">
                      <span class="help-block">
                        Choississez votre nouveau mot de passe </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Confirmation mot de passe <span class="required">
                        * </span>
                      </label>
                      <div class="col-md-8">
                        <input type="password" name="password_confirmation" class="form-control">
                        <span class="help-block">
                          Confirmez votre nouveau mot de passe </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-actions">
                    <div class="row">
                      <div class="text-center">
                        <input type="submit" value="Reset Password" class="btn blue button-next">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        @stop
