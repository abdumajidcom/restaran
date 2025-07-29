{{-- resources/views/admin/pages/categories/create.blade.php --}}
@extends('layout.index')


@section('content')
<div class="container mt-4">
    <h2>Create Category</h2>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
