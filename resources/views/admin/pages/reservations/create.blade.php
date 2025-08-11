@extends('layout.app')

@section('title', 'Add Reservation')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add New Reservation</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.reservations.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Customer Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Guests</label>
                    <input type="number" name="guest_count" class="form-control" min="1" value="{{ old('guest_count', 1) }}" required>
                </div>

               {{-- <div class="col-md-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                </div>
--}}
                <div class="col-md-3">
                    <label class="form-label">Time</label>

                    <input type="datetime-local" name="reservation_time" class="form-control" value="{{ old('reservation_time') }}" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" selected>Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Note</label>
                    <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Save Reservation</button>
                <a href="{{ route('admin.reservations.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
