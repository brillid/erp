@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Submodules:</h2>
                    <div class="bd-example">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-lg">Roles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
