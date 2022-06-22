@extends('layout')

@section('content')
    <h1>Create Tag</h1>
    @include('partials._errors')
    @include('tags.partials.form', ['action'=>route('tags.store')])
@endsection