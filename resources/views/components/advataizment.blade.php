<div class="order-[-1] hidden lg:block lg:order-none w-full lg:w-[230px] pb-5 md:pb-0 lg:pl-4 sticky top-0">
    <h3 class="text-sm font-bold text-black text-center pb-2">જાહેરાત *</h3>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="desktop-ads-slider relative">
            <div class="tiny-slider">
                @php
                    $advertisements = get_advertisements('screen');
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
