@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Item Code</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->itemcode }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <a href="{{ route('masterdata.products.product.show', $product->id) }}" class="btn btn-primary">Show</a>
                        @if(auth()->user()->can('edit-product'))
                        <a href="{{ route('masterdata.products.product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('masterdata.products.product.create') }}" class="btn btn-success">Create New Product</a>
</div>
@endsection
