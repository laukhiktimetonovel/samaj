@extends('layouts.app')

@section('content')
<div class="py-4 md:py-6 w-full px-4 md:min-h-screen md:max-h-screen md:overflow-y-auto">
    <!-- Title -->
    <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
        ગામની યાદી
    </h2>

    <div>
        <!-- Family list -->
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
            @foreach($gams as $gam)
                <a href="{{ route('family.book', ['gam' => $gam->village_name]) }}" 
                   class="bg-white rounded-[12px] p-4 md:p-6 flex justify-between items-center gap-4 border border-gray-200">
                    <span class="md:text-xl font-semibold">
                        {{ $gam->village_name }}
                    </span>
                    <span class="bg-white text-[#B3541E] text-sm font-semibold px-3 py-1 rounded-md border border-[#B3541E]">
                        {{ $gam->total }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
