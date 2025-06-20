<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="manifest" href="{{ asset('manifest.json') }}"> --}}
    <meta name="theme-color" content="#575228">
    <title>{{ config('app.name', 'તળપદા કોળી પટેલ સમાજ') }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Gujarati:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    @vite('resources/css/app.css')
</head>
<body class="font-gujarati bg-black">
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>