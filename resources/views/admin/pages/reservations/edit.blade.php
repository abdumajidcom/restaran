@extends('layout.app')

@section('content')
    <h1 class="mb-4">Edit Reservation #{{ $reservation->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('admin.pages.reservations.partials.form', ['reservation' => $reservation, 'buttonText' => 'Update'])
    </form>
@endsection
