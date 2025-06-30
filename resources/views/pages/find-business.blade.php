@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        વ્યવસાય શોધો
    </h2>
    <div class="max-w-full space-y-4">
        <!-- Search Form -->
        <form action="{{ route('pages.find-business') }}" method="GET" class="bg-white p-4 md:p-6 shadow rounded-xl space-y-3 max-w-2xl" id="business-search-form">
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                વ્યવસાય શોધવા માટે વ્યવસાય પસંદ કરો:
            </label>
            <div class="flex flex-col sm:flex-row gap-3 items-start">
                <div class="w-full">
                    <select id="business_select" name="business_select" class="select-option w-full flex-1 px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                        <option value="">--- પસંદ કરો ---</option>
                        @foreach ($uniqueBusinesses as $business)
                            <option value="{{ $business }}" {{ request('business_select') == $business ? 'selected' : '' }}>{{ $business }}</option>
                        @endforeach
                    </select>
                    <p id="business_error" class="error text-red-500 text-sm mt-1 hidden"></p>
                </div>
                <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer mt-1.5">
                    શોધો
                </button>
            </div>
        </form>
        <!-- Business Results -->
        @if ($members !== null)
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                @forelse ($members as $member)
                    <div class="bg-white shadow p-6 md:p-8 rounded-[12px]">
                        <div class="space-y-4 list-disc list-outside">
                            <div class="flex">
                                <span class="w-[100px] text-[#575228] font-semibold">નામ :-</span>
                                <p>{{ $member->full_name }}</p>
                            </div>
                            <div class="flex">
                                <span class="w-[100px] text-[#575228] font-semibold">મો. નંબર :-</span>
                                <img src="{{ number_to_image($member->mobile) ?? '—' }}" class="max-w-[170px]" />
                            </div>
                            <div class="flex">
                                <span class="w-[100px] text-[#575228] font-semibold">સરનામું :-</span>
                                <p>{{ $member->current_address }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-left text-red-500">
                        ⚠︎ યોગ્ય વ્યવસાય મળ્યા નથી.
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('business-search-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Reset errors
        const businessSelect = document.getElementById('business_select');
        const businessError = document.getElementById('business_error');
        businessSelect.classList.remove('border-red-500');
        businessError.classList.add('hidden');
        businessError.textContent = '';

        // Get value
        const businessSelectValue = businessSelect.value;

        // Validate business
        if (!businessSelectValue) {
            businessError.textContent = '⚠︎ વ્યવસાય પસંદ કરો.';
            businessError.classList.remove('hidden');
            businessSelect.classList.add('border-red-500');
        } else {
            event.target.submit();
        }
    });
</script>
@endpush
@endsection