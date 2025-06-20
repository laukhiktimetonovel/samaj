<!-- Full-Width Container -->
<div class="w-full max-w-full order-[-1] block lg:hidden pb-5 lg:order-none">
    <h3 class="text-sm font-bold text-black text-center pb-2 md:mt-[-10px]">જાહેરાત  *</h3>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="mobile-ads relative">
            <div class="swiper-wrapper">
                {{-- @php
                    $advertisements = get_advertisements();
                @endphp
                @foreach($advertisements as $ad)
                    <div class="swiper-slide">
                        <a href="{{ $ad->url ?? 'javascipt:void(0);' }}">
                            <img src="{{ asset($ad->image_path) }}" alt="{{ $ad->title ?? 'Advertisement' }}" class="w-full object-cover">
                        </a>
                    </div>
                @endforeach --}}
                <div class="swiper-slide">
                    <a href="https://einvite.in/" target="_blank">
                        <img src="{{ asset('images/mobileadd1.png') }}" alt="Ad 1" class="w-full object-cover">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://einvite.in/" target="_blank">
                        <img src="{{ asset('images/mobileadd2.png') }}" alt="Ad 2" class="w-full object-cover">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://einvite.in/" target="_blank">
                        <img src="{{ asset('images/mobileadd1.png') }}" alt="Ad 3" class="w-full object-cover">
                    </a>
                </div>
            </div>
            <!-- Pagination (Dashes Above Slider) -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>