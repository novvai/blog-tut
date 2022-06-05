{{--
    $action - Required
    $edit_mode - Optional | Boolean - enforces PUT method for the create form
--}}
<form action="{{$action}}" method="POST">
    @csrf
    @if(@$edit_mode)
        @method('PUT')
    @endif
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
        <input type="text" name="author"  value="{{@$post['author']}}">
    </div>
    <div><input type="submit" value="Save"></div>
</form>