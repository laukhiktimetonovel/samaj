@extends('layouts.app')

@section('content')
   <div class="w-full lg:w-[calc(100%_-_230px)]">
        <!-- Title -->
        <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
            {{ $gam }} પરિવાર
        </h2>
        <!-- Member list -->
        <div class="grid grid-cols-2 xl:grid-cols-4 2xl:grid-cols-6 gap-2 sm:gap-4">
            @foreach($members as $m)
                <a href="{{ route('family.members', $m) }}"
                   class="bg-white rounded-lg sm:rounded-2xl shadow p-2 sm:p-4 flex flex-col items-center text-center gap-3">
                    <div class="w-full h-auto relative overflow-hidden">
                        <div class="relative overflow-hidden w-full block h-full pt-[100%] border border-gray-100 rounded-lg sm:rounded-xl">
                            <img
                                src="{{ $m->photo_url ?? asset('images/default-avatar.png') }}"
                                class="absolute h-full w-full object-contain left-0 top-0"
                                loading="lazy"
                                alt="{{ $m->full_name }}"
                            />
                        </div>
                    </div>
                    <h3 class="text-sm md:text-lg font-semibold text-gray-800">
                        {{ $m->full_name }} ({{ $gam }})
                    </h3>
                </a>
            @endforeach
        </div>
    </div>
@endsection
