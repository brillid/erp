@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>
    <table class="table">
        <tr>
            <th>Item Code</th>
            <td>{{ $product->itemcode }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $product->name }}</td>
        </tr>
        <!-- Add other attributes here -->
    </table>
    <a href="{{ route('masterdata.products.product.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
    <a href="{{ route('masterdata.products.product.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
