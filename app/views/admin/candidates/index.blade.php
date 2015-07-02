@extends('layouts.admin')

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
			        		Paiement
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
								@foreach ($candidate->categories()->get() as $category)
									{{ $category->name }} ,
								@endforeach
							</td>
							<td>
									@if($candidate->enterprise()->first())
											@if($candidate->enterprise()->first()->is_pay == 1)
												Paypal
											@elseif($candidate->enterprise()->first()->is_pay == 2)
												Chèque
											@else
												Non
											@endif
									@else
											Non
									@endif
							</td>
							<td>
								<div class="flex">
									<a class="btn btn-sm btn-info" href="{{ URL::to('admin/candidates/'.$candidate->id) }}"><i class="fa fa-eye"></i></a> &nbsp;
									<a class="btn btn-sm btn-success" href="{{ URL::to('admin/candidates/'.$candidate->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;
									<a class="btn btn-sm btn-danger" href="{{ URL::to('admin/candidates/delete/'.$candidate->id) }}"><i class="fa fa-trash"></i></a>
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
