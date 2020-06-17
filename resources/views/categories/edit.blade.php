@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt4">Edit Categories</h1>
    <form action="{{ route('categories.update', $category -> id) }}" method="post">
        @csrf
        @method('put')
        @include('categories.includes.fields', ['category' => $category])
    </form>
</div>
@endsection
