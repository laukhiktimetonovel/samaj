<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>તળપદા કોળી પટેલ સમાજ</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="flex flex-col md:flex-row">

    <div class="w-full lg:w-[calc(100%_-_230px)]">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left">
            સભ્ય ની માહિતી સુધારો
        </h2>

        <div class="bg-white shadow rounded-[12px] mt-6 p-8">
            <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Add all fields as per your original design -->

                <!-- મુખ્ય સભ્ય સાથે સંબંધ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">
                        ફોટો અપલોડ:
                    </label>
                    <input type="file" name="photo" id="photo" accept="image/*"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <!-- Preview -->
                    <div class="mt-4">
                        <img id="photoPreview" src="" alt="Photo Preview"
                            class="hidden w-32 h-32 object-cover rounded-md border border-gray-200">
                    </div>
                    @error('photo')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror

                </div>
                <!-- પૂરું નામ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">પૂરું નામ:</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- મોબાઈલ નંબર -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોબાઈલ નંબર:</label>
                    <input type="tel" name="mobile" value="{{ old('mobile') }}" id="mobile"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                    @error('mobile')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- જન્મ તારીખ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">જન્મ તારીખ:</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- હાલના રહેઠાણનું સરનામું -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">હાલના રહેઠાણનું સરનામું:</label>
                    <input type="text" name="current_address" value="{{ old('current_address') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <div class="mb-5">
                    <label class="block font-medium text-[#B3541E]">ગામ નું નામ</label>
                    <select id="gam_select" name="gam_select" class="select-option w-full border rounded px-3 py-2">
                        <option value="">--- પસંદ કરો ---</option>
                        @foreach ($gamOptions as $opt)
                            <option value="{{ $opt }}" {{ $opt == old('gam_select') ? 'selected' : '' }}>
                                {{ $opt }}</option>
                        @endforeach
                        <option value="other" {{old('gam_other') ? 'selected' : ''}}>Other</option>
                    </select>
                    <input type="text" id="gam_other" name="gam_other" value="{{ old('gam_other') }}"
                        class="w-full border rounded px-3 py-2 mt-2 {{ old('gam_other') ? '' : 'hidden' }}"
                        placeholder="Enter custom ગામ નું નામ">
                </div>

                <!-- ગામનું સરનામું -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">ગામનું સરનામું:</label>
                    <input type="text" name="village_address" value="{{ old('village_address') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- વ્યવસાય -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">વ્યવસાય નું નામ:</label>
                    <input type="text" name="business_name" value="{{ old('business_name') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- વ્યવસાય સરનામું -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">વ્યવસાય સરનામું:</label>
                    <input type="text" name="business_address" value="{{ old('business_address') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- અભ્યાસ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">અભ્યાસ:</label>
                    <input type="text" name="education" value="{{ old('education') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- બ્લડ ગ્રુપ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">બ્લડ ગ્રુપ:</label>
                    <select name="blood_group" class="select-option w-full border border-gray-300 rounded-md px-4 py-2">
                        @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'જાણ નથી'] as $bg)
                            <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>
                                {{ $bg }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- જાતિ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">જાતિ:</label>
                    <div class="flex space-x-4">
                        @foreach (['પુરુષ', 'સ્ત્રી', 'અન્ય'] as $gender)
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="{{ $gender }}"
                                    {{ old('gender') == $gender ? 'checked' : '' }} class="h-4 w-4 text-blue-600">
                                <span class="ml-2 text-sm text-gray-700">{{ $gender }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- વૈવાહિક દરજ્જો -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">વૈવાહિક દરજ્જો:</label>
                    <select name="marital_status" class="select-option w-full border border-gray-300 rounded-md px-4 py-2">
                        @foreach (['પરિણીત', 'અપરિણીત', 'ગંગા સ્વરૂપ', 'વિધુર', 'છૂટાછેડા', 'સગાઈ કરેલ છે.'] as $status)
                            <option value="{{ $status }}"
                                {{ old('marital_status') == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- મોસાળ નું નામ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોસાળનું પુરુનામ:</label>
                    <input type="text" name="mosal_name" value="{{ old('mosal_name') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- મોસાળ ની સાખ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોસાળની સાખ:</label>
                    <input type="text" name="mosal_branch" value="{{ old('mosal_branch') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>

                <!-- મોસાળ નું ગામ -->
                <div class="mb-5">
                    <label class="block text-[16px] font-medium text-[#B3541E] mb-1">મોસાળના ગામ નું નામ:</label>
                    <input type="text" name="mosal_village" value="{{ old('mosal_village') }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>


                <!-- Save Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition duration-200">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
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
</body>

</html>
