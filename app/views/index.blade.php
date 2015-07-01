@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<div class="imagewrap">
					<img src="/assets/admin/pages/img/haut.jpg" class="banner">
					<a type="button" href="{{ URL::to('/register') }}" class="btn red button1 "/>Inscription</a>
				</div>
			</div>
		</div>
	</div>
@stop
