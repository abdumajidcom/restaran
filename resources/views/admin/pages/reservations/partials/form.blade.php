<div class="mb-3">
    <label for="user_id" class="form-label">User</label>
    <select name="user_id" id="user_id" class="form-control">
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ (old('user_id', $reservation->user_id ?? '') == $user->id) ? 'selected' : '' }}>
                {{ $user->name }} ({{ $user->email }})
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <select name="type" id="type" class="form-control">
        <option value="table" {{ (old('type', $reservation->type ?? '') == 'table') ? 'selected' : '' }}>Table</option>
        <option value="cabinet" {{ (old('type', $reservation->type ?? '') == 'cabinet') ? 'selected' : '' }}>Cabinet</option>
    </select>
</div>

<div class="mb-3">
    <label for="guest_count" class="form-label">Guest Count</label>
    <input type="number" name="guest_count" id="guest_count" class="form-control"
           value="{{ old('guest_count', $reservation->guest_count ?? '') }}">
</div>

<div class="mb-3">
    <label for="reservation_time" class="form-label">Reservation Time</label>
    <input type="datetime-local" name="reservation_time" id="reservation_time" class="form-control"
           value="{{ old('reservation_time', isset($reservation->reservation_time) ? \Carbon\Carbon::parse($reservation->reservation_time)->format('Y-m-d\TH:i') : '') }}">
</div>

<div class="mb-3">
    <label for="note" class="form-label">Note</label>
    <textarea name="note" id="note" class="form-control" rows="3">{{ old('note', $reservation->note ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="pending" {{ (old('status', $reservation->status ?? '') == 'pending') ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ (old('status', $reservation->status ?? '') == 'confirmed') ? 'selected' : '' }}>Confirmed</option>
        <option value="cancelled" {{ (old('status', $reservation->status ?? '') == 'cancelled') ? 'selected' : '' }}>Cancelled</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Save' }}</button>
