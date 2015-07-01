@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					Catégories
				</div>
			</div>
			<div class="portlet-body" style="display: block;">
				<div class="table-responsive">
					<table class="table">
					<thead>
					<tr>
						<th>
							Titre
						</th>
						<th>
							Description
						</th>
						<th>
							Actions
						</th>
					</tr>
					</thead>
					<tbody>
					@foreach($categories as $category)
						<tr>
							<td>
								{{ $category->name }}
							</td>
							<td>
								{{ $category->description }}
							</td>
							<td>
								<a class="btn btn-sm btn-info" href="{{ URL::to('admin/categories/'.$category->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
								<a class="btn btn-sm btn-danger" onclick="return confirm('Voulez vous vraiment supprimer cette catégorie ?')" href="{{ URL::to('admin/categories/delete/'.$category->id) }}"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
@stop

