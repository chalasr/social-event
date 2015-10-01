@extends('layouts.master')

@section('content')
<style media="screen">
		.table-hover tr:hover{
				cursor:pointer;
		}
		.flex .form-group{
				width: 45%;
		}
</style>
	<div class="container">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
						{{ $categoriesNames }} :&nbsp;
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
			        	<th>Candidat</th>
								<th>status</th>
								<th>Catégories</th>
			        	<th>Actions</th>
		      		</tr>
		   			</thead>
		   			<tbody>
					  @foreach($candidates as $candidate)
						 	@if($candidate->role_id == 1)
								<tr onclick="location.href='{{ URL::to('admin/candidates/'.$candidate->id) }}'">
									<td>{{{$candidate->enterprise()->first() ? $candidate->enterprise()->first()->name : $candidate->email}}}</td>
									<td>Status</td>
									<td>
										@foreach ($candidate->categories()->get() as $category)
											{{ $category->name }} ,
										@endforeach
									</td>
									<td>
										<div class="flex">
											<a class="btn btn-sm btn-default" target="_blank" href="{{ URL::to('export/'.$candidate->id) }}"><i class="fa fa-download"></i></a> &nbsp;
											<a class="btn btn-sm btn-info" href="{{ URL::to('admin/candidates/'.$candidate->id) }}"><i class="fa fa-eye"></i></a> &nbsp;
										</div>
									</td>
								</tr>
							@endif
						@endforeach
		   			</tbody>
					</table>
				</div>
			</div>
		</div>

@stop
