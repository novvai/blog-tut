<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create post</title>
</head>
<body>
    <h1>Create new post</h1>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="description">Descritpion:</label>
            <input type="text" name="description">
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author">
        </div>
        <div><input type="submit" value="Save"></div>
    </form>
</body>
</html>