@extends('layout', ['title'=> "Edit {$post['title']}"])

@section('content')
    <h1>Edit new post</h1>
    @include('posts.partials.form', [
            'action'=> route('posts.update',$post['id']),
            'edit_mode' => true]
            )
@endsection