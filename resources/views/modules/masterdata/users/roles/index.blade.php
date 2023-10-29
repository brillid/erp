@extends('layouts.app')

@section('content')
    <h1>Roles</h1>
    <div class="mb-3">
        <a href="{{ route('masterdata.roles.roles.create') }}" class="btn btn-primary">Create Role</a>
        <a href="{{ route('masterdata.index') }}" class="btn btn-secondary">Back to Masterdata</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                            {{ $permission->name }}<br>
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('masterdata.roles.roles.edit', $role) }}" method="GET" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="{{ route('masterdata.roles.roles.destroy', $role) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
