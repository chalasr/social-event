<table class="table">
	<thead>
	<tr>
		<th>
			Titre
		</th>
		<th>
			Description
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
	</tr>
@endforeach
	</tbody>
</table>