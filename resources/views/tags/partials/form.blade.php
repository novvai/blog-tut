
<form action="{{$action}}" method="POST">
    @csrf
    @if(@$edit_mode)
        @method('PUT')
    @endif
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{@$tag['name']}}">
    </div>
    <div>
        <label for="descr">Description:</label>
        <textarea name="descr" id="" cols="30" rows="10">{{@$tag['descr']}}</textarea>
    </div>
    <div><input type="submit" value="Save"></div>
</form>