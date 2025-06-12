@extends('layouts.app')

@section('content')
    <div class="w-full lg:w-[calc(100%_-_270px)]">
        <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
            {{-- Map your pageName to a readable title --}}
            તળપદા કોળી પટેલ સમાજ ના હોદ્દેદારો
        </h2>
        <div id="memberGrid" class="grid grid-cols-2 lg:grid-cols-4 2xl:grid-cols-6 gap-2 sm:gap-4">
            @foreach($members as $member)
                <div class="bg-white rounded-xl shadow p-2 sm:p-3 text-center flex flex-col gap-3 sm:gap-4">
                    <div class="w-full h-auto relative overflow-hidden">
                        <div class="relative overflow-hidden w-full block h-full pt-[100%] border border-gray-100 rounded-xl">
                            <img
                              src="{{ asset("images/hodedar/{$member->image}") }}"
                              class="absolute h-full w-full object-contain left-0 top-0"
                              loading="lazy"
                              alt="{{ $member->name }}"
                            />
                        </div>
                    </div>
                    <div class="flex-col gap-1 flex flex-1">
                        <h2 class="font-semibold md:font-bold sm:text-lg flex-1">{{ $member->name }}</h2>
                        <p class="text-[#B3541E] text-sm">{{ $member->role }}</p>
                        <p>Mo: {{ $member->phone }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
