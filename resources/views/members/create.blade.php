<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>તળપદા કોળી પટેલ સમાજ</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Gujarati:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Noto Sans Gujarati', sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        }
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        .btn-primary {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #4338ca, #6d28d9);
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="w-full max-w-4xl form-container shadow-2xl rounded-2xl p-8 lg:p-12 mx-auto">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-2xl lg:text-3xl font-bold text-center text-indigo-600 mb-8">
            નવો સભ્ય ઉમેરો
        </h2>

        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Photo Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">ફોટો અપલોડ:</label>
                <div class="flex items-center space-x-4">
                    <input type="file" name="photo" id="photo" accept="image/*"
                        class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                    <img id="photoPreview" src="" alt="Photo Preview"
                        class="hidden w-20 h-20 object-cover rounded-lg border border-gray-300">
                </div>
                @error('photo')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Full Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">પૂરું નામ:</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Mobile Number -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">મોબાઈલ નંબર:</label>
                <input type="tel" name="mobile" value="{{ old('mobile') }}" id="mobile"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                @error('mobile')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">પાસવર્ડ:</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Birth Date -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">જન્મ તારીખ:</label>
                <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Current Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">હાલના રહેઠાણનું સરનામું:</label>
                <input type="text" name="current_address" value="{{ old('current_address') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Village Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">ગામ નું નામ:</label>
                <select id="gam_select" name="gam_select"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                    <option value="">--- પસંદ કરો ---</option>
                    @foreach ($gamOptions as $opt)
                        <option value="{{ $opt }}" {{ $opt == old('gam_select') ? 'selected' : '' }}>
                            {{ $opt }}</option>
                    @endforeach
                    <option value="other" {{ old('gam_other') ? 'selected' : '' }}>Other</option>
                </select>
                <input type="text" id="gam_other" name="gam_other" value="{{ old('gam_other') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm mt-2 {{ old('gam_other') ? '' : 'hidden' }}"
                    placeholder="Enter custom ગામ નું નામ">
            </div>

            <!-- Village Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">ગામનું સરનામું:</label>
                <input type="text" name="village_address" value="{{ old('village_address') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Business Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">વ્યવસાય નું નામ:</label>
                <input type="text" name="business_name" value="{{ old('business_name') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Business Address -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">વ્યવસાય સરનામું:</label>
                <input type="text" name="business_address" value="{{ old('business_address') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Education -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">અભ્યાસ:</label>
                <input type="text" name="education" value="{{ old('education') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Blood Group -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">બ્લડ ગ્રુપ:</label>
                <select name="blood_group"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                    @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'જાણ નથી'] as $bg)
                        <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>
                            {{ $bg }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">જાતિ:</label>
                <div class="flex space-x-6">
                    @foreach (['પુરુષ', 'સ્ત્રી', 'અન્ય'] as $gender)
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="{{ $gender }}"
                                {{ old('gender') == $gender ? 'checked' : '' }}
                                class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">{{ $gender }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Marital Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">વૈવાહિક દરજ્જો:</label>
                <select name="marital_status"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                    @foreach (['પરિણીત', 'અપરિણીત', 'ગંગા સ્વરૂપ', 'વિધુર', 'છૂટાછેડા', 'સગાઈ કરેલ છે.'] as $status)
                        <option value="{{ $status }}" {{ old('marital_status') == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Mosal Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">મોસાળનું પુરુનામ:</label>
                <input type="text" name="mosal_name" value="{{ old('mosal_name') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Mosal Branch -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">મોસાળની સાખ:</label>
                <input type="text" name="mosal_branch" value="{{ old('mosal_branch') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Mosal Village -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">મોસાળના ગામ નું નામ:</label>
                <input type="text" name="mosal_village" value="{{ old('mosal_village') }}"
                    class="input-field w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
            </div>

            <!-- Save Button -->
            <div class="mt-8">
                <button type="submit"
                    class="btn-primary w-full text-white py-3 rounded-lg font-semibold text-sm shadow-lg transition duration-200">
                    સાચવો
                </button>
            </div>
        </form>
    </div>

    <script>
        // Village Select Toggle
        document.getElementById('gam_select').addEventListener('change', function () {
            document.getElementById('gam_other').classList.toggle('hidden', this.value !== 'other');
        });

        // Photo Preview
        document.getElementById('photo').addEventListener('change', function (e) {
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

        // Mobile Number Validation
        document.getElementById('mobile').addEventListener('input', function (e) {
            this.value = this.value.replace(/\D/g, '');
        });

        document.getElementById('mobile').addEventListener('keypress', function (e) {
            if (!/\d/.test(e.key)) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>