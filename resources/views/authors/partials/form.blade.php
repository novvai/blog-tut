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
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{@$author['first_name']}}">
    </div>
    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{@$author['last_name']}}">
    </div>
    <div>
        <label for="alias">Alias:</label>
        <input type="text" name="alias" value="{{@$author['alias']}}">
    </div>
    <div><input type="submit" value="Save"></div>
</form>