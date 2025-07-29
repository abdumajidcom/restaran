@extends('layout.app')

@section('title', 'Desserts')

@section('content')
    <h1 class="mb-4">Dessert Menu</h1>

    <div class="row">
        @foreach ($desserts as $dessert)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $dessert->image) }}" class="card-img-top" alt="{{ $dessert->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dessert->name }}</h5>
                        <p class="card-text">{{ $dessert->description }}</p>
                        <p class="card-text"><strong>{{ number_format($dessert->price) }} so'm</strong></p>
                        <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
