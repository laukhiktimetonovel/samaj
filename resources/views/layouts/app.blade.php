<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#B3541E" />
    <title>તળપદા કોળી પટેલ સમાજ</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link href="https://fonts.googleapis.com/css2?family=Anek+Gujarati:wght@100..800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="flex flex-col md:flex-row">
    @include('components.sidebar')

    <div class="py-4 md:py-6 w-full px-4 md:min-h-screen md:max-h-screen md:overflow-y-auto">
      <div class="flex items-start flex-col lg:flex-row">
        @if(session('success'))
          <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif
        
        @yield('content')
        @include('components.advataizment')
      </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>
