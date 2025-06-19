@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left">
        લગ્ન વિષયક
    </h2>
    <div class="max-w-full space-y-4">
        <!-- Search Form -->
        <form action="{{ route('pages.matrimony') }}" method="GET" class="space-y-2 max-w-[60%]">
            <input type="hidden" name="search" value="1">
            <div class="flex flex-col sm:flex-row gap-3 items-end">
                <!-- Age From -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        Age (From)
                    </label>
                    <select name="age_from" class="select-option w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]">
                        <option value="">-- Select Age --</option>
                        @for ($i = 18; $i <= 60; $i++)
                            <option value="{{ $i }}" {{ request('age_from') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Age To -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        Age (To)
                    </label>
                    <select name="age_to" class="select-option w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]">
                        <option value="">-- Select Age --</option>
                        @for ($i = 18; $i <= 60; $i++)
                            <option value="{{ $i }}" {{ request('age_to') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Gender -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        Select Gender
                    </label>
                    <select name="gender" class="select-option w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]">
                        <option value="">-- Select Gender --</option>
                        <option value="પુરુષ" {{ request('gender') == 'પુરુષ' ? 'selected' : '' }}>પુરુષ</option>
                        <option value="સ્ત્રી" {{ request('gender') == 'સ્ત્રી' ? 'selected' : '' }}> મહિલા</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="bg-[#B3541E] h-[55px] text-white px-6 py-3 rounded-[12px] transition hover:bg-[#944015]">
                        Search
                    </button>
                </div>
            </div>
        </form>

        <!-- Parents and Filtered Children (Show only after form submission) -->
        @if ($parents !== null)
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                @forelse ($parents as $parent)
                    <div class="bg-gradient-to-br from-pink-100 via-red-100 to-yellow-100 border border-pink-300 rounded-2xl shadow-xl p-5 w-full max-w-md mx-auto space-y-4">
                        <!-- Parent's Name -->
                        <h2 class="text-2xl font-extrabold text-pink-800 tracking-wide">
                            {{ $parent->full_name }}
                        </h2>

                        <!-- Filtered Children -->
                        @if ($parent->children->isNotEmpty())
                            <div class="ml-3 border-l-4 border-pink-400 pl-4 space-y-2 mt-2">
                                @foreach ($parent->children as $child)
                                    <p class="text-base text-gray-800 flex items-start">
                                        <span class="text-pink-600 mr-2">➤</span> {{ $child->full_name }}
                                    </p>
                                @endforeach
                            </div>
                        @endif

                        <!-- Contact Info (Parent's) -->
                        <div class="pt-3 border-t border-pink-300 text-sm text-gray-800 grid grid-cols-1 sm:grid-cols-[1fr_2fr] gap-4">
                            <!-- Mobile Number -->
                            <div class="flex items-center space-x-2">
                                <span class="text-pink-600 text-lg">📞</span>
                                <span class="font-medium text-[16px]">{{ $parent->mobile ?? 'N/A' }}</span>
                            </div>

                            <!-- Address -->
                            <div class="flex items-start space-x-2">
                                <span class="text-yellow-600 text-lg">📍</span>
                                <span class="mt-1 text-[16px]">{{ $parent->current_address ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-left text-gray-600">
                        ⚠︎ યોગ્ય સભ્યો મળ્યા નથી.
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</div>
@endsection