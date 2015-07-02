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
    <div class="col-md-6">
      <div class="portlet box blue">
        <div class="portlet-title">
          <h3>Mot de passe oublié</h3>
        </div>
        <div class="portlet-body form">
	        {{ Form::open(array('action'=>'RemindersController@postRemind', 'method'=>'POST','class'=>'form-horizontal')) }}
	        	<div class="form-wizard">
	              <div class="form-body">
	                <div class="tab-content">
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
		        	</div>
		        </div>
				<div class="form-actions">
	                <div class="row">
	                  <div class="text-center">
	                      {{ Form::submit('Envoyer', array('class'=>'btn blue button-next'))}}
	                  </div>
	                </div>
	              </div>
	            </div>
	          {{ Form::close() }}
        	</div>
      	</div>
    </div>
@stop
