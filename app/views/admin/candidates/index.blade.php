@extends('layouts.admin')

@section('content')
<style media="screen">
		.table-hover tr:hover{
				cursor:pointer;
		}
		.form-group{
			width: 30% !important;
		}
</style>

		<div class="well">
				{{ Form::open(array('url'=>'admin/candidates/filter')) }}
				<div class="flex">
						<div class="form-group">
								  {{ Form::select('category_name', array_merge(['' => 'Catégories'], $categories), null, array('class'=>'form-control')) }}
						</div>
						<div class="form-group statusFilter">
									<select class="form-control" name="status" id="status">
											<option value="">Status</option>
											<option value="true">Validées</option>
											<option value="false">Non validées</option>
									</select>
						</div>
				</div>
				{{ Form::submit('Filtrer', array('class'=>'btn blue button-next'))}}
				<a class="btn blue button-next" href="{{ URL::to('/admin/candidates')}}">Réinitialiser</a>
				{{ Form::close() }}
		</div>

		<div class="alert alert-success ajax-success" style="display:none;"></div>
		<div class="alert alert-danger ajax-danger" style="display:none;"></div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
				Gestion candidats -
						{{$candidates->count().' '.$title}} 
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="table-responsive">
					<table class="table table-hover">
		   			<thead>
		      		<tr>
			        	<th>
			        		Entreprise
			        	</th>
			        	<th>
			        		Inscrit le
			        	</th>
			        	<th>
			        		Catégories
			        	</th>
			        	<th>
			        		Paiement
			        	</th>
			        	<th>
			        		Status
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
								{{{$candidate->enterprise()->first() ? $candidate->enterprise()->first()->name : $candidate->email}}}
							</td>
							<td>
									{{ date('d/m/Y', strtotime($candidate->created_at)) }}
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
												Non défini
											@endif
									@else
											Non défini
									@endif
							</td>
							<td class="validTd">
								<input type="hidden" value="{{ $candidate->id }}">
								<input type="checkbox" onchange="validPayment({{ $candidate->id }})" name="pay-{{$candidate->id}}" class="valid" @if($candidate->enterprise()->first()) @if($candidate->enterprise()->first()->payment_status == 1) checked="true" @endif @endif>
							</td>
							<td class="validTd">
								<input type="hidden" value="{{ $candidate->id }}">
								<input type="checkbox" onchange="validUser({{ $candidate->id }})" name="{{$candidate->id}}" class="valid" @if($candidate->enterprise()->first()) @if($candidate->enterprise()->first()->is_valid == 1) checked="true" @endif @endif>
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
				@if($pagination)
				<div class="pagination">
						<?php echo $candidates->links(); ?>
				</div>
				@endif
			</div>
		</div>

@stop
