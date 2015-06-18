@extends('layouts.admin')

@section('content')

	<div class="container">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					Les candidats
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="table-responsive">
					<table class="table table-hover">
		   			<thead>
		      		<tr>
			        	<th>
			        		Adresse email
			        	</th>
			        	<th>
			        		Catégories
			        	</th>
			        	<th>
			        		Actions
			        	</th>
		      		</tr>
		   			</thead>
		   			<tbody>
					   @foreach($candidates as $candidate)
						<tr>
							<td>
								{{ $candidate->email }}
							</td>
							<td>
								@foreach ($candidate->categories()->get() as $category)
									{{ $category->name }} ,
								@endforeach
							</td>
							<td>
								<a class="btn btn-info" href="{{ URL::to('admin/candidates/'.$candidate->id) }}"><i class="fa fa-eye"></i></a> &nbsp;
								<a class="btn btn-success" href="{{ URL::to('admin/candidates/'.$candidate->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;
								<a class="btn btn-danger" href="{{ URL::to('admin/candidates/delete/'.$candidate->id) }}"><i class="fa fa-trash"></i></a>
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
