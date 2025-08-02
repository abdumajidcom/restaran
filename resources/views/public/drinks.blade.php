@extends('layout.app')

@section('title', 'Drinks')

@section('content')
    <h1 class="mb-4 text-center">Drink Menu</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($drinks as $drink)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="d-flex justify-content-center align-items-center" style="height: 180px; background-color: #f8f9fa;">
                        @if ($drink->image)
                            <img src="{{ asset('storage/' . $drink->image) }}"
                                 alt="{{ $drink->name }}"
                                 style="max-height: 160px; max-width: 100%; object-fit: contain;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $drink->name }}</h5>
                        <p class="card-text text-muted">{{ $drink->description ?: 'No description available.' }}</p>
                        <p class="card-text fw-bold text-success">{{ number_format($drink->price) }} so'm</p>
                    </div>
                    <div class="card-footer text-center bg-white border-0 pb-4">
                        <a href="#" class="btn btn-outline-primary px-4">Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
