@extends('layout.app')

@section('title', 'Reservation Details')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Reservation #{{ $reservation->id }}</h4>

            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reservation?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>

        <div class="card-body">
            <p><strong>Name:</strong> {{ $reservation->name }}</p>
            <p><strong>Phone:</strong> {{ $reservation->phone }}</p>
            <p><strong>Guest Count:</strong> {{ $reservation->guest_count }}</p>
            <p><strong>Time:</strong> {{ $reservation->reservation_time }}</p>
            <p><strong>Status:</strong>
                @if($reservation->status === 'confirmed')
                    <span class="badge bg-success">Confirmed</span>
                @elseif($reservation->status === 'pending')
                    <span class="badge bg-warning text-dark">Pending</span>
                @else
                    <span class="badge bg-secondary">Cancelled</span>
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
