<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#575228" />
    <title>તળપદા કોળી પટેલ સમાજ</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}"> 
    
    {{-- <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}"> --}}
    
    <link href="https://fonts.googleapis.com/css2?family=Anek+Gujarati:wght@100..800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}" />
    @vite('resources/css/app.css')
    <style>
      .tns-nav {
          position: absolute;
          bottom: 30px;
          z-index: 1;
          left: 50%;
          transform: translateX(-50%);
          display: flex;
          align-items: center;
          gap: 5px;
      }
      .tns-nav button {
          height: 8px;
          width: 15px;
          background-color: gray;
          border-radius: 5px;
          transition: all 0.5s ease-in-out;
      }
      .tns-nav button.tns-nav-active {
          background-color: rgb(255, 255, 255);
      }
      @media (max-width:1023px) {
        .tns-nav {
          bottom: 5px;
        }
        .tns-nav button {
            width: 8px;
        }
      }
    </style>
</head>
<body class="flex flex-col md:flex-row">
    @include('components.sidebar')

    <div class="py-4 md:py-6 w-full px-4 md:min-h-screen md:max-h-screen md:overflow-y-auto main-content">
      <div class="flex items-start flex-col lg:flex-row">
        @if(session('success'))
          <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif
        
        @yield('content')
        @include('components.mobileadvataizment')
        @include('components.advataizment')
      </div>
    </div>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>
