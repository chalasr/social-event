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
                <h3>Ajouter une catégorie</h3>
            </div>
            <div class="portlet-body form">
                {{ Form::open(array('action' => 'CategoriesController@store','class'=>'form-horizontal')) }}
                <div class="form-wizard">
                  <div class="form-body">
                    <div class="tab-content">
                      <div class="tab-pane active">
                        <h3 class="block"></h3>
                        <div class="form-group">
                          <label class="control-label col-md-3">Titre <span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('name', null, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Description <span class="required">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::textarea('description',null, array('class'=>'form-control')) }}
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
                          {{ Form::submit('Ajouter', array('class'=>'btn blue button-next'))}}
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
