@extends('layout.index')

@section('title', 'Edit Order')

@section('content')
    <div class="container">
        <h2>Edit Order</h2>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @method('PUT')
            @include('admin.pages.orders.partials.form', ['buttonText' => 'Update'])
        </form>
    </div>
@endsection
