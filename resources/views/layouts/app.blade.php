<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-secondary-subtle">
    <header class="p-3 bg-white">
        <x-shared.navigation />
    </header>
    <main class="container py-3">
        @yield('content')
    </main>
    <footer>
        <x-shared.footer />
    </footer>
    @stack('scripts')
</body>

</html>
