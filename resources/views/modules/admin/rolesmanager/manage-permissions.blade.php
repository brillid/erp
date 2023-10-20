@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage Permissions for Role: {{ $role->name }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('roles-manager.update-permissions', $role->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="permissions">Select Permissions:</label>
                                <select name="permissions[]" id="permissions" class="form-control" multiple>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Permissions</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
