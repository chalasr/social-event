@extends('layouts.master')

@section('content')
  <div class="container">
    <br>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-default">
          <div class=" panel-heading">
            <h3 class="panel-title">{{ $candidate->email }} - {{ date('d/m/Y', strtotime($candidate->created_at)) }}<a class="floatRight btn btn-xs btn-default" href="{{ URL::to('export/'.$candidate->id) }}"><i class="fa fa-file-pdf-o"></i> PDF</a></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class=" col-md-9 col-lg-12">
                @if($enterprise)
                <h5 class="text-left"><b>Carte d'identité</b></h5>
                <br>
                <table class="table table-hover table-user-information">
                  <tbody>
                    <tr>
                      <td>Nom :</td>
                      <td>{{ $enterprise->name }}</td>
                    </tr>
                    <tr>
                      <td>Groupe :</td>
                      <td>{{ $enterprise->member_of_group }}</td>
                    </tr>
                    <tr>
                      <td>Forme Juridique :</td>
                      <td>{{ $enterprise->juridical_status }}</td>
                    </tr>
                    <tr>
                      <td>Date de création :</td>
                      <td>{{ $enterprise->creation_date }}</td>
                    </tr>
                    <tr>
                      <td>Adresse postale :</td>
                      <td>{{ $enterprise->postal_address.' '.$enterprise->address_complement }}</td>
                    </tr>
                    <tr>
                      <td>Téléphone :</td>
                      <td>{{ $enterprise->phone }}</td>
                    </tr>
                    <tr>
                      <td>Télécopie :</td>
                      <td>{{ $enterprise->telecopie }}</td>
                    </tr>
                    <tr>
                      <td>Site web :</td>
                      <td>{{ $enterprise->website }}</td>
                    </tr>
                    <tr>
                      <td>Nom dirigeant :</td>
                      <td>{{ $enterprise->leader_name }}</td>
                    </tr>
                    <tr>
                      <td>Prenom dirigeant :</td>
                      <td>{{ $enterprise->leader_firstname }}</td>
                    </tr>
                    <tr>
                      <td>Fonction dirigeant :</td>
                      <td>{{ $enterprise->leader_position }}</td>
                    </tr>
                    <tr>
                      <td>Nom candidat :</td>
                      <td>{{ $enterprise->candidate_name }}</td>
                    </tr>
                    <tr>
                      <td>Prenom candidat :</td>
                      <td>{{ $enterprise->candidate_firstname }}</td>
                    </tr>
                    <tr>
                      <td>Fonction candidat :</td>
                      <td>{{ $enterprise->candidate_informations }}</td>
                    </tr>
                    <tr>
                      <td>Téléphone Candidat :</td>
                      <td>{{ $enterprise->candidate_phone }}</td>
                    </tr>
                    <tr>
                      <td>Email candidat :</td>
                      <td>{{ $enterprise->candidate_email }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                @endif

                @if($survey)
                <h5 class="text-left"><b>Questionnaire</b></h5>
                <br>
                <table class="table table-hover table-user-information">
                  <tbody>
                    <tr>
                      <td>Activité de l'entreprise :</td>
                      <td>{{ $survey->enterprise_activity }}</td>
                    </tr>
                    <tr>
                      <td>Origine du projet :</td>
                      <td>{{ $survey->project_origin }}</td>
                    </tr>
                    <tr>
                      <td>Différence avec les produits/services existants :</td>
                      <td>{{ $survey->innovative_arguments }}</td>
                    </tr>
                    <tr>
                      <td>Marché cible :</td>
                      <td>{{ $survey->wanted_impact }}</td>
                    </tr>
                    <tr>
                      <td>Prix et canaux de distribution :</td>
                      <td>{{ $survey->product_informations }}</td>
                    </tr>
                    <tr>
                      <td>Premiers résultats :</td>
                      <td>{{ $survey->project_results }}</td>
                    </tr>
                    <tr>
                      <td>Soutien extérieur :</td>
                      <td>{{ $survey->project_partners != null ? $survey->project_partners : 'Non' }}</td>
                    </tr>
                    <tr>
                      <td>Récompenses :</td>
                      <td>{{ $survey->project_rewards != null ? $survey->project_rewards : 'Non'  }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                @endif
                @if($activity)
                <h5 class="text-left"><b>Chiffres entreprise</b></h5>
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
                <table class="table table-hover table-user-information">
                  <tbody>

                    <tr>
                      <td>Effectif recherche interne :</td>
                      <td>{{ $enterprise->internal_collaborators != null ? $enterprise->internal_collaborators : 'Non'  }}</td>
                    </tr>
                    <tr>
                      <td>Prestataires extérieurs :</td>
                      <td>{{ $enterprise->external_collaborators_type != null ? $enterprise->external_collaborators_type : 'Non' }}</td>
                    </tr>
                    <tr>
                      <td>Brevets déposés :</td>
                      <td>{{ $enterprise->project_certificates != null ? $enterprise->project_certificates : 'Non' }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                @endif
                @endif
              </div>
            </div>
            <h5 class="text-left"><b>Pièce jointe</b></h5>
                <br>
                <table class="table">
                   <thead>
                      <tr>
                         <th>Nom</th>
                         <th>Télécharger</th>
                      </tr>
                   </thead>
                   <tbody>
                     @if($enterprise)
                        @foreach($enterprise->files()->get() as $file)
                      <tr>
                         <td>{{ $file->name }}</td>
                         <td><a href="{{ URL::to('admin/candidates/download/file/'.$file->id) }}">Lien</a></td>
                      </tr>
                        @endforeach
                      @endif
                   </tbody>
                </table>
                <br><br>
            <div class="text-left">
              <h5><b>Participation</b></h5>
              <ul>
                @foreach ($candidate->categories()->get() as $category)
                  <li>{{ $category->name }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="panel-footer">
            @if(Auth::check())
             @if(Auth::user()->role_id == 3)
             @if($enterprise)
              <a type="button" href="mailto:{{ $enterprise->candidate_email }}?subject=Bref Rhône-Alpes - Votre candidature au trophée de l'innovation" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
             @endif
              <span class="pull-right">
                <a class="btn btn-sm btn-success" href="{{ URL::to('admin/candidates/'.$candidate->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;<a class="btn btn-sm btn-danger" href="{{ URL::to('admin/candidates/delete/'.$candidate->id) }}"><i class="fa fa-trash"></i></a>
              </span>
              @endif
            @endif
          </div>
        </div>
      </div>
@stop
