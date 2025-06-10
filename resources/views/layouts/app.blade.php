<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>તળપદા કોળી પટેલ સમાજ</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link href="https://fonts.googleapis.com/css2?family=Anek+Gujarati:wght@100..800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="flex flex-col md:flex-row">
    @include('components.sidebar')

    <div class="py-4 md:py-6 w-full px-4 md:min-h-screen md:overflow-y-auto">
        @if(session('success'))
          <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
