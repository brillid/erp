@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Master Data</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2>Submodules:</h2>
                    <div class="list-group">
                        <!-- Example submodule buttons, replace with your actual submodules -->
                        <a href="{{ route('modules.products.index') }}" class="list-group-item list-group-item-action">Products</a>
                        <!-- Add more submodule buttons as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
