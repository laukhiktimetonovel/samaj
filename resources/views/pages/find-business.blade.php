@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
        વ્યવસાય શોધો 
    </h2>
    <div class="max-w-full space-y-4">
        <!-- Search Form -->
        <form action="" method="GET" class="space-y-2 max-w-xl">
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                વ્યવસાય શોધવા માટે વ્યવસાય પસંદ કરો:
            </label>
            <div class="flex flex-col sm:flex-row gap-3">
                {{-- <input
                    type="text"
                    name="q"
                    value=""
                    placeholder="Enter name or mobile number"
                    class="flex-1 px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]"
                /> --}}
                <div class="w-full">
                    <select id="gam_select" name="gam_select" class="w-full flex-1 px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]">
                        <option value="">--- પસંદ કરો ---</option>
                        <option value="Test Village">Test Village</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" id="gam_other" name="gam_other" value="" class="w-full border rounded px-3 py-2 mt-2 hidden" placeholder="Enter custom ગામ નું નામ">
                </div>
                <button type="submit" class="bg-[#B3541E] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                    Search
                </button>

            </div>
        </form>       
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
            <div class="bg-white shadow p-4 rounded-[12px]">
                <ul class="mt-4 space-y-4 list-disc list-outside pl-6">
                    <li>
                        <p>
                            ગૌસ્વામી પ્રવિણગીરી આઈ.
                        </p>
                        <p class="text-[#B3541E] font-semibold"> મો:- 985282560</p>
                    </li>
                </ul>
            </div>

            <div class="bg-white shadow p-4 rounded-[12px]">
                
                <ul class="mt-4 space-y-4 list-disc list-outside pl-6">
                    <li>
                        <p>
                            ચૌધરી દિલીપભાઈ
                        </p>
                        <p class="text-[#B3541E] font-semibold"> મો:- 8965893595</p>
                    </li>
                </ul>
            </div>

            <div class="bg-white shadow p-4 rounded-[12px]">
                
                <ul class="mt-4 space-y-4 list-disc list-outside pl-6">
                    <li>
                        <p>
                            દેસાઈ મનીષાબેન
                        </p>
                        <p class="text-[#B3541E] font-semibold"> મો:- 6589245865</p>
                    </li>
                </ul>
            </div>  
        </div>
    </div>
</div>
@endsection
