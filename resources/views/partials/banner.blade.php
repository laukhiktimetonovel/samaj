<!-- resources/views/partials/splash.blade.php -->
@extends('layouts.banner')



@section('content')
<!-- Modal -->
<style>

        body {
            background-image: url('{{ asset('images/webbg.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            min-height: 100vh;
            margin: 0;
        }
        .modal {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
        }
        .swiper-button-next, .swiper-button-prev {
          color: #fff !important;
        }
        @media (max-width: 767px) {
      body {
            
            background-position: left;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
        }
}
        
    </style>
</style>
<div class="modal fixed inset-0 z-50 flex items-center justify-center hidden" id="splashModal">
    <div class="relative w-full max-w-4xl h-[80vh] bg-opacity-80 rounded-lg overflow-hidden">
        <!-- Swiper Slider -->
        <div class="swiper mySwiper relative h-full w-full z-10">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide flex items-center justify-center bg-transparent">
                    <img src="{{ asset('images/einvite.png') }}" class="p-8 sm:p-0 max-w-full max-h-full object-contain mx-auto" />
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide flex items-center justify-center bg-transparent">
                    <img src="{{ asset('images/inneradd2.png') }}" class="p-8 sm:p-0 max-w-full max-h-full object-contain mx-auto" />
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide flex items-center justify-center bg-transparent">
                    <img src="{{ asset('images/inneradd3.png') }}" class="p-8 sm:p-0 max-w-full max-h-full object-contain mx-auto" />
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide flex items-center justify-center bg-transparent">
                    <a href="{{ route('banner.close') }}" id=""
                       class="absolute top-4 right-4 pt-[6px] bg-white text-black text-xl rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:bg-red-500 hover:text-white transition">
                        ✕
                    </a>
                    <img src="{{ asset('images/inneradd4.png') }}" class="p-8 sm:p-0 max-w-full max-h-full object-contain mx-auto" />
                </div>
            </div>
            <!-- Swiper Controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
        </div>
    </div>
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
            on: { 
                reachEnd() { 
                    swiper.autoplay.stop(); 
                }
            },
        });

        // Show modal on page load
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('splashModal');
            modal.classList.remove('hidden');
        });

        // Close modal on close button click
        document.getElementById('splashClose').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('splashModal').classList.add('hidden');
        });
    </script>
@endpush