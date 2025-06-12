@extends('layouts.app')

@section('content')
   <div class="w-full lg:w-[calc(100%_-_230px)]">
        <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
            મુખ્ય સભ્ય ની માહિતી સુધારો
        </h2>

        <div class="bg-white shadow p-8 rounded-[12px] mt-6">
            <form action="{{ route('family.profile.updateMain') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">
                        ફોટો અપડેટ કરો:
                    </label>
                    <input type="file" name="photo" id="photo" accept="image/*"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <!-- Preview -->
                    <div class="mt-4">
                        <img id="photoPreview" src="{{ $parent->photo_url ?? '' }}" alt="Photo Preview"
                            class="{{ $parent->photo_url ? '' : 'hidden' }} w-32 h-32 object-cover rounded-md border border-gray-200">
                    </div>
                    @error('photo')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Full Name --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">પૂરું નામ:</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $parent->full_name) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Mobile --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોબાઈલ નંબર:</label>
                    <input type="text" name="mobile" value="{{ old('mobile', $parent->mobile) }}" id="mobile"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('mobile')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Birth Date --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">જન્મ તારીખ:</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date', $parent->birth_date) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Village Name --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">ગામ નું નામ</label>
                    <select id="gam_select" name="gam_select"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($gamOptions as $opt)
                            <option value="{{ $opt }}"
                                {{ $opt == old('gam_select', $parent->village_name) ? 'selected' : '' }}>
                                {{ $opt }}
                            </option>
                        @endforeach
                        <option value="other" {{ old('gam_other') ? 'selected' : '' }}>Other</option>
                    </select>
                    <input type="text" id="gam_other" name="gam_other" value="{{ old('gam_other') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 hidden mt-2"
                        placeholder="Enter custom ગામ નું નામ">
                </div>

                {{-- Current Address --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">હાલના રહેઠાણનું સરનામું:</label>
                    <input type="text" name="current_address"
                        value="{{ old('current_address', $parent->current_address) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Village Address --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">ગામનું સરનામું:</label>
                    <input type="text" name="village_address"
                        value="{{ old('village_address', $parent->village_address) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Business Name --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">વ્યવસાય નું નામ:</label>
                    <input type="text" name="business_name" value="{{ old('business_name', $parent->business_name) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Business Address --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">વ્યવસાય સરનામું:</label>
                    <input type="text" name="business_address"
                        value="{{ old('business_address', $parent->business_address) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Education --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">અભ્યાસ:</label>
                    <input type="text" name="education" value="{{ old('education', $parent->education) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Blood Group --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">બ્લડ ગ્રુપ:</label>
                    <select name="blood_group" class="w-full border border-gray-300 rounded-md px-4 py-2">
                        @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'જાણ નથી'] as $bg)
                            <option value="{{ $bg }}"
                                {{ old('blood_group', $parent->blood_group) == $bg ? 'selected' : '' }}>
                                {{ $bg }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Gender --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">જાતિ:</label>
                    <div class="flex space-x-4">
                        @foreach (['પુરુષ', 'સ્ત્રી', 'અન્ય'] as $g)
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="{{ $g }}"
                                    {{ old('gender', $parent->gender) == $g ? 'checked' : '' }}
                                    class="h-4 w-4 text-blue-600">
                                <span class="ml-2 text-sm text-gray-700">{{ $g }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Marital Status --}}
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">વૈવાહિક દરજ્જો:</label>
                    <select name="marital_status" class="w-full border border-gray-300 rounded-md px-4 py-2">
                        @foreach (['પરિણીત', 'અપરિણીત', 'ગંગા સ્વરૂપ', 'વિધુર', 'છૂટાછેડા', 'સગાઈ'] as $ms)
                            <option value="{{ $ms }}"
                                {{ old('marital_status', $parent->marital_status) == $ms ? 'selected' : '' }}>
                                {{ $ms }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Mosal fields --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોસાળનું પુરુનામ:</label>
                        <input type="text" name="mosal_name" value="{{ old('mosal_name', $parent->mosal_name) }}"
                            class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોસાળની સાખ:</label>
                        <input type="text" name="mosal_branch"
                            value="{{ old('mosal_branch', $parent->mosal_branch) }}"
                            class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોસાળના ગામ:</label>
                        <input type="text" name="mosal_village"
                            value="{{ old('mosal_village', $parent->mosal_village) }}"
                            class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500">
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
        document.getElementById('gam_select').addEventListener('change', function() {
            document.getElementById('gam_other').classList.toggle(
                'hidden', this.value !== 'other'
            );
        });
        document.getElementById('photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = ev => {
                const img = document.getElementById('photoPreview');
                img.src = ev.target.result;
                img.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
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
