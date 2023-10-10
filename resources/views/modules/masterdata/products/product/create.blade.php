@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Product</h1>
    <form method="POST" action="{{ route('masterdata.products.product.store') }}">
        @csrf

        <!-- Include the form partial for product creation -->
        @include('modules.masterdata.products.product._form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </form>
</div>
@endsection
