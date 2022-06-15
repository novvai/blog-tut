@extends('layout', ["title" => "Posts Page"])

@section('content')
    <h1>Posts</h1>
    <h2><a href="{{route('posts.create')}}"> Create new post </a></h2>
    @foreach ($blog_posts as $post)
        <div>
            <ul>
                <li>Title: <a href="{{route('posts.show', $post['id'])}}">{{ $post['title']  }}</a></li>
                <li>Created at: {{ $post['created_at']  }}</li>
                <li>Descritpion: {{ $post['description']  }}</li>
                <li>Author: {{ $post['author']->first_name   }}</li>
            </ul>
        </div>
    @endforeach
@endsection
