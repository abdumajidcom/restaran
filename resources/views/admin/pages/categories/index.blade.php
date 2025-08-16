@extends('layout.app')

@section('title', 'Categories')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        @keyframes upPulse {
            0%   { transform: translateX(0); }
            25%  { transform: translateX(55px); }
            50%  { transform: translateX(0); }
            75%  { transform: translateX(-100px); }
            100% { transform: translateX(0); }
        }

        @keyframes rainbow-text {
            0%   { color: red; }
            16%  { color: orange; }
            33%  { color: yellow; }
            50%  { color: green; }
            66%  { color: blue; }
            83%  { color: violet; }
            100% { color: red; }
        }

        .anim-rainbow-Pulse {
            font-family: 'Curlz MT', cursive;
            animation: rainbow-text 3s linear infinite, upPulse 4s ease-in-out infinite;
            display: inline-block;
        }
    </style>

    <h1 class="mb-4 anim-rainbow-Pulse">Menu Categories</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.categories.create') }}" style="cursor: no-drop ; margin-left: 50px " class="btn btn-primary mb-3">➕ Add New Category</a>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        {{-- Bosilganda mahsulotlar sahifasiga o'tadi --}}
                        <td>
                            @if ($category->name == 'Foods')
                                <a href="{{ route('public.foods') }}" class="text-decoration-none fw-bold">
                                    {{ $category->name }}
                                </a>
                            @elseif ($category->name == 'Drinks')
                                <a href="{{ route('public.drinks') }}" class="text-decoration-none fw-bold">
                                    {{ $category->name }}
                                </a>
                            @elseif ($category->name == 'Deserts')
                                <a href="{{ route('public.deserts') }}" class="text-decoration-none fw-bold">
                                    {{ $category->name }}
                                </a>
                            @else
                                <span class="fw-bold">{{ $category->name }}</span>
                            @endif
                        </td>

                        <td>{{ $category->created_at ? $category->created_at->format('d M, Y') : '-' }}</td>

                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted text-center">No categories found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
