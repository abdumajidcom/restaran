@extends('site.layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $category->name }}</h1>

        @if ($category->products->isEmpty())
            <p>There are no products in this category yet.</p>
        @else
            <div class="row">
                @foreach ($category->products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                                <p class="text-muted">
                                    Price: <strong>{{ $product->price }} UZS</strong>
                                </p>
                                @if ($product->sold_out)
                                    <span class="badge bg-danger">Sold Out</span>
                                @else
                                    <a href="#" class="btn btn-primary btn-sm">Place Order</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">⬅ Back to Categories</a>
    </div>
@endsection
