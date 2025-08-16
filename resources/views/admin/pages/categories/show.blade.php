{{-- resources/views/admin/pages/categories/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Category: {{ $category->name }}</h1>

        @if ($category->products->count() > 0)
            <div class="row">
                @foreach ($category->products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Narxi: {{ number_format($product->price) }} so‘m</p>
                                @if($product->sold_out)
                                    <span class="badge bg-danger">Sotuvda yo‘q</span>
                                @else
                                    <span class="badge bg-success">Mavjud</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Bu kategoriya ostida hech qanday mahsulot mavjud emas.</p>
        @endif

        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">Orqaga</a>
    </div>
@endsection
