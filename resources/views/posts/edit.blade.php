<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit post</title>
</head>
<body>
    <h1>Edit new post</h1>
    <form action="{{route('posts.update', $post['id'])}}" method="POST">
        @csrf
        @method("PUT")
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{$post['title']}}">
        </div>
        <div>
            <label for="description">Descritpion:</label>
            <input type="text" name="description" value="{{$post['description']}}">
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" value="{{$post['author']}}">
        </div>
        <div><input type="submit" value="Save"></div>
    </form>
</body>
</html>