@extends('layout')

@section('content')

@include('partials._errors')
<form action="{{route('authenticate')}}" method="POST">
    @csrf
    <div>
        <label for="email">E-mail:</label>
        <input type="text" name="email"/>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password"/>
    </div>
    <div>
        <input type="submit" value="Login">
        <a href="{{route('register')}}">Register</a>
    </div>
</form>

@endsection