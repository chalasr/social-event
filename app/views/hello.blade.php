@extends('layouts.master')

@section('content')
<div class="well">
	 @foreach($categories as $category)
	{{ $category->name }}
	{{ $category->description }}
	@endforeach
</div>
@stop
