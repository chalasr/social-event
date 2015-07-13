@extends('layouts.master')

@section('content')
<style media="screen">
    label {
      font-weight: bold !important;
    }
    .form-control{
      height: inherit !important;
    }
</style>
<div class="container">
  <h3 class="text-center">Dossier de candidature - Trophée de l'innovation <br>Bref Rhône-Alpes</h3>
  <br>
  <br>
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
      <div class="panel panel-default">
        <div class=" panel-heading">
          <h3 class="panel-title">{{{$enterprise ? $enterprise->name : $candidate->email}}} <a class="floatRight btn btn-xs btn-default" target="_blank" href="{{ URL::to('export/'.$candidate->id) }}"><i class="fa fa-file-pdf-o"></i> PDF</a></h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class=" col-md-9 col-lg-12">
              @if($enterprise)
              <div class="pdfpage">
                <h4 class="text-left"><b>1) Identité</b></h4>
                <br>
                <table class="table table-hover table-user-information">
                  <tbody>
                    <tr>
                      <td class="boldLabel">Nom de l'entreprise</td>
                      <td>{{ $enterprise->name }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Membre d'un groupe</td>
                      <td>{{ $enterprise->member_of_group != null ? $enterprise->member_of_group : 'Non' }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Forme Juridique</td>
                      <td>{{ $enterprise->juridical_status }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Date de création</td>
                      <td>{{ $enterprise->creation_date }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Adresse</td>
                      <td>{{ $enterprise->postal_address }}&nbsp;{{ $enterprise->address_complement }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Code postal</td>
                      <td>{{ $enterprise->postal_code }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Ville</td>
                      <td>{{ $enterprise->city }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Nom, prénom du dirigeant</td>
                      <td>{{ $enterprise->leader_name }}&nbsp;{{ $enterprise->leader_firstname }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Fonction du dirigeant</td>
                      <td>{{ $enterprise->leader_position }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Nom, Prénom du candidat</td>
                      <td>{{ $enterprise->candidate_name }}&nbsp;{{ $enterprise->candidate_firstname }}</td>
                    </tr>

                    <tr>
                      <td class="boldLabel">Fonction du candidat</td>
                      <td>{{ $enterprise->candidate_informations }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Téléphone Candidat</td>
                      <td>{{ $enterprise->candidate_phone }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Email candidat</td>
                      <td>{{ $enterprise->candidate_email }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Téléphone</td>
                      <td>{{ $enterprise->phone }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Télécopie</td>
                      <td>{{ $enterprise->telecopie }}</td>
                    </tr>
                    <tr>
                      <td class="boldLabel">Site web</td>
                      <td>{{ $enterprise->website }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                <h4 class="text-left"><b>2) Catégories</b></h4><br>
                <p class="form-control">
                  @foreach ($candidate->categories()->get() as $category)
                    {{ $category->name }} <br>
                  @endforeach
                </p>
                <br>
              </div>
                @endif
              @if($survey)
              <br>
              <div class="pdfpage">
                <h4 class="text-left"><b>3) Innovation</b></h4><br>
                  <div class="form-group">
                    {{Form::label('enterprise_activity', 'Décrivez, en quelques lignes, la nature de l’activité de votre entreprise.', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{ nl2br($survey->enterprise_activity) }}
                    </p>
                  </div><br>
                  <div class="form-group">
                    {{Form::label('project_origin', 'Quelle est l’origine de votre innovation ? A quel besoin répond-elle ? ', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{ nl2br($survey->project_origin) }}
                    </p>
                  </div><br>
                  <div class="form-group">
                    {{Form::label('innovative_arguments', 'En quoi votre innovation se différencie-t-elle des produits ou services existants ? ', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{ nl2br($survey->innovative_arguments) }}
                    </p>
                  </div><br>
                  <div class="form-group">
                    {{Form::label('wanted_impact', 'Quel est votre marché cible ? National ou international ?', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{ nl2br($survey->wanted_impact) }}
                    </p>
                  </div><br>
              </div>
              <div class="pdfpage">
                  <div class="form-group">
                    {{Form::label('product_informations', 'A quel prix entendez-vous vendre votre produit ou service innovant ? A travers quels canaux de distribution (grossistes, grande distribution, réseau en propre, distributeurs, etc. ) ?', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{ nl2br($survey->product_informations) }}
                    </p>
                  </div><br>
                  <div class="form-group">
                    {{Form::label('project_results', 'Concernant le produit ou service concerné, quels sont vos premiers résultats ? Et vos perspectives commerciales (chiffre d’affaires généré) à moyen terme ?', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{ nl2br($survey->project_results) }}
                    </p>
                  </div><br>
                  <div class="form-group">
                    {{Form::label('have_partners', 'Votre innovation est-elle soutenue par des organismes ou des institutions ?', array('class' => 'control-label'))}}
                    {{Form::label('project_partners', 'Si oui, lesquels ?', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{{$survey->project_partners != null ? nl2br($survey->project_partners) : 'Non'}}}
                    </p>
                  </div><br>
                  <div class="form-group">
                    {{Form::label('project_rewards', 'Votre entreprise a-t-elle été déjà récompensée pour cette innovation ou pour d’autres innovations ?', array('class' => 'control-label'))}}
                    {{Form::label('project_rewards', 'Si oui, par quel organisme ?', array('class' => 'control-label'))}}
                    <p class="form-control">
                      {{{$survey->project_rewards != null ? nl2br($survey->project_rewards) : 'Non'}}}
                    </p>
                  </div><br>
              </div>
              @endif
              @if($activity)
              <div class="pdfpage">
                <br><br>
                  <h4 class="text-left"><b>4) Chiffres</b></h4>
                  <br>
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Année</th>
                           <th>CA</th>
                           <th>Résultat net</th>
                           <th>Effectif</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>2013 :</td>
                           <td>{{ $activity->ca_2013 }}</td>
                           <td>{{ $activity->net_2013 }}</td>
                           <td>{{ $activity->effectif_2013 }}</td>
                        </tr>
                        <tr>
                           <td>2014 :</td>
                           <td>{{ $activity->ca_2014 }}</td>
                           <td>{{ $activity->net_2014 }}</td>
                           <td>{{ $activity->effectif_2014 }}</td>
                        </tr>
                        <tr>
                           <td>2015 (prévision) :</td>
                           <td>{{ $activity->ca_2015 }}</td>
                           <td>{{ $activity->net_2015 }}</td>
                           <td>{{ $activity->effectif_2015 }}</td>
                        </tr>
                     </tbody>
                  </table>
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Année</th>
                           <th>Montant R&D (en % du C.A.)</th>
                           <th>Moyens humains</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>2013 :</td>
                           <td>{{ $activity->rd_2013 }}</td>
                           <td>{{ $activity->effectif_rd_2013 }}</td>
                        </tr>
                        <tr>
                           <td>2014 :</td>
                           <td>{{ $activity->rd_2014 }}</td>
                           <td>{{ $activity->effectif_rd_2014 }}</td>
                        </tr>
                        <tr>
                           <td>2015 (prévision) :</td>
                           <td>{{ $activity->rd_2015 }}</td>
                           <td>{{ $activity->effectif_rd_2015 }}</td>
                        </tr>
                     </tbody>
                  </table>
                  @if($enterprise)
                  <br>
                  <div>
                    <label><b>Votre recherche est-elle réalisée  :</b></label><br>
                    <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_internal_search', ' En interne ?')}}
                    <br>
                    <div class="form-group" >
                      {{Form::label('internal_collaborators', 'Par combien de personnes ?')}}
                      <p class="form-control">
                        {{{$enterprise->internal_collaborators != null ? $enterprise->internal_collaborators : 'Non'}}}
                      </p>
                    </div>
                    <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_external_search', ' Avec l’aide de prestataires extérieurs ?')}}
                    <br><br>
                    <div class="form-group">
                      {{Form::label('external_collaborators_type', 'Lesquels ?', array('class' => 'control-label'))}}
                      <p class="form-control">
                        {{{$enterprise->external_collaborators_type != null ? $enterprise->external_collaborators_type : 'Non'}}}
                      </p>
                    </div>
                    <br>
                    <label><b>Déposez-vous des brevets, marques, dessins ou modèles ?</b></label><br>
                    <div class="form-group">
                      {{Form::label('project_certificates', 'Précisez le nombre de brevets, marques ou dessins et modèles déposés et pour quel type de produits ou services :')}}
                      <p class="form-control">
                        {{{$enterprise->project_certificates != null ? $enterprise->project_certificates : 'Non'}}}
                      </p>
                    </div>
                  </div>
                  @endif
              </div>
              @endif
            </div>
          </div>
          @if($survey)
          <div class="pdfpage">
              <h4 class="text-left"><b><br>Pièce(s) jointe(s)</b></h4>
              <br>
              <table class="table">
                 <thead>
                    <tr>
                       <th>Nom</th>
                       <th>Télécharger</th>
                    </tr>
                 </thead>
                 <tbody>
                      @foreach($enterprise->files()->get() as $file)
                    <tr>
                       <td class="pieceTd">{{ $file->name }}</td>
                       <td><a class="btn btn-default btn-sm" href="{{ URL::to('admin/candidates/download/file/'.$file->id) }}"><i class="fa fa-download"></i></a></td>
                    </tr>
                      @endforeach
                 </tbody>
              </table>
            </div>
            <div class="pdfpage">
                <br>
                <table class="table">
                   <thead>
                      <tr>
                         <th>Lien</th>
                         <th>Ouvrir</th>
                      </tr>
                   </thead>
                   <tbody>
                        @foreach($enterprise->links()->get() as $link)
                      <tr>
                         <td class="pieceTd"><a target="_blank" href="{{ $link->link }}">{{ $link->link }}</a></td>
                         <td><a class="btn btn-default btn-sm" target="_blank" href="{{ $link->link }}"><i class="fa fa-external-link"></i></a></td>
                      </tr>
                        @endforeach
                   </tbody>
                </table>
              </div>
          @endif
        </div>
        <div class="panel-footer">
          <h4>
              Inscrit le {{ date('d/m/Y', strtotime($candidate->created_at)) }}
          </h4>
        </div>
      </div>
    </div>
</div>
@stop
