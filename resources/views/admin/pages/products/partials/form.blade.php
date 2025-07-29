{{-- Mahsulot nomini kiritish qismi --}}
<div class="mb-3">
    <label for="name" class="form-label">Product Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
           value="{{ old('name', $product->name ?? '') }}">
    {{-- Agar validatsiyada xatolik bo‘lsa, foydalanuvchiga ko‘rsatadi --}}
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Mahsulot narxini kiritish qismi --}}
<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
           value="{{ old('price', $product->price ?? '') }}" step="0.01">
    {{-- Xatolik bo‘lsa narxda, shu yerda ko‘rsatadi --}}
    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Kategoriya tanlash bo‘limi --}}
<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
        <option value="">-- Choose Category --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    {{-- Kategoriya tanlanmasa yoki noto‘g‘ri bo‘lsa, xatolikni ko‘rsatadi --}}
    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Rasm yuklash qismi (ixtiyoriy) --}}
<div class="mb-3">
    <label for="image" class="form-label">Image (optional)</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
    {{-- Rasm bilan bog‘liq xatolik bo‘lsa, shu yerda ko‘rsatiladi --}}
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

{{-- Saqlash tugmasi --}}
<button type="submit" class="btn btn-success">{{ $buttonText }}</button>

{{-- Orqaga qaytish tugmasi --}}
<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>

{{-- Taxrilash --}}
<div class="form-group form-check mt-3">
    <input type="checkbox" name="sold_out" class="form-check-input" value="1"
        {{ old('sold_out', $product->sold_out ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="sold_out">Sold Out</label>
</div>
