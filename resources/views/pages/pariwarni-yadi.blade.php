@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <!-- Title -->
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left">
        ગામની યાદી
    </h2>
    <!-- Family list -->
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
        @foreach($gams as $gam)
            <a href="{{ route('family.book', ['gam' => $gam->village_name]) }}" 
               class="bg-white rounded-[12px] p-4 md:p-6 flex text-[#575228] justify-between items-center gap-4 border border-[#57522846]">
                <span class="md:text-xl font-semibold">
                    {{ $gam->village_name }}
                </span>
                <span class="bg-white text-[#575228] text-sm font-semibold px-3 py-1 rounded-md border border-[#575228]">
                    {{ $gam->total }}
                </span>
            </a>
        @endforeach
    </div>
</div>
@endsection
