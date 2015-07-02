@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<div class="imagewrap">
					<img src="/assets/admin/pages/img/haut.jpg" class="banner">
					<a href="{{ URL::to('/register') }}" class="btn btn-lg red button1 "/><b>S'INSCRIRE</b></a>
				</div>
			</div>
		</div>
	</div>
@stop