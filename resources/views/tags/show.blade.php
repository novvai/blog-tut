@extends('layout')

@section('content')
<div>
    <p>Tag: <b>{{$tag->name}}</b>  <a href="{{route('tags.edit', $tag->id)}}">Edit</a></p>
    <p>Description: <b>{{$tag->descr}}</b></p>
    <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
</div>

@endsection