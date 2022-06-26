{{--
    $action - Required
    $edit_mode - Optional | Boolean - enforces PUT method for the create form
--}}
<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(@$edit_mode)
        @method('PUT')
    @endif
    <div>
        <label for="image">Image:</label>
        <input type="file" name="image">
    </div>
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{@$post['title']}}">
    </div>
    <div>
        <label for="description">Descritpion:</label>
        <input type="text" name="description" value="{{@$post['description']}}">
    </div>
    <div>
        <label for="author">Author:</label>
        <select name="author">
            @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->first_name}} {{$author->last_name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="tags">Tags:</label>
        <select name="tags[]" multiple>
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
    <div><input type="submit" value="Save"></div>
</form>