@extends('layouts.admin')

@section('content')

<div class="container">
	<a class="btn btn-default" href="{{ URL::to('admin/jury/create') }}">Nouveau compte jury</a>
	<br><br>
	<div class="well">
		<table class="table">
		   <thead>
		      <tr>
		         <th>Nom</th>
		         <th>Actions</th>
		      </tr>
		   </thead>
		   <tbody>
		   @foreach($juries as $jury)
		      <tr>
		         <td>{{ $jury->username }}</td>
		         <td><a href="{{ URL::to('admin/jury/'.$jury->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
		         <a href="{{ URL::to('admin/jury/delete/'.$jury->id) }}"><i class="fa fa-trash"></i></a></td>
			@endforeach
		   </tbody>
		</table>
	</div>
</div>

@stop
