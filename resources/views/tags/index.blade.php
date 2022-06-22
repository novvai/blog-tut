@extends('layout')

@section('content')

<h1>Tags</h1>
<h2><a href="{{route('tags.create')}}"> Create new Tag </a></h2>
<table>
   <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Actions</th>
   </tr>
@forelse ($tags as $tag)
  <tr>
    <td>{{$tag->name}}</td>
    <td>{{$tag->descr}}</td>
    <td><a href="{{route('tags.show', $tag->id)}}">Details</a></td>
  </tr>
@empty
    <tr>
        <td colspan="3"> No tags found </td>
    </tr>
@endforelse

</table>

@endsection