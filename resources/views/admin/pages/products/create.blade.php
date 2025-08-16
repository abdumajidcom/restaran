@extends('layout.index')


@section('title', 'Add Product')

@section('content')
    <h2>Add New Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">

        @csrf

        @include('admin.pages.products.partials.form', ['buttonText' => 'Create Product'])


    </form>
@endsection
