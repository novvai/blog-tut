<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Single Post</h1>
    <h2><a href="{{route('posts.index')}}">Back</a></h2>
    <h2>
        <a href="{{route('posts.edit', $post['id'])}}">Edit</a>
        <form method="POST" action="{{route('posts.destroy', $post['id'])}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete"/>
        </form>
    </h2>
    <div>
        <ul>
            <li>Title: {{ $post['title']  }}</li>
            <li>Created at: {{ $post['created_at']  }}</li>
            <li>Descritpion: {{ $post['description']  }}</li>
            <li>Author: {{ $post['author']  }}</li>
        </ul>
    </div>
</body>
</html>


