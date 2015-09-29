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
              <h3>Modifier le jury</h3>
            </div>
            <div class="portlet-body form">
                {{ Form::open(array('route'=> ['admin..jurys.update', $jury->id], 'method' => 'PATCH', 'class'=>'form-horizontal')) }}
                <div class="form-wizard">
                  <div class="form-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <h3 class="block"></h3>
                        <div class="form-group">
                          <label class="control-label col-md-3">Nom
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('lastname', $jury->lastname, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Prénom
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('firstname',$jury->firstname, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Adresse email
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('email',$jury->email, array('class'=>'form-control')) }}

                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Société
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('society',$jury->society, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Téléphone
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('phone',$jury->phone, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Ville
                          </label>
                          <div class="col-md-4">
                            {{ Form::text('city',$jury->city, array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Mot de passe
                          </label>
                          <div class="col-md-4">
                            {{ Form::password('password', array('class'=>'form-control')) }}
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Confirmation Mot de passe
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
                    {{ Form::close() }}
                    <div class="form-group">
                      <div class="col-md-12">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Sélection</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($jury->categories as $category)
                              <tr>
                                <td style="width: 82%">{{ $category->name }}</td>
                                <td><a class="btn btn-danger" href="{{ URL::to('admin/jurys/removecat/'.$jury->id.'/' .$category->id)}}">Supprimer</a></td>
                              </tr>
                              @endforeach
                              @foreach($categories as $category)
                              <tr>
                                <td style="width: 82%">{{ $category->name }}</td>
                                <td><a class="btn btn-info" href="{{ URL::to('admin/jurys/addcat/'.$jury->id.'/' .$category->id)}}">Ajouter</a></td>
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
