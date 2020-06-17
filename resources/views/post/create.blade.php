@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt4">New Post</h1>
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        @include('post.includes.fields', ['categories' => $categories])
    </form>
</div>
@endsection
