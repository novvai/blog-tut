@extends('layout', ['title'=> "Edit {$author['title']}"])

@section('content')
    <h1>Edit new author</h1>
    @include('authors.partials.form', [
            'action'=> route('authors.update',$author['id']),
            'edit_mode' => true]
            )
@endsection