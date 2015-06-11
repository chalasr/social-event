@extends('layouts.admin')

@section('content')

<div class="container">
	<a class="btn btn-default" href="{{ URL::to('admin/category/create') }}">Nouvelle catégorie</a>
	<br><br>
	<div class="well">
		<table class="table">
		   <thead>
		      <tr>
		         <th>Nom</th>
		         <th>Description</th>
		         <th>Actions</th>
		      </tr>
		   </thead>
		   <tbody>
		   @foreach($categories as $category)
		      <tr>
		         <td>{{ $category->name }}</td>
		         <td>{{ $category->description }}</td>
		         <td><a href="{{ URL::to('admin/category/'.$category->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
		         <a href="{{ URL::to('admin/category/delete/'.$category->id) }}"><i class="fa fa-trash"></i></a></td>
			@endforeach
		   </tbody>
		</table>
	</div>
</div>

@stop
