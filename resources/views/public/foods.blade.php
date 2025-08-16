@extends('layout.app')

@section('title', 'Foods')

@section('content')
    <h1 class="mb-4">Food Menu</h1>

    <div class="row">
        @foreach ($foods as $food)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $food->image) }}" class="card-img-top" alt="{{ $food->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->name }}</h5>
                        <p class="card-text">{{ $food->description }}</p>
                        <p class="card-text"><strong>{{ number_format($food->price) }} so'm</strong></p>
                        <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
