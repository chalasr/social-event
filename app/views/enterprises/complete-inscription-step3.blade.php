@extends('layouts.master')

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
  <div class="form-wizard">
    {{ Form::open(array('url'=>'complete-register/step3', 'class'=>'form-signup','enctype' => 'multipart/form-data', 'files' => true)) }}
        <h2 class="form-signup-heading">Votre candidature <span class="floatRight">Questionnaire</span></h2>
        <ul class="nav nav-pills nav-justified steps">
          <li class="done">
            <a href="{{ URL::to('register/edit-complete') }}" class="step">
            <span class="number">
            1 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Identité </span>
            </a>
          </li>
          <li class="done">
            <a href="{{ URL::to('register/edit-complete/step2') }}" class="step">
            <span class="number">
            2 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Catégories </span>
            </a>
          </li>
          <li class="active">
            <a href="#tab3" data-toggle="tab" class="step active">
            <span class="number">
            3 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Innovation </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            4 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Chiffres </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            5 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Paiement </span>
            </a>
          </li>
          <li>
            <a class="step">
            <span class="number">
            6 </span>
            <span class="desc">
            <i class="fa fa-check"></i> Finaliser </span>
            </a>
          </li>
        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
          <div class="progress-bar progress-bar-success" style="width: 51.40%;"></div>
        </div>
        <div class="well">
          <div class="form-group">
            {{Form::label('enterprise_activity', 'Décrivez, en quelques lignes, la nature de l’activité de votre entreprise.', array('class' => 'control-label'))}}
            {{Form::textarea('enterprise_activity', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('project_origin', 'Quelle est l’origine de votre innovation ? A quel besoin répond-elle ? ', array('class' => 'control-label'))}}
            {{Form::textarea('project_origin', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('innovative_arguments', 'En quoi votre innovation se différencie-t-elle des produits ou services existants ? ', array('class' => 'control-label'))}}
            {{Form::textarea('innovative_arguments', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('wanted_impact', 'Quel est votre marché cible ? National ou international ?', array('class' => 'control-label'))}}
            {{Form::textarea('wanted_impact', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('product_informations', 'A quel prix entendez-vous vendre votre produit ou service innovant ? A travers quels canaux de distribution (grossistes, grande distribution, réseau en propre, distributeurs, etc. ) ?', array('class' => 'control-label'))}}
            {{Form::textarea('product_informations', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('project_results', 'Concernant le produit ou service concerné, quels sont vos premiers résultats ? Et vos perspectives commerciales (chiffre d’affaires généré) à moyen terme ?', array('class' => 'control-label'))}}
            {{Form::textarea('project_results', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('have_partners', 'Votre innovation est-elle soutenue par des organismes ou des institutions ?', array('class' => 'control-label'))}}
            <div class="flex">
              <div>
                <label>{{Form::radio('have_partners', 'oui', array('class'=>'form-control'))}}Oui</label>
              </div>
              <div class="right-label-flex">
                <label>{{Form::radio('have_partners', 'non', array('class'=>'form-control', 'checked' => 'true'))}}Non</label>
              </div>
            </div>
          </div>
          <div class="form-group" id="input_project_partners">
            {{Form::label('project_partners', 'Lesquels ?', array('class' => 'control-label'))}}
            {{Form::text('project_partners', null, array('class'=>'form-control'))}}
          </div>
          <div class="form-group">
            {{Form::label('project_rewards', 'Votre entreprise a-t-elle été déjà récompensée pour cette innovation ou pour d’autres innovations ?', array('class' => 'control-label'))}}
            <div class="flex">
              <div>
                <label>{{Form::radio('have_rewards', 'oui', array('class'=>'form-control'))}}Oui</label>
              </div>
              <div class="right-label-flex">
                <label>{{Form::radio('have_rewards', 'non', array('class'=>'form-control', 'checked' => 'true'))}}Non</label>
              </div>
            </div>
          </div>
          <div class="form-group" id="input_project_rewards">
            {{Form::label('project_rewards', 'Par quel organisme ?', array('class' => 'control-label'))}}
            {{Form::text('project_rewards', null, array('class'=>'form-control'))}}
          </div>
          <br>
          <div class="form-group">
              <h4>
                N’hésitez pas à joindre à votre dossier des produits (échantillons), photos, vidéos, et/ou un dossier de presse.
              </h4><br>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Ajouter des fichiers</button>
              <br>
              <div id="uploadedFiles"></div>
              <hr style="border-top: 1px solid grey !important;">
              <h4>Si vous avez besoin de joindre des fichiers de plus de 50mo, <br> indiquez les liens pour les télécharger ou les visualiser en cliquant sur le bouton ci-dessous (lien Youtube, lien sur votre site internet, ...) <br> Attention les liens "wetransfer" ne sont valables que 7 jours dans la version gratuite et ne fonctionnent donc pas.</h4><br>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Ajouter des liens externes</button>
          </div>
          <div id="uploadedLinks"></div>
          <hr id="newLinksHr" style="border-top: 1px solid grey !important;">
          <br>
          <div class="submitLarge">
            {{ Form::submit('Valider', ['class' => 'btn btn-primary btn-block']) }}
          </div>
      	</div>

      {{ Form::close() }}

      {{--Files Upload modal--}}
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Pièces jointes</h4>
            </div>
            <div class="modal-body">
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Sélectionnez vos fichiers</span>
                    <input id="fileupload" type="file" name="files[]" multiple>
                </span>
                <br>
                <span class="text-muted"><br>
                    Formats autorisés: PDF, ZIP, DOC, DOCX <br>
                    Taille maximale: 50Mo
                </span>
                <br>
                <br>
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>
                <div id="files" class="files"></div>
            <div class="modal-footer">
              <button id="submitUpload" type="button" class="btn btn-default" data-dismiss="modal">Valider</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{--END Files Upload modal--}}

    {{--Links Upload modal--}}
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Pièces jointes</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <input class="form-control" type="text" name="link" id="link">
              </div>
                <span class="btn btn-success" id="submitLink">
                    <i class="fa fa-plus"></i>
                    <span>Ajouter votre lien</span>
                </span>
                <br><br>
                <div id="links" class="links"></div>
                <div class="modal-footer">
                  <button id="submitUploadLink" type="button" class="btn btn-default" data-dismiss="modal">Valider</button>
                </div>
          </div>
        </div>
      </div>
    </div>
    {{--END Links Upload modal--}}
    </div>
@stop
