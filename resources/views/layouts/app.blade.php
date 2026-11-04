<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Site')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header class="bg-dark text-white p-3 mb-4">
        <div class="container">
            <h1>My Awesome Site</h1>
            @include('partials._nav')
        </div>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="container text-center text-muted mt-5 mb-3">
        <p>Robin Quijano</p>
    </footer>

</body>
</html>