@extends('layouts.admin')

@section('content')

<div class="well">
	<a href="{{ URL::to('admin/create') }}">Ajouter une catégorie</a>
	<table class="table">
	   <thead>
	      <tr>
	         <th>Nom</th>
	         <th>Description</th>
	         <th>Modifier</th>
	      </tr>
	   </thead>
	   <tbody>
	   @foreach($categories as $category)
	      <tr>
	         <td>{{ $category->name }}</td>
	         <td>{{ $category->description }}</td>
	         <td><a href="{{ URL::to('admin/'.$category->id.'/edit/') }}">Editer</a>
	         <a href="{{ URL::to('admin/delete/'.$category->id) }}">Supprimer</a></td>
		@endforeach
	   </tbody>
	</table>
</div>

@stop
