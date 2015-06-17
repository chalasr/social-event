@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
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
        @foreach($candidate->categories as $category)
        <tr>
          <td>
            {{ $category->name }}
          </td>
          <td>
            {{ $category->description }}
          </td>
          <td>
          <a href="{{ URL::to('admin/categories/'.$category->id.'/edit/') }}"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
            <a onclick="return confirm('Voulez vous vraiment supprimer cette catégorie ?')" href="{{ URL::to('admin/categories/delete/'.$category->id) }}"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
      @endforeach
      </tbody>
      </table>
    </div>
</div>
@stop
