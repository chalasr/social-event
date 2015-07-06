<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <title>Trophées Bref R-A Innovation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::to('/')}}/favicon.ico" media="screen"  charset="utf-8">
    <link href="{{URL::to('/')}}/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&ampsubset=all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('/')}}/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{URL::to('/')}}/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
</head>
    <body class="page-md page-header-fixed page-quick-sidebar-over-content">
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height:1010px; margin-top:50px;">
            <div class="clearfix"></div>
            <h3 class="page-title"></h3>
            <div class="row">
                <div class="portlet light top-content">
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    <div class="container">
                      <br>
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                          <div class="panel panel-default">
                            <div class=" panel-heading">
                              <h3 class="panel-title">{{ $candidate->email }} - {{ date('d/m/Y', strtotime($candidate->created_at)) }}<a class="floatRight btn btn-xs btn-default" target="_blank" href="{{ URL::to('export/'.$candidate->id) }}"><i class="fa fa-file-pdf-o"></i> PDF</a></h3>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class=" col-md-9 col-lg-12">
                                  @if($enterprise)
                                  <h4 class="text-left"><b>1) Identité</b></h4>
                                  <br>
                                  <table class="table table-hover table-user-information">
                                    <tbody>
                                      <tr>
                                        <td>Nom de l'entreprise :</td>
                                        <td>{{ $enterprise->name }}</td>
                                      </tr>
                                      <tr>
                                        <td>Membre d'un groupe :</td>
                                        <td>{{ $enterprise->member_of_group != null ? $enterprise->member_of_group : 'Non' }}</td>
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
                                        <td>Adresse :</td>
                                        <td>{{ $enterprise->postal_address.' '.$enterprise->address_complement }}</td>
                                      </tr>
                                      <tr>
                                        <td>Code postal :</td>
                                        <td>{{ $enterprise->postal_code }}</td>
                                      </tr>
                                      <tr>
                                        <td>Ville :</td>
                                        <td>{{ $enterprise->city }}</td>
                                      </tr>
                                      <tr>
                                        <td>Nom, prénom du dirigeant</td>
                                        <td>{{ $enterprise->leader_name }}&nbsp;{{ $enterprise->leader_firstname }}</td>
                                      </tr>
                                      <tr>
                                        <td>Fonction du dirigeant :</td>
                                        <td>{{ $enterprise->leader_position }}</td>
                                      </tr>
                                      <tr>
                                        <td>Nom, Prénom du candidat</td>
                                        <td>{{ $enterprise->candidate_name }}&nbsp;{{ $enterprise->candidate_firstname }}</td>
                                      </tr>

                                      <tr>
                                        <td>Fonction du candidat:</td>
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
                                        <td></td>
                                        <td></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  @endif
                                  @if($enterprise)
                                    <h4 class="text-left"><b>2) Catégories</b></h4><br>
                                      @foreach ($candidate->categories()->get() as $category)
                                        <p>{{ $category->name }}</p>
                                      @endforeach
                                    <br>
                                  @endif
                                  @if($survey)
                                  <h4 class="text-left"><b>3) Innovation</b></h4><br>
                                    <div class="form-group">
                                      {{Form::label('enterprise_activity', 'Décrivez, en quelques lignes, la nature de l’activité de votre entreprise.', array('class' => 'control-label'))}}
                                      {{Form::textarea('enterprise_activity', $survey->enterprise_activity, array('class'=>'form-control'))}}
                                    </div><br>
                                    <div class="form-group">
                                      {{Form::label('project_origin', 'Quelle est l’origine de votre innovation ? A quel besoin répond-elle ? ', array('class' => 'control-label'))}}
                                      {{Form::textarea('project_origin', $survey->project_origin, array('class'=>'form-control'))}}
                                    </div><br>
                                    <div class="form-group">
                                      {{Form::label('innovative_arguments', 'En quoi votre innovation se différencie-t-elle des produits ou services existants ? ', array('class' => 'control-label'))}}
                                      {{Form::textarea('innovative_arguments', $survey->innovative_arguments, array('class'=>'form-control'))}}
                                    </div><br>
                                    <div class="form-group">
                                      {{Form::label('wanted_impact', 'Quel est votre marché cible ? National ou international ?', array('class' => 'control-label'))}}
                                      {{Form::textarea('wanted_impact', $survey->wanted_impact, array('class'=>'form-control'))}}
                                    </div><br>
                                    <div class="form-group">
                                      {{Form::label('product_informations', 'A quel prix entendez-vous vendre votre produit ou service innovant ? A travers quels canaux de distribution (grossistes, grande distribution, réseau en propre, distributeurs, etc. ) ?', array('class' => 'control-label'))}}
                                      {{Form::textarea('product_informations', $survey->product_informations, array('class'=>'form-control'))}}
                                    </div><br>
                                    <div class="form-group">
                                      {{Form::label('project_results', 'Concernant le produit ou service concerné, quels sont vos premiers résultats ? Et vos perspectives commerciales (chiffre d’affaires généré) à moyen terme ?', array('class' => 'control-label'))}}
                                      {{Form::textarea('project_results', $survey->project_results, array('class'=>'form-control'))}}
                                    </div><br>
                                    <div class="form-group">
                                      {{Form::label('have_partners', 'Votre innovation est-elle soutenue par des organismes ou des institutions ?', array('class' => 'control-label'))}}
                                      {{Form::label('project_partners', 'Si oui, lesquels ?', array('class' => 'control-label'))}}
                                      {{Form::text('project_partners', $survey->project_partners != null ? $survey->project_partners : 'Non', array('class'=>'form-control'))}}
                                    </div><br>
                                    <div class="form-group">
                                      {{Form::label('project_rewards', 'Votre entreprise a-t-elle été déjà récompensée pour cette innovation ou pour d’autres innovations ?', array('class' => 'control-label'))}}
                                      {{Form::label('project_rewards', 'Si oui, par quel organisme ?', array('class' => 'control-label'))}}
                                      {{Form::text('project_rewards', $survey->project_rewards != null ? $survey->project_rewards : 'Non', array('class'=>'form-control'))}}
                                    </div><br>
                                  @endif
                                  @if($activity)
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
                                    <h5><b>Votre recherche est-elle réalisée  :</b></h5>
                                    <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_internal_search', ' En interne ?')}}
                                    <br>
                                    <div class="form-group" >
                                      {{Form::label('internal_collaborators', 'Par combien de personnes ?')}}
                                      {{ Form::text('internal_collaborators', $enterprise->internal_collaborators != null ? $enterprise->internal_collaborators : 'Non', array('class' => 'form-control', 'checked' => 'true'))}}
                                    </div>
                                    <i class="fa fa-arrow-right"></i>&nbsp;&nbsp;{{Form::label('have_external_search', ' Avec l’aide de prestataires extérieurs ?')}}
                                    <br><br>
                                    <div class="form-group">
                                      {{Form::label('external_collaborators_type', 'Lesquels ?', array('class' => 'control-label'))}}
                                      {{ Form::text('external_collaborators_type', $enterprise->external_collaborators_type != null ? $enterprise->external_collaborators_type : 'Non', array('class' => 'form-control'))}}
                                    </div>
                                    <br>
                                    <h5><b>Déposez-vous des brevets, marques, dessins ou modèles ?</b></h5>
                                    <div class="form-group">
                                      {{Form::label('project_certificates', 'Précisez le nombre de brevets, marques ou dessins et modèles déposés et pour quel type de produits ou services :')}}
                                      {{ Form::text('project_certificates', $enterprise->project_certificates != null ? $enterprise->project_certificates : 'Non', array('class' => 'form-control'))}}
                                    </div>
                                  </div>
                                  @endif
                                  @endif
                                </div>
                              </div>
                              <h4 class="text-left"><b><br>4) Pièce(s) jointe(s)</b></h4>
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
                                         <td><a class="btn btn-default btn-sm" href="{{ URL::to('admin/candidates/download/file/'.$file->id) }}">Télécharger</a></td>
                                      </tr>
                                        @endforeach
                                      @endif
                                   </tbody>
                                </table>
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
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Bref R-A Innovation</p>
    </footer>

    <script src="{{URL::to('/')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/js/script.js" type="text/javascript"></script>

    </body>
</html>
