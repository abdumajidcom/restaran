@extends('layout.app')


@section('title', 'Product Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $product->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>
            <p><strong>Image:</strong></p>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="200">
            @else
                <p>No image uploaded.</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
