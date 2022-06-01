<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Home</h1>
    <h2><a href="{{route('posts.create')}}"> Create new post </a></h2>
    @foreach ($blog_posts as $post)
        <div>
            <ul>
                <li>Title: <a href="{{route('posts.show', $post['id'])}}">{{ $post['title']  }}</a></li>
                <li>Created at: {{ $post['created_at']  }}</li>
                <li>Descritpion: {{ $post['description']  }}</li>
                <li>Author: {{ $post['author']  }}</li>
            </ul>
        </div>
    @endforeach

</body>
</html>