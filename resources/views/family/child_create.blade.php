@extends('layouts.app')

@section('content')
   <div class="w-full lg:w-[calc(100%_-_230px)]">
        <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
            ઘરના સભ્ય ઉમેરો
        </h2>

        <div class="bg-white shadow p-6 md:p-8 rounded-[12px] mt-6 p-8">
            <form action="{{ route('family.child.store') }}" method="POST">
                @csrf

                {{-- Relation --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">
                        મુખ્ય સભ્ય સાથે સંબંધ:
                    </label>
                    <select name="relation"
                        class="select-option w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">--- Select Relation ---</option>
                        @foreach (['પિતા', 'માતા', 'પત્ની', 'પુત્ર', 'પુત્રી', 'ભાઈ', 'બહેન'] as $r)
                            <option value="{{ $r }}" {{ old('relation') == $r ? 'selected' : '' }}>
                                {{ $r }}
                            </option>
                        @endforeach
                    </select>
                    @error('relation')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Full Name --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">પૂરું નામ:</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}"
                        class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('full_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Mobile --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">મોબાઈલ નંબર:</label>
                    <input type="text" name="mobile" value="{{ old('mobile') }}" id="mobile"
                        class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('mobile')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Birth Date --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">જન્મ તારીખ:</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                        class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Business --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">વ્યવસાય નું નામ:</label>
                    <input type="text" name="business_name" value="{{ old('business_name') }}"
                        class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">વ્યવસાય સરનામું:</label>
                    <input type="text" name="business_address" value="{{ old('business_address') }}"
                        class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Education --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">અભ્યાસ:</label>
                    <input type="text" name="education" value="{{ old('education') }}"
                        class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Blood Group --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">બ્લડ ગ્રુપ:</label>
                    <select name="blood_group"
                        class="select-option w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'જાણ નથી'] as $bg)
                            <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>
                                {{ $bg }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Gender --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">જાતિ:</label>
                    <div class="flex space-x-4">
                        @foreach (['પુરુષ', 'સ્ત્રી', 'અન્ય'] as $g)
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="{{ $g }}"
                                    {{ old('gender') == $g ? 'checked' : '' }} class="h-4 w-4 text-blue-600">
                                <span class="ml-2 text-sm text-gray-700">{{ $g }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Marital Status --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#575228] mb-1">વૈવાહિક દરજ્જો:</label>
                    <select name="marital_status"
                        class="select-option w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach (['પરિણીત', 'અપરિણીત', 'ગંગા સ્વરૂપ', 'વિધુર', 'છૂટાછેડા', 'સગાઈ'] as $ms)
                            <option value="{{ $ms }}" {{ old('marital_status') == $ms ? 'selected' : '' }}>
                                {{ $ms }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Mosal fields --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[16px] font-medium text-[#575228] mb-1">મોસાળનું પુરુનામ:</label>
                        <input type="text" name="mosal_name" value="{{ old('mosal_name') }}"
                            class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[16px] font-medium text-[#575228] mb-1">મોસાળની સાખ:</label>
                        <input type="text" name="mosal_branch" value="{{ old('mosal_branch') }}"
                            class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[16px] font-medium text-[#575228] mb-1">મોસાળના ગામ:</label>
                        <input type="text" name="mosal_village" value="{{ old('mosal_village') }}"
                            class="w-full border border-gray-400 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // New script for mobile number validation
        document.getElementById('mobile').addEventListener('input', function(e) {
            // Remove any non-numeric characters
            this.value = this.value.replace(/\D/g, '');
        });

        document.getElementById('mobile').addEventListener('keypress', function(e) {
            // Prevent non-numeric keys from being typed
            if (!/\d/.test(e.key)) {
                e.preventDefault();
            }
        });
    </script>
@endpush
