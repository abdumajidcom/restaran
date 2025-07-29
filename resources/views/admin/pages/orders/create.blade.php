@extends('layout.index')

@section('title', 'Add Order')

@section('content')
    <div class="container">
        <h2>Add New Order</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.orders.store') }}" method="POST">
            @csrf
            @include('admin.pages.orders.partials.form', ['buttonText' => 'Create'])
        </form>
    </div>
@endsection
