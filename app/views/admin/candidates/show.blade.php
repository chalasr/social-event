@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="portlet box blue">
    <div class="portlet-title">
      <div class="caption">
        {{ $candidate->email }}
      </div>
    </div>
    <div class="portlet-body" style="display: block;">
      <div class="table-responsive">
        <table class="table">
           <thead>
            <tr>
              <th>
                Email
              </th>
              <th>
                Catégories
              </th>
              <th>
                Actions
              </th>
            </tr>
           </thead>
           <tbody>
          <tr>
            <td>
              {{ $candidate->email }}
            </td>
            <td>
              @foreach ($candidate->categories()->get() as $category)
                {{ $category->name }} ,
              @endforeach
            </td>
            <td>
              <a class="btn btn-success" href="{{ URL::to('admin/candidates/'.$candidate->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;
              <a class="btn btn-danger" href="{{ URL::to('admin/candidates/delete/'.$candidate->id) }}"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
           </tbody>
        </table>
      </div>
    </div>
  </div>
  @if($enterprise)
  <hr>
  <div class="portlet box blue">
    <div class="portlet-title">
      <div class="caption">
        Carte d'identité
      </div>
    </div>
    <div class="portlet-body" style="display: block;">
      <div class="table-responsive">
        <table class="table">
           <thead>
            <tr>
              <th>Nom</th>
              <th>Groupe</th>
              <th>Forme Juridique</th>
              <th>Date de création</th>
              <th>Adresse postale</th>
              <th>Téléphone</th>
            </tr>
           </thead>
           <tbody>
          <tr>
            <td>{{ $enterprise->name }}</td>
            <td>{{ $enterprise->member_of_group }}</td>
            <td>{{ $enterprise->juridical_status }}</td>
            <td>{{ $enterprise->creation_date }}</td>
            <td>{{ $enterprise->postal_address }}</td>
            <td>{{ $enterprise->phone }}</td>
          </tr>
           </tbody>
        </table>
        <table class="table">
           <thead>
            <tr>
              <tr>
                <th>Télécopie</th>
                <th>Site web</th>
                <th>Informations dirigeants</th>
                <th>Informations candidat</th>
                <th>Téléphone Candidat</th>
                <th>Email candidat</th>
              </tr>
            </tr>
           </thead>
           <tbody>
          <tr>
            <td>{{ $enterprise->telecopie }}</td>
            <td>{{ $enterprise->website }}</td>
            <td>{{ $enterprise->leaders_informations }}</td>
            <td>{{ $enterprise->candidate_informations }}</td>
            <td>{{ $enterprise->candidate_phone }}</td>
            <td>{{ $enterprise->candidate_email }}</td>
          </tr>
           </tbody>
        </table>
      </div>
    </div>
  </div>
  @endif
</div>
@stop
