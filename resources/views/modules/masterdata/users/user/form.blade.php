<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="form-control" value="{{ isset($user) ? $user->username : '' }}">
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ isset($user) ? $user->name : '' }}">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ isset($user) ? $user->email : '' }}">
</div>

@if(isset($user) && auth()->user()->can('edit-user'))
    <button type="submit" class="btn btn-warning">Update User</button>
@elseif(auth()->user()->can('create-user'))
    <button type="submit" class="btn btn-success">Create User</button>
@endif
