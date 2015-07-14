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
          <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
              <h3>Modifier la catégorie</h3>
            </div>
            <div class="portlet-body form">
                {{ Form::open(array('route'=> ['admin..categories.update', $category->id], 'method' => 'PUT','class'=>'form-horizontal', 'id'=>'submit_form')) }}
                <div class="form-wizard">
                  <div class="form-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <h3 class="block"></h3>
                        <div class="form-group">
                          <label class="control-label col-md-3">Titre
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('name',$category->name, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Description <span class="required" aria-required="true">
                          * </span>
                          </label>
                          <div class="col-md-4">
                            {{ Form::textarea('description',$category->description, array('class'=>'form-control', )) }}

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                          {{ Form::submit('Ajouter', array('class'=>'btn blue button-next'))}}
                      </div>
                    </div>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
    @stop
