@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        @include('modules.masterdata.users.users.form', ['user' => $user])
    </form>

    <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
@endsection
