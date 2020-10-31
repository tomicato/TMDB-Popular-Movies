<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth/style.css') }}">
</head>
<body class="antialiased">

<div id="app">

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/auth/scripts.js') }}" defer></script>
</body>
</html>
