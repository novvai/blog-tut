@extends('layout', ['title'=>'Create new post'])

@section('content')
    <h1>Create new post</h1>
    @include('posts.partials.form', ['action'=>route('posts.store')])
@endsection