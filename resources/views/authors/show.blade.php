@extends('layout', ['title'=> $author['first_name']])

@section('content')
    <h1>Single Author</h1>
    <h2><a href="{{route('authors.index')}}">Back</a></h2>
    <h2>
        <a href="{{route('authors.edit', $author['id'])}}">Edit</a>
        <form method="POST" action="{{route('authors.destroy', $author['id'])}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete"/>
        </form>
    </h2>
    <div>
        <ul>
            <li>First Name: {{ $author['first_name']  }}</li>
            <li>Last Name: {{ $author['last_name']  }}</li>
            <li>Alias Name: {{ $author['alias']  }}</li>
            <li><ul>
                <li>Posts:</li>
                @foreach ($author->posts as $post)
                <li>{{$post->title}}</li> 
                @endforeach
            </ul></li>
        </ul>
    </div>
@endsection

