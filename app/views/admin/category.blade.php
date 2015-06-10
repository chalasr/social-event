@extends('layouts.master')

@section('content')

<div class="well">
	<table class="table">
	   <thead>
	      <tr>
	         <th>Nom</th>
	         <th>Description</th>
	      </tr>
	   </thead>
	   <tbody>
	   @foreach($categories as $category)
	      <tr>
	         <td>{{ $category->name }}</td>
	         <td>{{ $category->description }}</td>
	      </tr>
		@endforeach
	   </tbody>
	</table>
</div>
@stop
