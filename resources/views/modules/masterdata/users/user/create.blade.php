@extends('layouts.app')

@section('content')
    <h1>Create User</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('masterdata.users.user.store') }}" method="POST">
        @csrf
        @include('modules.masterdata.users.user.form')
        <div>
            <label for="roles">Select Roles:</label>
            @foreach ($roles as $role)
            <div>
                <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                {{ $role->name }}
            </div>
            @endforeach
        </div>
    <button type="submit" class="btn btn-primary">Create User</button>
    </form>

    <a href="{{ route('masterdata.users.user.index') }}" class="btn btn-secondary">Back</a>
@endsection
