@extends('layouts.app')

@section('content')
    <h1>User Details</h1>
    
    <ul class="list-group">
        <li class="list-group-item"><strong>Username:</strong> {{ $user->username }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
    </ul>

    @if(auth()->user()->can('edit-user'))
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
    @endif

    <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
@endsection
