@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('masterdata.users.user.show', $user->id) }}" class="btn btn-info">View</a>
                        @if(auth()->user()->hasRoleWithPermission('edit-user'))
                            <a href="{{ route('masterdata.users.user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('masterdata.users.user.create') }}" class="btn btn-success">Create User</a>
    <a href="{{ route('masterdata.index') }}" class="btn btn-secondary">Back to Masterdata</a>
@endsection
