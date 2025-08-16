@extends('layout.app')

@section('title', 'Edit Product')

@section('content')
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Mahsulot nomini kiritish qismi --}}
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $product->name) }}">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Mahsulot narxini kiritish qismi --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price"
                   class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price', $product->price) }}" step="0.01">
            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Kategoriya tanlash bo‘limi --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Choose Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Rasm yuklash qismi --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            <input type="file" name="image" id="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Sold out belgilash --}}
        <div class="form-group form-check mb-3">
            <input type="checkbox" name="sold_out" id="sold_out" class="form-check-input"
                   value="1" {{ old('sold_out', $product->sold_out) ? 'checked' : '' }}>
            <label class="form-check-label" for="sold_out">Sold Out</label>
        </div>

        {{-- Tugmalar --}}
        <button type="submit" class="btn btn-success">{{ $buttonText ?? 'Save' }}</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
