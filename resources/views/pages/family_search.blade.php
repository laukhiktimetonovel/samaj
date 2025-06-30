@extends('layouts.app')

@section('content')
    <div class="w-full lg:w-[calc(100%_-_230px)]">
        <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
            સભ્ય શોધો
        </h2>
        <div class="max-w-xl space-y-4">
            <!-- Search Form -->
            <form action="{{ route('family.search') }}" method="GET" class="space-y-2 bg-white p-4 md:p-6 shadow rounded-xl">
                <label class="block text-gray-700 font-semibold text-sm md:text-base">
                    સદસ્ય શોધવા માટે નામ અથવા મોબાઈલ નંબર દાખલ કરો:
                </label>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input type="text" name="q" value="{{ old('q', $q) }}" placeholder="નામ અથવા મોબાઇલ નંબર દાખલ કરો" class="flex-1 px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]"/>
                    <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                        શોધો
                    </button>
                </div>
            </form>
            @if($q)
                @if($results->isNotEmpty())
                    @foreach($results as $member)
                        <a href="{{ route('family.members', $member) }}" class="bg-white rounded-[12px] p-4 text-center shadow-sm cursor-pointer block">
                            <p class="text-xl font-bold text-gray-800">
                                {{ $member->full_name }} ({{ $member->village_name }})
                            </p>
                            <p class="text-gray-700 font-medium mt-1">
                                મોબાઈલ નંબર: {!! $member->mobile ? '<img src="' . number_to_image($member->mobile) . '">' : '—' !!}
                            </p>
                        </a>
                    @endforeach
                @else
                    <p class="font-medium">
                        ⚠︎ આપેલી જાણકારી માટે કોઈ સભ્ય મળ્યો નથી.
                    </p>
                @endif
            @endif
        </div>
    </div>
@endsection
