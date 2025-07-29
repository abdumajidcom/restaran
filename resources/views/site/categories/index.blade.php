{{-- resources/views/site/categories/index.blade.php --}}
@extends('site.layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">All Categories</h2>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">View Products</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
