@extends('layout', ['title'=>'Create new post'])

@section('content')
    <h1>Create new post</h1>
    @include('partials._errors')
    @include('authors.partials.form', ['action'=>route('authors.store')])
@endsection