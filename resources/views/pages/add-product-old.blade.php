@extends('layouts.app')

@section('content')
    <div class="w-full lg:w-[calc(100%_-_230px)]">
        <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
            ખેડૂત વિષયક 
        </h2>
        <div class="max-w-xl space-y-4">
            <form action="" method="GET" class="space-y-4 max-w-lg">
                <!-- Name Input -->
                <div>
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        નામ :
                    </label>
                    <input type="text" name="name" value="" placeholder=" તમારુ નામ દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                </div>
                <!-- Mobile Number Input -->
                <div>
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        મોબાઈલ નંબર :
                    </label>
                    <input type="text" name="number" value="" placeholder="તમારો મોબાઈલ નંબર દાખલ કરો " class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                </div>
                <!-- Address Input -->
                <div>
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        સરનામું :
                    </label>
                    <input type="text" name="address" value="" placeholder="તમારુ નામ સરનામું કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                </div>

                <!-- Product Selection Section -->
                <div id="product-container" class="space-y-4">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-0.5">
                        પાક નું નામ :
                    </label>
                    <span class="block mb-2 text-sm text-red-500">(નોંધ -: પાક પસંદ કરો લિસ્ટ માં ના આવે તો નવો પાક ઉમેરો બટન દબાવી પાક ઉમેરવો)</span>
                    <div class="product-row flex flex-col gap-3 items-end">
                        <div class="select-container w-full">
                            <select name="product[]" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" >
                                <option value="" disabled selected>--- પાક  પસંદ કરો ---</option>
                                <option value="product1">પાક 1</option>
                                <option value="product2">પાક 2</option>
                                <option value="product3">પાક 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <p id="error-msg" class="text-red-500 hidden">
                   ⚠︎ પાક પસંદ કરો અથવા તો નવો પાક ઉમેરો બટન પર દબાવી પાક ઉમેરો.
                </p>
                <div class="button-group flex gap-3">
                    <button type="button" onclick="addProductRow()" class="bg-[#8b8b33] text-white px-4 py-2 rounded-[12px] transition cursor-pointer flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </button>
                    <button type="button" onclick="addOtherProduct()" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer" >
                        નવો પાક ઉમેરો 
                    </button>
                </div>
                <!-- Submit Button -->
                <div class="flex">
                    <button type="submit" class="bg-[#575228] text-white px-5 py-2 rounded-[12px] transition cursor-pointer" >
                        સેવ કરો
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    @push('scripts')
    <script>
        function addProductRow() {
            const productRows = document.querySelectorAll('.product-row');
            const lastRow = productRows[productRows.length - 1];
            const select = lastRow.querySelector('select');
            const input = lastRow.querySelector('input');
            const errorMsg = document.getElementById('error-msg');

            if (select && !select.value) {
                errorMsg.textContent = '⚠︎ કૃપા કરીને પાક પસંદ કરો અથવા તો "નવો પાક ઉમેરો" બટન પર ક્લિક કરીને પાક ઉમેરો.';
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
                     <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        નવો પાક :
                    </label>
                    <select name="product[]" class="select-option w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]">
                        <option value="" disabled selected>--- પાક પસંદ કરો ---</option>
                        <option value="product1">પાક 1</option>
                        <option value="product2">પાક 2</option>
                        <option value="product3">પાક 3</option>
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
            const errorMsg = document.getElementById('error-msg');

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

            if (select) {
                const selectContainer = lastRow.querySelector('.select-container');
                selectContainer.innerHTML = `
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        નવો પાક :
                    </label>
                    <input type="text" name="product[]" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" placeholder="નવો પાક દાખલ કરો">
                `;
                return;
            }

            const newRow = document.createElement('div');
            newRow.className = 'product-row flex flex-col gap-3 items-end';
            newRow.innerHTML = `
                <div class="select-container w-full">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base mb-2">
                        નવો પાક :
                    </label>
                    <input type="text" name="product[]" placeholder="નવો પાક દાખલ કરો" class="w-full px-5 py-3 border border-gray-400 rounded-[12px] focus:outline-none focus:border-[#575228]" />
                </div>
            `;
            document.getElementById('product-container').appendChild(newRow);
        }
    </script>
@endpush

@endpush