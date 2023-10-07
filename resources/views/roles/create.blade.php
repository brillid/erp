@extends('layouts.app')

@section('content')
    <h1>Create Role</h1>
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description">
        <br>
        <label for="permissions">Permissions:</label>
        <select name="permissions[]" multiple>
            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Create Role</button>
    </form>
@endsection
