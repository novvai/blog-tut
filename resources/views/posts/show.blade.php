@extends('layout', ['title'=> $post['title']])

@section('content')
    <h1>Single Post</h1>
    <h2><a href="{{route('posts.index')}}">Back</a></h2>
    <h2>
        <a href="{{route('posts.edit', $post['id'])}}">Edit</a>
        <form method="POST" action="{{route('posts.destroy', $post['id'])}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete"/>
        </form>
    </h2>
    <div>
        <ul>
            <li>Title: {{ $post['title']  }}</li>
            <li>Created at: {{ $post['created_at']  }}</li>
            <li>Descritpion: {{ $post['description']  }}</li>
            <li>Author: {{ $post['author']->first_name  }} {{ $post['author']->last_name  }}</li>
        </ul>
    </div>
@endsection

