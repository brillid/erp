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
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control" value="{{ isset($user) ? $user->password : '' }}">
</div>