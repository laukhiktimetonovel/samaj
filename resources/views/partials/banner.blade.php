<!-- resources/views/partials/splash.blade.php -->
@extends('layouts.banner')

@section('content')
<div class="hidden swiper mySwiper h-screen w-screen bg-black">
  {{-- <div class="relative h-full w-full"> --}}
    <div class="swiper-wrapper">

      <!-- Slide 1 -->
      <div class="swiper-slide flex items-center justify-center bg-black">
        <img src="{{asset('images/add1.jpg')}}" class="max-w-full max-h-full object-contain mx-auto" />
      </div>

      <!-- Slide 2 -->
      <div class="swiper-slide flex items-center justify-center bg-black">
        <img src="{{asset('images/add2.jpg')}}" class="max-w-full max-h-full object-contain mx-auto" />
      </div>

      <!-- Slide 3 -->
      <div class="swiper-slide flex items-center justify-center bg-black">
        <img src="{{asset('images/add3.jpg')}}" class="max-w-full max-h-full object-contain mx-auto" />
      </div>

      <!-- Slide 4 -->
      <div class="swiper-slide flex items-center justify-center bg-black">
         <a href="{{ route('banner.close') }}" id="splashClose"
                class="absolute top-4 right-4 bg-white text-black text-xl rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:bg-red-500 hover:text-white transition">
          ✕
      </a>
        <img src="{{asset('images/add2.jpg')}}" class="max-w-full max-h-full object-contain mx-auto" />
      </div>

    </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next text-white"></div>
      <div class="swiper-button-prev text-white"></div>

    <!-- Close button -->
    {{-- <button id="splashClose"
            class="absolute top-4 right-4 bg-white text-black text-xl rounded-full w-10 h-10 
                   flex items-center justify-center shadow-lg hover:bg-red-500 hover:text-white 
                   transition">
      ✕
    </button> --}}
  {{-- </div> --}}
</div>
@endsection


@push('scripts')
    <script>
        // Initialize Swiper
        const swiper = new Swiper(".mySwiper", {
            loop: false,
            autoplay: { delay: 3000, disableOnInteraction: true },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            on: { reachEnd() { swiper.autoplay.stop(); } },
        });
    </script>
@endpush
