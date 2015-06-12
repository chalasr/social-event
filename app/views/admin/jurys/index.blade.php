@extends('layouts.admin')

@section('content')

<div class="container">
	<a class="btn btn-default" href="{{ URL::to('admin/jurys/create') }}">Nouveau compte jury</a>
	<br><br>
	<div class="well">
		<table class="table">
		   <thead>
		      <tr>
		         <th>Nom</th>
		         <th>Prenom</th>
		         <th>Email</th>
		         <th>Société</th>
		         <th>Téléphone</th>
		         <th>Ville</th>
		         <th>Actions</th>



		      </tr>
		   </thead>
		   <tbody>
		   @foreach($jurys as $jury)
		      <tr>
		         <td>{{ $jury->lastname }}</td>
		         <td>{{ $jury->firstname }}</td>
		         <td>{{ $jury->email }}</td>
		         <td>{{ $jury->society }}</td>
		         <td>{{ $jury->phone }}</td>
		         <td>{{ $jury->city }}</td>
		         <td><a href="{{ URL::to('admin/jurys/'.$jury->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
		         <a href="{{ URL::to('admin/jurys/delete/'.$jury->id) }}"><i class="fa fa-trash"></i></a></td>
			@endforeach
		   </tbody>
		</table>
	</div>
</div>

@stop
