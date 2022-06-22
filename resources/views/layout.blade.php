<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(@$title) {{ $title }} | Posts Managers @else Posts Manager @endif
    </title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    {{-- THIS IS A COMMENT --}}
</head>
<body>
    <nav class="navigation">
        <ul>
            @if (auth()->check())
                <li>
                    <a href="{{route('posts.index')}}">Posts</a>
                </li>
                <li>
                    <a href="{{route('authors.index')}}">Authors</a>
                </li>
                <li>
                    <a href="{{route('tags.index')}}">Tags</a>
                </li>
                <li>
                    <a href="{{route('logout')}}">Logout</a>
                </li>
            @else
                <li>
                    <a href="{{route('login')}}">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}">Register</a>
                </li>
            @endif
           
        </ul>
    </nav>
    @yield('content')
</body>
</html>