@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        લગ્ન વિષયક
    </h2>
    <div class="max-w-full space-y-4">
        <!-- Search Form -->
        <form action="{{ route('pages.matrimony') }}" method="GET" class="bg-white p-4 md:p-6 shadow rounded-xl space-y-3 max-w-4xl" id="matrimony-form">
            <input type="hidden" name="search" value="1">
            <div class="flex flex-col sm:flex-row gap-4 items-start">
                <!-- Age From -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        ઉંમર (થી)
                    </label>
                    <select name="age_from" id="age_from" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                        <option value="">-- ઉંમર પસંદ કરો --</option>
                        @for ($i = 18; $i <= 60; $i++)
                            <option value="{{ $i }}" {{ request('age_from') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <p class="error text-red-500 text-sm mt-1.5 hidden" id="age_from_error"></p>
                </div>

                <!-- Age To -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        ઉંમર (સુધી)
                    </label>
                    <select name="age_to" id="age_to" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                        <option value="">-- ઉંમર પસંદ કરો --</option>
                        @for ($i = 18; $i <= 60; $i++)
                            <option value="{{ $i }}" {{ request('age_to') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <p class="error text-red-500 text-sm mt-1.5 hidden" id="age_to_error"></p>
                </div>

                <!-- Gender -->
                <div class="w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        જાતિ
                    </label>
                    <select id="gender" name="gender" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                       <option value="">-- લિંગ પસંદ કરો --</option>
                        <option value="પુરુષ" {{ request('gender') == 'પુરુષ' ? 'selected' : '' }}>પુરુષ</option>
                        <option value="સ્ત્રી" {{ request('gender') == 'સ્ત્રી' ? 'selected' : '' }}> મહિલા</option>
                    </select>
                    <p class="error text-red-500 text-sm mt-1.5 hidden" id="gender_error"></p>
                </div>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="bg-[#575228] text-white px-6 py-3 rounded-[12px] transition cursor-pointer mt-2">
                શોધો
            </button>
        </form>
        <!-- Parents and Filtered Children (Show only after form submission) -->
        @if ($parents !== null)
            <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                @forelse ($parents as $parent)
                    <div class="bg-gradient-to-br from-pink-100 via-red-100 to-yellow-100 border border-pink-300 rounded-2xl shadow-xl p-3 sm:p-5 w-full space-y-4 flex flex-col h-full">
                        <!-- Parent's Name -->
                        <h2 class="text-lg sm:text-2xl font-extrabold text-pink-800 tracking-wide">
                            {{ $parent->full_name }}
                        </h2>

                        <!-- Filtered Children -->
                        @if ($parent->children->isNotEmpty())
                            <div class="space-y-2 mt-2 flex-1">
                                @foreach ($parent->children as $child)
                                <div class="flex items-center gap-2 border-pink-400 pl-2.5 sm:pl-4 border-l-2 sm:border-l-4">
                                    <p class="text-sm sm:text-base text-gray-800 flex items-start">
                                        <span class="text-pink-600 mr-2">➤</span> {{ $child->full_name }}
                                    </p>
                                    <p class="text-sm sm:text-base text-gray-800 flex items-start">
                                        <span class="text-pink-600 mr-2">➤</span> ઉંમર - {{ $child->age }} વર્ષ
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Contact Info (Parent's) -->
                        <div class="pt-3 border-t border-pink-300 text-sm text-gray-800 flex justify-between gap-4">
                            <!-- Mobile Number -->
                            <div class="flex items-center space-x-2">
                                <span class="text-pink-600 text-lg">📞</span>
                                <span class="font-medium text-[16px]">{{ $parent->mobile ?? '—' }}</span>
                            </div>
                            <!-- Address -->
                            <div class="flex items-start space-x-2">
                                <span class="text-yellow-600 text-lg">📍</span>
                                <span class="mt-1 text-[16px]">{{ $parent->current_address ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col-span-full text-left text-red-500">
                    ⚠︎ યોગ્ય સભ્યો મળ્યા નથી.
                </div>
                @endforelse
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    console.log("called");
    document.getElementById('matrimony-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        console.log("called");
        
        // Reset error messages and styles
        const fields = ['age_from', 'age_to', 'gender'];
        fields.forEach(field => {
            const input = document.getElementById(field);
            const error = document.getElementById(field + '_error');
            input.classList.remove('border-red-500');
            error.classList.add('hidden');
            error.textContent = '';
        });

        // Get field values
        const ageFrom = document.getElementById('age_from').value;
        const ageTo = document.getElementById('age_to').value;
        const gender = document.getElementById('gender').value;

        let hasError = false;

        // Validate age_from
        if (!ageFrom) {
            showError('age_from', 'ઉંમર (થી) ફરજિયાત છે.');
            hasError = true;
        } else if (isNaN(ageFrom) || ageFrom < 18 || ageFrom > 60) {
            showError('age_from', 'ઉંમર (થી) 18 થી 60 ની વચ્ચે હોવી જોઈએ.');
            hasError = true;
        }

        // Validate age_to
        if (!ageTo) {
            showError('age_to', 'ઉંમર (સુધી) ફરજિયાત છે.');
            hasError = true;
        } else if (isNaN(ageTo) || ageTo < 18 || ageTo > 60) {
            showError('age_to', 'ઉંમર (સુધી) 18 થી 60 ની વચ્ચે હોવી જોઈએ.');
            hasError = true;
        } else if (ageFrom && ageTo && parseInt(ageTo) < parseInt(ageFrom)) {
            showError('age_to', 'ઉંમર (સુધી) ઉંમર (થી) કરતાં મોટી કે બરાબર હોવી જોઈએ.');
            hasError = true;
        }

        // Validate gender
        if (!gender) {
            showError('gender', 'જાતિ ફરજિયાત છે.');
            hasError = true;
        } else if (gender !== 'પુરુષ' && gender !== 'સ્ત્રી') {
            showError('gender', 'જાતિ ફક્ત પુરુષ કે સ્ત્રી હોવી જોઈએ.');
            hasError = true;
        }

        // Submit form if no errors
        if (!hasError) {
            this.submit();
        }
    });

    function showError(field, message) {
        const input = document.getElementById(field);
        const error = document.getElementById(field + '_error');
        input.classList.add('border-red-500');
        error.textContent = message;
        error.classList.remove('hidden');
    }
</script>
@endpush