@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt4">Categories</h1>
    @include('categories.includes.table', ['categories' => $categories])
</div>
@endsection
