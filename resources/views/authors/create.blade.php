@extends('layout', ['title'=>'Create new authors'])

@section('content')
    <h1>Create new author</h1>
    @include('partials._errors')
    @include('authors.partials.form', ['action'=>route('authors.store')])
@endsection