@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt4">New Category</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        @include('categories.includes.fields')
    </form>
</div>
@endsection
