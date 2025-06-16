<link href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" rel="stylesheet">
    <style>
        .swiper-pagination-bullet {
            width: 12px;
            height: 3px;
            background: #ffffff;
            border-radius: 0;
            opacity: 0.5;
        }
        .swiper-pagination-bullet-active {
            background: #ffffff;
            opacity: 1;
        }
        body .swiper-pagination {
            position: absolute;
            bottom: -3px    ;
            left: 0;
            right: 0;
            text-align: center;
            padding-top: 2px;
        }
        .swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal{
    bottom: -3px;
    left: 0;
    width: 100%;
}
    </style>
  <!-- Full-Width Container -->
    <div class="w-full max-w-full order-[-1] block md:hidden pb-5 md:order-none ">
        <!-- Ad Banner (Centered, 200px width) -->
       <div class=" text-black text-center py-2">
      <h3 class="text-sm font-bold">જાહેરાત  *</h3>
    </div>
        <div class=" bg-white shadow-lg rounded-lg overflow-hidden">
            
            <!-- Ad Header -->
            <!-- Slider -->
            <div class="swiper-container relative">
                <div class="swiper-wrapper">
                    @php
                        $advertisements = get_advertisements();
                    @endphp
                    @foreach($advertisements as $ad)
                        <div class="swiper-slide">
                            <a href="{{ $ad->url ?? 'javascipt:void(0);' }}">
                                <img src="{{ asset($ad->image_path) }}" alt="{{ $ad->title ?? 'Advertisement' }}" class="w-full object-cover">
                            </a>
                        </div>
                    @endforeach
                    {{-- <div class="swiper-slide">
                        <a href="">
                        <img src="{{ asset('images/mobileadd1.png') }}" alt="Ad 1" class="w-full object-cover">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                        <img src="{{ asset('images/mobileadd2.png') }}" alt="Ad 2" class="w-full object-cover">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="">
                        <img src="{{ asset('images/mobileadd1.png') }}" alt="Ad 3" class="w-full object-cover">
                        </a>
                    </div> --}}
                </div>
                <!-- Pagination (Dashes Above Slider) -->
                <div class="swiper-pagination"></div>
            </div>
           
        </div>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'bullets',
            },
        });
    </script>
