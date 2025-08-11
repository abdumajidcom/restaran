<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABDUMAJID'S Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @keyframes rainbow-text {
            0% { color: red; }
            20% { color: orange; }
            40% { color: yellow; }
            60% { color: green; }
            80% { color: blue; }
            100% { color: red; }
        }

        .anim-rainbow {
            animation: rainbow-text 2s linear infinite;
        }

        body {
            background-color: #f9f9f9;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand anim-rainbow" href="#">ABDUMAJID'S Restaurant</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li><a class="nav-link text-light" href="{{ route('admin.categories.index') }}">Menu</a></li>
            <li><a href="{{ route('admin.orders.index') }}" class="nav-link text-light">Orders</a></li>
            <li><a href="{{ route('admin.products.index') }}" class="nav-link text-light">Products</a></li>
            <li><a href="{{ route('admin.reservations.index') }}" class="nav-link text-light">Reservations</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
