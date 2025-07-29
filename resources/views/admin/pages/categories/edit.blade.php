@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
