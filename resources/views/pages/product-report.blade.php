@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        પાક શોધો
    </h2>
    <div class="max-w-full space-y-4">
        <!-- Search Form -->
        <form action="{{ route('pages.product-report') }}" method="GET" class="space-y-2 max-w-xl" id="product-search-form">
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                પાક શોધવા માટે પાક પસંદ કરો:
            </label>
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="w-full">
                    <select id="product_select" name="product_select" class="select-option w-full flex-1 px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                        <option value="">--- પાક પસંદ કરો ---</option>
                        @foreach ($uniqueProducts as $product)
                            <option value="{{ $product }}" {{ request('product_select') == $product ? 'selected' : '' }}>{{ $product }}</option>
                        @endforeach
                    </select>
                    <p id="product_error" class="error text-red-500 text-sm mt-1 hidden"></p>
                </div>
                <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                    શોધો
                </button>
            </div>
        </form>
        <!-- Farmer Results -->
        @if ($farmers !== null)
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                @forelse ($farmers as $farmer)
                    <div class="bg-white shadow p-6 md:p-8 rounded-[12px]">
                        <div class="space-y-4 list-disc list-outside">
                            <div class="flex">
                                <span class="w-[100px] text-[#575228] font-semibold">નામ :-</span>
                                <p>{{ $farmer->name }}</p>
                            </div>
                            <div class="flex">
                                <span class="w-[100px] text-[#575228] font-semibold">મો. નંબર :-</span>
                                <p>{{ $farmer->mobile }}</p>
                            </div>
                            <div class="flex">
                                <span class="w-[100px] text-[#575228] font-semibold">સરનામું :-</span>
                                <p>{{ $farmer->address }}</p>
                            </div>
                            <div class="flex">
                                <span class="w-[100px] text-[#575228] font-semibold">પાક નું નામ :-</span>
                                <p>{{ implode(', ', $farmer->products) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-left text-gray-600">
                        ⚠︎ યોગ્ય ખેડૂતો મળ્યા નથી.
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('product-search-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Reset errors
        const productSelect = document.getElementById('product_select');
        const productError = document.getElementById('product_error');
        productSelect.classList.remove('border-red-500');
        productError.classList.add('hidden');
        productError.textContent = '';

        // Get value
        const productSelectValue = productSelect.value;

        // Validate product
        if (!productSelectValue) {
            productError.textContent = '⚠︎ પાક પસંદ કરો.';
            productError.classList.remove('hidden');
            productSelect.classList.add('border-red-500');
        } else {
            event.target.submit();
        }
    });
</script>
@endpush
@endsection