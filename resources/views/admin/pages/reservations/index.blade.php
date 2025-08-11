@extends('layout.app')

@section('title', 'Reservations')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Reservations</h2>
            <a href="{{ route('admin.reservations.create') }}" class="btn btn-danger">+ Add Reservations</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($reservations->isEmpty())
            <div class="alert alert-warning">No reservations found.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Guests</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reservations as $index => $reservation)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->guest_count }}</td>

                            <td>
                                {{ $reservation->date ? \Carbon\Carbon::parse($reservation->date)->format('d M Y') : 'No date' }}
                            </td>
                            <td>
                                {{ $reservation->time ? \Carbon\Carbon::parse($reservation->time)->format('H:i') : 'No time' }}
                            </td>

                            <td>{{ $reservation->note ?? '-' }}</td>

                            <td>
                                    <span class="badge bg-{{ $reservation->status === 'confirmed' ? 'success' : ($reservation->status === 'pending' ? 'warning' : 'secondary') }}">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                            </td>

                            <td>
                                {{ $reservation->created_at ? $reservation->created_at->format('d M Y') : 'N/A' }}
                            </td>

                            <td>
                                <a href="{{ route('admin.reservations.show', $reservation->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
