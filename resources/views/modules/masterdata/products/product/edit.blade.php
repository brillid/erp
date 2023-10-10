@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form method="POST" action="{{ route('masterdata.products.product.update', $product->id) }}">
        @csrf
        @method('PUT')

        <!-- Include the form partial for product editing -->
        @include('modules.masterdata.products.product._form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
    <a href="{{ route('masterdata.products.product.show', $product->id) }}" class="btn btn-secondary">Back to Details</a>
</div>
@endsection
