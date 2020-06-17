@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt4">Posts</h1>
    @include('post.includes.table', ['posts' => $posts])
</div>
@endsection