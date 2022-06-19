@extends('layout', ["title" => "Authors Page"])

@section('content')
    <h1>Authors</h1>
    <h2><a href="{{route('authors.create')}}"> Create new Author </a></h2>
    <table>
       <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Alias</th>
        <th>Posts</th>
        <th>Actions</th>
       </tr>
    @foreach ($authors as $author)
        <tr>
        <td>{{$author->first_name}}</td>
        <td>{{$author->last_name}}</td>
        <td>@if(@$author->alias) {{$author->alias}} @else N/A @endif </td>
        <td>
          {{count($author->posts)}}
        </td>
        <td><a href="{{route('authors.show', $author->id)}}">Details</a></td>
      </tr>
    @endforeach
</table>
@endsection
