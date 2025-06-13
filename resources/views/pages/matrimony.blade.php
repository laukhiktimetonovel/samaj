@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
        લગ્ન વિષયક
    </h2>
    <div class="max-w-full space-y-4">
        <!-- Search Form -->
        <form action="" method="GET" class="space-y-2 max-w-[60%]">
          
            <div class="flex flex-col sm:flex-row gap-3 items-end">

                <!-- Age From -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base">
                        Age (From)
                    </label>
                    <select name="age_from" class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]">
                        @for ($i = 18; $i <= 60; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <!-- Age To -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base">
                        Age (To)
                    </label>
                    <select name="age_to" class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]">
                        @for ($i = 18; $i <= 60; $i++) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                </div>

                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base">
                        Select Gender
                    </label>
                    <select name="age_to" class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]">
                        <option value="">-- Select Gender --</option>
            <option value="male">Male (પુરુષ)</option>
            <option value="female">Female (મહિલા)</option>
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
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
          <div class="bg-gradient-to-br from-pink-100 via-red-100 to-yellow-100 border border-pink-300 rounded-2xl shadow-xl p-5 w-full max-w-md mx-auto space-y-4">
    
    <!-- Name -->
    <h2 class="text-2xl font-extrabold text-pink-800 tracking-wide">
        પટેલ હિતેષભાઈ રમણભાઈ
    </h2>

   

    <!-- Children -->
    <div class="ml-3 border-l-4 border-pink-400 pl-4 space-y-2 mt-2">
        <p class="text-base text-gray-800 flex items-start">
            <span class="text-pink-600 mr-2">➤</span> જયદીપ પટેલ
        </p>
        <p class="text-base text-gray-800 flex items-start">
            <span class="text-pink-600 mr-2">➤</span> શિવાની પટેલ
        </p>
    </div>

    <!-- Contact Info -->
 <div class="pt-3 border-t border-pink-300 text-sm text-gray-800 grid grid-cols-1 sm:grid-cols-[1fr_2fr] gap-4">
    <!-- Mobile Number (narrow column) -->
    <div class="flex items-center space-x-2">
        <span class="text-pink-600 text-lg">📞</span>
        <span class="font-medium text-[16px]">૯૮૨૫૧૨૧૮૦૮</span>
    </div>

    <!-- Address (wider column) -->
    <div class="flex items-start space-x-2">
        <span class="text-yellow-600 text-lg">📍</span>
        <span class="mt-1 text-[16px]">
            વડીલનગર, રાજકોટ
            ગુજરાત - ૩૬૦૦૦૧
        </span>
    </div>
</div>
</div>
        </div>
    </div>
</div>
@endsection
