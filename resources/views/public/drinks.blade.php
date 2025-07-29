@extends('layout.app')

@section('title', 'Drinks')

@section('content')
    <h1 class="mb-4">Drink Menu</h1>

    <div class="row">
        @foreach ($drinks as $drink)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $drink->image) }}" class="card-img-top" alt="{{ $drink->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $drink->name }}</h5>
                        <p class="card-text">{{ $drink->description }}</p>
                        <p class="card-text"><strong>{{ number_format($drink->price) }} so'm</strong></p>
                        <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
