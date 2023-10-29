@extends('layouts.app')

@section('content')
    <h1>Create Role</h1>
    <form method="POST" action="{{ route('masterdata.roles.roles.store') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description">
        <br>
        <button type="submit">Create Role</button>
    </form>
@endsection
