@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt4">Edit Categories</h1>
    <form action="{{ route('post.update', $post -> id) }}" method="post">
        @csrf
        @method('put')
        @include('post.includes.fields', ['post' => $post, 'categories' => $categories])
    </form>
</div>
@endsection
