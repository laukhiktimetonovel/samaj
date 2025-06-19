<div class="order-[-1] hidden lg:block lg:order-none w-full lg:w-[230px] pb-5 md:pb-0 lg:pl-4 sticky top-0">
    <h3 class="text-sm font-bold text-black text-center pb-2">જાહેરાત *</h3>
    <div class=" bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="desktop-ads swiper-container relative">
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
                        <img src="{{ asset('images/160 × 600.png') }}" alt="Ad 1" class="w-full object-cover">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://einvite.in/" target="_blank">
                        <img src="{{ asset('images/160 × 600.png') }}" alt="Ad 1" class="w-full object-cover">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://einvite.in/" target="_blank">
                        <img src="{{ asset('images/160 × 600.png') }}" alt="Ad 1" class="w-full object-cover">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://einvite.in/" target="_blank">
                        <img src="{{ asset('images/160 × 600.png') }}" alt="Ad 1" class="w-full object-cover">
                    </a>
                </div>
            </div>
            <!-- Pagination (Dashes Above Slider) -->
            <div class="swiper-pagination"></div>
        </div> 
    </div>
</div>