@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>
    <form method="POST" action="{{ route('masterdata.roles.roles.update', $role->id) }}">
        @csrf
        @method('PATCH')
        
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $role->name) }}" required>
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ old('description', $role->description) }}">
        <br>
        <button type="submit" class="btn btn-primary">Update Role</button>
        <a href="{{ route('masterdata.roles.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection