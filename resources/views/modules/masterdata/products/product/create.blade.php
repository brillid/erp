@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Product</h1>
    <form method="POST" action="{{ route('masterdata.products.product.store') }}" id="product-form">
        @csrf
        @include('modules.masterdata.products.product._form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="{{ route('masterdata.products.product.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </form>
</div>
@endsection
