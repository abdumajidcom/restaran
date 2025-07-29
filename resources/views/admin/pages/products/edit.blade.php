@extends('layout.app')

@section('title', 'Edit Product')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')

        @include('products.partials.form', ['buttonText' => 'Update Product'])

    </form>
@endsection
