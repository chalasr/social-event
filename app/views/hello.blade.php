@extends('layouts.master')

@section('content')
<div class="well">
	 @foreach($categories as $category)
	{{ $category->name }}
	@endforeach
</div>
@stop
