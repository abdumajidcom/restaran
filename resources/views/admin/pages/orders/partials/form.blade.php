@csrf

<div class="mb-3">
    <label for="order_number" class="form-label">Order Number</label>
    <input type="text" class="form-control" name="order_number" id="order_number"
        value="{{ old('order_number', $order->order_number ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="customer_name" class="form-label">Customer Name</label>
    <input type="text" class="form-control" name="customer_name" id="customer_name"
        value="{{ old('customer_name', $order->customer_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="customer_phone" class="form-label">Customer Phone</label>
    <input type="text" class="form-control" name="customer_phone" id="customer_phone"
        value="{{ old('customer_phone', $order->customer_phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="customer_email" class="form-label">Customer Email</label>
    <input type="email" class="form-control" name="customer_email" id="customer_email"
        value="{{ old('customer_email', $order->customer_email ?? '') }}">
</div>

<div class="mb-3">
    <label for="total" class="form-label">Total (so'm)</label>
    <input type="number" class="form-control" name="total" id="total"
        value="{{ old('total', $order->total ?? '') }}" required>
</div>



<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="pending" {{ old('status', $order->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ old('status', $order->status ?? '') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="rejected" {{ old('status', $order->status ?? '') == 'rejected' ? 'selected' : '' }}>Rejected</option>
    </select>
</div>


<button type="submit" class="btn btn-success">{{ $buttonText ?? 'Save' }}</button>
