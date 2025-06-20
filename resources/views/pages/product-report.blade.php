@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        પાક શોધો 
    </h2>
    <div class="max-w-full space-y-4">
        <!-- Search Form -->
        <form action="" method="GET" class="space-y-2 max-w-xl">
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                પાક શોધવા માટે પાક પસંદ કરો:
            </label>
            <div class="flex flex-col sm:flex-row gap-3">
                {{-- <input
                    type="text"
                    name="q"
                    value=""
                    placeholder="Enter name or mobile number"
                    class="flex-1 px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none  focus:border-[#575228]"
                /> --}}
                <div class="w-full">
                    <select id="gam_select" name="gam_select" class="select-option w-full flex-1 px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none  focus:border-[#575228]">
                        <option value="">--- પાક  પસંદ કરો ---</option>
                        <option value="Test Village">Test Village</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" id="gam_other" name="gam_other" value="" class="w-full border rounded px-3 py-2 mt-2 hidden" placeholder="Enter custom ગામ નું નામ">
                </div>
                <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                    Search
                </button>

            </div>
        </form>       
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
            <div class="bg-white shadow p-6 md:p-8 rounded-[12px]">
                <div class="space-y-4 list-disc list-outside">
                    
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold"> નામ :- </span><p>ગૌસ્વામી પ્રવિણગીરી આઈ</p>
                        </div>
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold">  મો. નંબર  :- </span><p > 985282560</p>
                        </div>
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold">   સરનામું :- </span><p> asa asas sas s as</p> 
                        </div>
                        <div class="flex">
                        <span class="w-[100px] text-[#575228] font-semibold">  પાક નું નામ :- </span>  <p>બટાકા </p>
                        </div>
                    </div>
            </div>

         <div class="bg-white shadow p-6 md:p-8 rounded-[12px]">
                <div class="space-y-4 list-disc list-outside">
                    
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold"> નામ :- </span><p>ગૌસ્વામી પ્રવિણગીરી આઈ</p>
                        </div>
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold">  મો. નંબર  :- </span><p > 985282560</p>
                        </div>
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold">   સરનામું :- </span><p> asa asas sas s as</p> 
                        </div>
                        <div class="flex">
                        <span class="w-[100px] text-[#575228] font-semibold">  પાક નું નામ :- </span>  <p>બટાકા </p>
                        </div>
                    </div>
            </div>
            
             <div class="bg-white shadow p-6 md:p-8 rounded-[12px]">
                <div class="space-y-4 list-disc list-outside">
                    
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold"> નામ :- </span><p>ગૌસ્વામી પ્રવિણગીરી આઈ</p>
                        </div>
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold">  મો. નંબર  :- </span><p > 985282560</p>
                        </div>
                        <div class="flex">
                         <span class="w-[100px] text-[#575228] font-semibold">   સરનામું :- </span><p> asa asas sas s as</p> 
                        </div>
                        <div class="flex">
                        <span class="w-[100px] text-[#575228] font-semibold">  પાક નું નામ :- </span>  <p>બટાકા </p>
                        </div>
                    </div>
            </div>


        </div>
    </div>
</div>
@endsection
