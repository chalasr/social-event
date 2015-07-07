@extends('layouts.master')

@section('content')
<style media="screen">
		.table-hover tr:hover{
				cursor:pointer;
		}
</style>
	<div class="container">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
						{{ $categoryName }} :&nbsp;
						<div class="floatRight">
								{{$candidates->count()}} Candidatures
						</div>
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="table-responsive">
					<table class="table table-hover">
		   			<thead>
		      		<tr>
			        	<th>
			        		Candidat
			        	</th>
			        	<th>
			        		Status
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
						<tr onclick="location.href='{{ URL::to('admin/candidates/'.$candidate->id) }}'">
							<td>
								{{ $candidate->email }}
							</td>
							<td>
								Status
							</td>
							<td>
								@foreach ($candidate->categories()->get() as $category)
									{{ $category->name }} ,
								@endforeach
							</td>
							<td>
								<div class="flex">
									<a class="btn btn-sm btn-default" target="_blank" href="{{ URL::to('/export/'.$candidate->id) }}"><i class="fa fa-download"></i></a> &nbsp;
									<a class="btn btn-sm btn-info" href="{{ URL::to('admin/candidates/'.$candidate->id) }}"><i class="fa fa-eye"></i></a> &nbsp;
									<a class="btn btn-sm btn-danger" onclick="return confirm('Voulez vous vraiment supprimer cette candidature ?')" href="{{ URL::to('admin/candidates/delete/'.$candidate->id) }}"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
						@endforeach
		   			</tbody>
					</table>
				</div>
			</div>
		</div>

@stop
