@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Master Data</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Submodules:</h2>
                    <div class="bd-example">
                        <!-- Products Button -->
                        <a href="{{ route('masterdata.products.index') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-box"></i>
                            <div>Products</div>
                        </a>

                        <!-- Users Button -->
                        <a href="{{ route('masterdata.users.index') }}" class="btn btn-success btn-lg">
                            <i class="fas fa-users"></i>
                            <div>Users</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
