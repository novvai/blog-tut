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
            <li>
                <a href="{{route('posts.index')}}">Posts</a>
            </li>
            <li>
                <a href="{{route('authors.index')}}">Authors</a>
            </li>
            <li>
                <a href="{{route('tags.index')}}">Tags</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>