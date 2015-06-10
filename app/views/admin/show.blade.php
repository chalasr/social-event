@extends('layouts.master')

@section('content')
<div class="body-complete">
    <div class="row">
        <div class="well article-complet">
            @foreach($categories as $category)
                <div class="article-header">
                    <h1>{{ $category->name }}</h1>
                </div>
                <div class="contenu">
                    {{ $category->description }}
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop