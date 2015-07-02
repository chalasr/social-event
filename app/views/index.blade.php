@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<div class="imagewrap">
					<img src="/assets/admin/pages/img/haut.jpg" class="banner">
					@if(!Auth::check())
						<a href="{{ URL::to('/register') }}" class="btn btn-lg red button1 "/><b>S'INSCRIRE</b></a>
					@elseif(Auth::user()->role_id == 1)
						<a href="{{ URL::to('/register/complete') }}" class="btn btn-lg red btnrsz "/><b>FINALISER<br> MA <br>CANDIDATURE</b></a>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop