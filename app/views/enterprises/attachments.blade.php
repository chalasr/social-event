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
  <h3 class="text-center">Ajout de pièces jointes à votre candidature</h3>
  <div class="form-wizard">
    <br><br>
          <table class="table">
             <thead>
                <tr>
                   <th>Nom</th>
                   <th>Action</th>
                </tr>
             </thead>
             <tbody>
              @foreach($files as $file)
                <tr>
                   <td class="pieceTd">{{ $file->name }}</td>
                    <td>
                      <a class="btn btn-sm btn-info" href="{{ URL::to('admin/candidates/download/file/'.$file->id) }}"><i class="fa fa-download"></i></a> &nbsp;
                      <a class="btn btn-sm btn-danger" onclick="return confirm('Voulez vous vraiment supprimer ce fichier ?')"  href="{{ URL::to('edit/delete-file/step3/'.$file->id) }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
              @endforeach
             </tbody>
          </table>
          <hr id="newFilesHr" style="border-top: 1px solid grey !important;">
          <div id="uploadedFiles"></div>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Ajouter des fichiers supplémentaires</button>
          <hr style="border-top: 1px solid grey !important;">
          <h4>Si vous avez besoin de joindre des fichiers de plus de 50mo, <br> indiquez les liens pour les télécharger ou les visualiser en cliquant sur le bouton ci-dessous (lien Youtube, lien sur votre site internet, ...) <br> Attention les liens "wetransfer" ne sont valables que 7 jours dans la version gratuite et ne fonctionnent donc pas.</h4><br>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Ajouter des liens externes supplémentaires</button><br><br>
          <table class="table">
             <thead>
                <tr>
                   <th>Nom</th>
                   <th>Action</th>
                </tr>
             </thead>
             <tbody>
              @foreach($links as $link)
                <tr>
                   <td class="pieceTd"><a target="_blank" href="{{ $link->link }}">{{ $link->link }}</a></td>
                    <td>
                      <a class="btn btn-sm btn-info" target="_blank" href="{{ $link->link }}"><i class="fa fa-external-link"></i></a> &nbsp;
                      <a class="btn btn-sm btn-danger" onclick="return confirm('Voulez vous vraiment supprimer ce lien ?')"  href="{{ URL::to('delete-link/'.$link->id) }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
              @endforeach
             </tbody>
          </table>
          <hr id="newLinksHr" style="border-top: 1px solid grey !important;">
          <div id="uploadedLinks"></div>
          <br><br>
    <br>
  </div>

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
@stop
