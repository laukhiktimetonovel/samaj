@extends('layouts.app')

@section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        ખેડૂત વિષયક
    </h2>
    <div class="max-w-xl space-y-4">
        @if (session('success_in'))
            <div class="text-green-500 text-sm">{{ session('success_in') }}</div>
        @endif
        @if (session('error_in'))
            <div class="text-red-500 text-sm">{{ session('error_in') }}</div>
        @endif

        @if (auth()->check() && $farmer)
            <!-- Display Farmer Details -->
            <div id="farmer-details" class="{{ request()->query('edit') ? 'hidden' : '' }}">
                <div class="bg-white border border-gray-300 rounded-2xl shadow-md p-5 space-y-4">
                    <h3 class="text-lg font-semibold text-[#575228]">ખેડૂતની માહિતી</h3>
                    <p><strong>નામ:</strong> {{ $farmer->name }}</p>
                    <p><strong>મોબાઈલ નંબર:</strong> {{ $farmer->mobile }}</p>
                    <p><strong>સરનામું:</strong> {{ $farmer->address }}</p>
                    <p><strong>પાક:</strong> {{ implode(', ', $farmer->products) }}</p>
                    <button onclick="showEditForm()" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition hover:bg-[#3e3a1c]">
                        સંપાદન કરો
                    </button>
                </div>
            </div>

            <!-- Edit Form -->
            <div id="farmer-edit" class="{{ request()->query('edit') ? '' : 'hidden' }}">
                <form action="{{ route('pages.farmer.store') }}" method="POST" class="space-y-4 max-w-lg" id="farmer-form">
                    @csrf
                    <!-- Name Input -->
                    <div>
                        <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                            નામ :
                        </label>
                        <input type="text" name="name" value="{{ $farmer->name }}" placeholder="તમારું નામ દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                        <p class="error text-red-500 text-sm mt-1 hidden" id="name_error"></p>
                    </div>
                    <!-- Mobile Number Input -->
                    <div>
                        <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                            મોબાઈલ નંબર :
                        </label>
                        <input type="text" name="number" value="{{ $farmer->mobile }}" placeholder="તમારો મોબાઈલ નંબર દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                        <p class="error text-red-500 text-sm mt-1 hidden" id="number_error"></p>
                    </div>
                    <!-- Address Input -->
                    <div>
                        <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                            સરનામું :
                        </label>
                        <input type="text" name="address" value="{{ $farmer->address }}" placeholder="તમારું સરનામું દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                        <p class="error text-red-500 text-sm mt-1 hidden" id="address_error"></p>
                    </div>

                    <!-- Product Selection Section -->
                    <div id="product-container" class="space-y-4">
                        <label class="block text-gray-700 font-semibold text-sm md:text-base mb-0.5">
                            પાક નું નામ :
                        </label>
                        <span class="block mb-2 text-sm text-red-500">(નોંધ -: પાક પસંદ કરો, લિસ્ટમાં ન હોય તો નવો પાક ઉમેરો બટન દબાવો)</span>
                        @foreach ($farmer->products as $index => $product)
                            <div class="product-row flex flex-col gap-3 items-end">
                                <div class="select-container w-full">
                                    @if (in_array($product, $uniqueProducts->toArray()))
                                        <select name="product[]" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                                            <option value="" disabled>--- પાક પસંદ કરો ---</option>
                                            @foreach ($uniqueProducts as $uniqueProduct)
                                                <option value="{{ $uniqueProduct }}" {{ $product == $uniqueProduct ? 'selected' : '' }}>{{ $uniqueProduct }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" name="product[]" value="{{ $product }}" placeholder="નવો પાક દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <p id="product_error" class="error text-red-500 text-sm mt-1 hidden space-y-4"></p>

                    <!-- Button Group -->
                    <div class="button-group flex gap-3">
                        <button type="button" onclick="addProductRow()" class="bg-[#8b8b33] text-white px-4 py-2 rounded-[12px] transition cursor-pointer flex items-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                        <button type="button" onclick="addOtherProduct()" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                            નવો પાક ઉમેરો
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-3">
                        <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                            અપડેટ કરો
                        </button>
                        <button type="button" onclick="showDetails()" class="bg-gray-500 text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                            રદ કરો
                        </button>
                    </div>
                </form>
            </div>
        @else
            <!-- Create Form -->
            <form action="{{ route('pages.farmer.store') }}" method="POST" class="space-y-4 max-w-lg" id="farmer-form">
                @csrf
                <!-- Name Input -->
                <div>
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        નામ :
                    </label>
                    <input type="text" name="name" value="{{ old('name',auth()->user()->full_name) }}" placeholder="તમારું નામ દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                    <p class="error text-red-500 text-sm mt-1 hidden" id="name_error"></p>
                </div>
                <!-- Mobile Number Input -->
                <div>
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        મોબાઈલ નંબર :
                    </label>
                    <input type="text" name="number" value="{{ old('number',auth()->user()->mobile) }}" placeholder="તમારો મોબાઈલ નંબર દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                    <p class="error text-red-500 text-sm mt-1 hidden" id="number_error"></p>
                </div>
                <!-- Address Input -->
                <div>
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        સરનામું :
                    </label>
                    <input type="text" name="address" value="{{ old('address',auth()->user()->current_address) }}" placeholder="તમારું સરનામું દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                    <p class="error text-red-500 text-sm mt-1 hidden" id="address_error"></p>
                </div>

                <!-- Product Selection Section -->
                <div id="product-container" class="space-y-4">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-0.5">
                        પાક નું નામ :
                    </label>
                    <span class="block mb-2 text-sm text-red-500">(નોંધ -: પાક પસંદ કરો, લિસ્ટમાં ન હોય તો નવો પાક ઉમેરો બટન દબાવો)</span>
                    <div class="product-row flex flex-col gap-3 items-end">
                        <div class="select-container w-full">
                            <select name="product[]" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                                <option value="" disabled selected>--- પાક પસંદ કરો ---</option>
                                @foreach ($uniqueProducts as $product)
                                    <option value="{{ $product }}">{{ $product }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <p id="product_error" class="error text-red-500 text-sm mt-1 hidden"></p>

                <!-- Button Group -->
                <div class="button-group flex gap-3">
                    <button type="button" onclick="addProductRow()" class="bg-[#8b8b33] text-white px-4 py-2 rounded-[12px] transition cursor-pointer flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </button>
                    <button type="button" onclick="addOtherProduct()" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                        નવો પાક ઉમેરો
                    </button>
                </div>

                <!-- Submit Button -->
                <div class="flex">
                    <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer">
                        સેવ કરો
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function addProductRow() {
        const productRows = document.querySelectorAll('.product-row');
        const lastRow = productRows[productRows.length - 1];
        const select = lastRow.querySelector('select');
        const input = lastRow.querySelector('input');
        const errorMsg = document.getElementById('product_error');

        if (select && !select.value) {
            errorMsg.textContent = '⚠︎ કૃપા કરીને પાક પસંદ કરો અથવા "નવો પાક ઉમેરો" બટન દબાવો.';
            errorMsg.classList.remove('hidden');
            select.classList.add('border-red-500');
            return;
        } else if (input && !input.value.trim()) {
            errorMsg.textContent = '⚠︎ કૃપા કરીને પાકનું નામ દાખલ કરો.';
            errorMsg.classList.remove('hidden');
            input.classList.add('border-red-500');
            return;
        } else {
            errorMsg.classList.add('hidden');
            if (select) select.classList.remove('border-red-500');
            if (input) input.classList.remove('border-red-500');
        }

        const newRow = document.createElement('div');
        newRow.className = 'product-row flex flex-col gap-3 items-end';
        newRow.innerHTML = `
            <div class="select-container w-full">
                <select name="product[]" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                    <option value="" disabled selected>--- પાક પસંદ કરો ---</option>
                    @foreach ($uniqueProducts as $product)
                        <option value="{{ $product }}">{{ $product }}</option>
                    @endforeach
                </select>
            </div>
        `;
        document.getElementById('product-container').appendChild(newRow);
    }

    function addOtherProduct() {
        const productRows = document.querySelectorAll('.product-row');
        const lastRow = productRows[productRows.length - 1];
        const select = lastRow.querySelector('select');
        const input = lastRow.querySelector('input');
        const errorMsg = document.getElementById('product_error');

        if (input && !input.value.trim()) {
            errorMsg.textContent = '⚠︎ કૃપા કરીને પાકનું નામ દાખલ કરો.';
            errorMsg.classList.remove('hidden');
            input.classList.add('border-red-500');
            return;
        }

        if (input) {
            input.classList.remove('border-red-500');
            errorMsg.classList.add('hidden');
        }

        if (select && !select.value) {
            const selectContainer = lastRow.querySelector('.select-container');
            selectContainer.innerHTML = `
                <input type="text" name="product[]" placeholder="નવો પાક દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
            `;
            return;
        }

        const newRow = document.createElement('div');
        newRow.className = 'product-row flex flex-col gap-3 items-end';
        newRow.innerHTML = `
            <div class="select-container w-full">
                <input type="text" name="product[]" placeholder="નવો પાક દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
            </div>
        `;
        document.getElementById('product-container').appendChild(newRow);
    }

    document.getElementById('farmer-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Reset errors
        const fields = ['name', 'number', 'address'];
        fields.forEach(field => {
            const input = document.querySelector(`[name="${field}"]`);
            const error = document.getElementById(`${field}_error`);
            input.classList.remove('border-red-500');
            error.classList.add('hidden');
            error.textContent = '';
        });
        const productError = document.getElementById('product_error');
        productError.classList.add('hidden');
        productError.textContent = '';
        document.querySelectorAll('.product-row select, .product-row input').forEach(el => el.classList.remove('border-red-500'));

        // Get values
        const name = document.querySelector('[name="name"]').value.trim();
        const number = document.querySelector('[name="number"]').value.trim();
        const address = document.querySelector('[name="address"]').value.trim();
        const products = Array.from(document.querySelectorAll('[name="product[]"]'))
            .map(el => el.value.trim())
            .filter(val => val);

        let hasError = false;

        // Validate name
        if (!name) {
            showError('name', 'નામ ફરજિયાત છે.');
            hasError = true;
        }

        // Validate mobile
        if (!number) {
            showError('number', 'મોબાઈલ નંબર ફરજિયાત છે.');
            hasError = true;
        } else if (!/^\d{10}$/.test(number)) {
            showError('number', 'મોબાઈલ નંબર 10 આંકડાનો હોવો જોઈએ.');
            hasError = true;
        }

        // Validate address
        if (!address) {
            showError('address', 'સરનામું ફરજિયાત છે.');
            hasError = true;
        }

        // Validate products
        if (products.length === 0) {
            productError.textContent = '⚠︎ ઓછામાં ઓછો એક પાક પસંદ કરો.';
            productError.classList.remove('hidden');
            const firstProduct = document.querySelector('[name="product[]"]');
            firstProduct.classList.add('border-red-500');
            hasError = true;
        }

        // Submit if no errors
        if (!hasError) {
            event.target.submit();
        }
    });

    function showError(field, message) {
        const input = document.querySelector(`[name="${field}"]`);
        const error = document.getElementById(`${field}_error`);
        input.classList.add('border-red-500');
        error.textContent = message;
        error.classList.remove('hidden');
    }

    function showEditForm() {
        document.getElementById('farmer-details').classList.add('hidden');
        document.getElementById('farmer-edit').classList.remove('hidden');
    }

    function showDetails() {
        document.getElementById('farmer-edit').classList.add('hidden');
        document.getElementById('farmer-details').classList.remove('hidden');
    }
</script>
@endpush
@endsection