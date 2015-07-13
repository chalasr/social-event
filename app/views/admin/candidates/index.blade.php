@extends('layouts.admin')

@section('content')
<style media="screen">
		.table-hover tr:hover{
				cursor:pointer;
		}
</style>
	<div class="container">
		<div style="display:none;" class="alert alert-success">
		</div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
				Gestion candidats -
						{{$candidates->count()}}
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
			        		Validation
			        	</th>
			        	<th>
			        		Actions
			        	</th>
		      		</tr>
		   			</thead>
		   			<tbody>
					   @foreach($candidates as $candidate)
						<tr>
							<td onclick="location.href='{{ URL::to('admin/candidates/'.$candidate->id) }}'">
								{{ $candidate->email }}
							</td>
							<td onclick="location.href='{{ URL::to('admin/candidates/'.$candidate->id) }}'">
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
								<input type="hidden" id="{{ $candidate->id }}" value="{{ $candidate->id }}">
								<input type="checkbox" class="form-control" onchange="validUser({{ $candidate->id }})" name="{{$candidate->id}}" class="valid" @if($candidate->enterprise()->first()->is_valid == 1) checked="true" @endif >
							</td>
							<td>
								<div class="flex">
									<a class="btn btn-sm btn-info" href="{{ URL::to('admin/candidates/'.$candidate->id) }}"><i class="fa fa-eye"></i></a> &nbsp;
									<a class="btn btn-sm btn-success" href="{{ URL::to('admin/candidates/'.$candidate->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;
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
