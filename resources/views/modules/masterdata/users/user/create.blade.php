@extends('layouts.app')

@section('content')
    <h1>Create User</h1>
    
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('modules.masterdata.users.users.form')
    </form>

    <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
@endsection
