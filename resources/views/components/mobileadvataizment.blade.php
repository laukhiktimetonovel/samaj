<div class="w-full max-w-full order-[-1] block lg:hidden pb-5 lg:order-none">
    <h3 class="text-sm font-bold text-black text-center pb-2 md:mt-[-10px]">જાહેરાત *</h3>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="mobile-ads-slider relative">
            <div class="tiny-slider">
                @php
                    $advertisements = get_advertisements('mobile');
                @endphp
                @foreach($advertisements as $ad)
                    <div>
                        <a href="{{ $ad->url ?? 'javascript:void(0);' }}">
                            <img src="{{ asset($ad->image_path) }}" alt="{{ $ad->title ?? 'Advertisement' }}" class="w-full object-cover">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
