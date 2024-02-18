@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    
    <form action="{{ route('masterdata.users.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        @include('modules.masterdata.users.user.form', ['user' => $user])
        <div>
        <label for="roles">Select Roles:</label>
        @foreach ($roles as $role)
            <div>
                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'checked' : '' }}>
                {{ $role->name }}
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
    </form>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <a href="{{ route('masterdata.users.user.index') }}" class="btn btn-secondary">Back</a>
@endsection
