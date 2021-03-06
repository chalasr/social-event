@extends('layouts.admin')

@section('content')

		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					Jury
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="table-responsive">
					<table class="table">
		   			<thead>
		      		<tr>
			        	<th>Nom</th>
								<th>Prénom</th>
								<th>Adresse email</th>
								<th>Société</th>
								<th>Catégorie</th>
								<th>Téléphone</th>
								<th>Ville</th>
								<th>Actions</th>
		      		</tr>
		   			</thead>
		   			<tbody>
					   @foreach($jurys as $jury)
						<tr>
							<td>{{ $jury->lastname }}</td>
							<td>{{ $jury->firstname }}</td>
							<td>{{ $jury->email }}</td>
							<td>{{ $jury->society }}</td>
							<td>
								@foreach ($jury->categories()->get() as $category)
									{{ $category->name }}
								@endforeach
							</td>
							<td>{{ $jury->phone }}</td>
							<td>{{ $jury->city }}</td>
							<td>
								<a class="btn btn-sm btn-info" href="{{ URL::to('admin/jurys/'.$jury->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
								<a class="btn btn-sm btn-danger"  onclick="return confirm('Voulez vous vraiment supprimer ce jury ?')" href="{{ URL::to('admin/jurys/delete/'.$jury->id) }}"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
		   			</tbody>
					</table>
				</div>
			</div>
		</div>

@stop
