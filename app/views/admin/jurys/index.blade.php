@extends('layouts.admin')

@section('content')

	<div class="container">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					Tout les juris
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="table-responsive">
					<table class="table">
		   			<thead>
		      		<tr>
			        	<th>
			        		Nom
			        	</th>
			        	<th>
			        		Prénom
			        	</th>
			        	<th>
			        		Adresse email
			        	</th>
			        	<th>
			        		Société
			        	</th>
			        	<th>
			        		Téléphone
			        	</th>
			        	<th>
			        		Ville
			        	</th>
			        	<th>
			        		Actions
			        	</th>
		      		</tr>
		   			</thead>
		   			<tbody>
					   @foreach($jurys as $jury)
						<tr>
							<td>
								{{ $jury->lastname }}
							</td>
							<td>
								{{ $jury->firstname }}
							</td>
							<td>
								{{ $jury->email }}
							</td>
							<td>
								{{ $jury->society }}
							</td>
							<td>
								{{ $jury->phone }}
							</td>
							<td>
								{{ $jury->city }}
							</td>
							<td>
								<a href="{{ URL::to('admin/jurys/'.$jury->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
								<a href="{{ URL::to('admin/jurys/delete/'.$jury->id) }}"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
		   			</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@stop
