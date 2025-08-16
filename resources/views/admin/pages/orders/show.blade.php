@extends('layout.index')

@section('title', 'Order Details')

@section('content')
    <div class="container">
        <h2>Order Details</h2>

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Order Number:</strong> {{ $order->order_number }}</li>
            <li class="list-group-item"><strong>Customer Name:</strong> {{ $order->customer_name }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $order->customer_phone }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $order->customer_email }}</li>
            <li class="list-group-item"><strong>Total:</strong> {{ number_format($order->total, 0, ',', ' ') }} so'm</li>
            <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($order->status) }}</li>
        </ul>

        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
