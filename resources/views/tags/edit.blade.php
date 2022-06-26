@extends('layout')

@section('content')
<h1>Edit Tag</h1>
@include('partials._errors')
@include('tags.partials.form', ['action'=>route('tags.update', $tag->id), 'edit_mode'=>true])
@endsection