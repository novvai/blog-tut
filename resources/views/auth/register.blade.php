@extends('layout')

@section('content')

@include('partials._errors')
<form action="{{route('register.process')}}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name"/>
    </div>
    <div>
        <label for="email">E-mail:</label>
        <input type="text" name="email"/>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password"/>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation"/>
    </div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>

@endsection