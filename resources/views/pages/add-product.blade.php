@extends('layouts.app')

@section('content')
    <div class="w-full lg:w-[calc(100%_-_230px)]">
        <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
            ખેડૂત વિષયક 
        </h2>
        <div class="max-w-xl space-y-4">
       <form action="" method="GET" class="space-y-4 max-w-lg">
        <!-- Name Input -->
        <div>
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                નામ :
            </label>
            <input
                type="text"
                name="name"
                value=""
                placeholder=" તમારુ નામ દાખલ કરો"
                class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]"
            />
        </div>

        <!-- Mobile Number Input -->
        <div>
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                મોબાઈલ નંબર :
            </label>
            <input
                type="text"
                name="number"
                value=""
                placeholder="તમારો મોબાઈલ નંબર દાખલ કરો "
                class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]"
            />
        </div>

        <!-- Address Input -->
        <div>
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                સરનામું :
            </label>
            <input
                type="text"
                name="address"
                value=""
                placeholder="તમારુ નામ સરનામું કરો"
                class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]"
            />
        </div>

        <!-- Product Selection Section -->
        <div id="product-container" class="space-y-4">
            <label class="block text-gray-700 font-semibold text-sm md:text-base">
                    પાક નું નામ : (નોંધ -: --- પાક  પસંદ કરો ---લિસ્ટ માં ના આવે તો નવો પાક બટન દબાવી પાક ઉમેરવો)
                </label>
            <div class="product-row flex flex-col sm:flex-row gap-3 items-end">
                <div class="flex-1 select-container">
                    
                    <select
                        name="product[]"
                        class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]"
                    >
                        <option value="" disabled selected>--- પાક  પસંદ કરો ---</option>
                        <option value="product1">Product 1</option>
                        <option value="product2">Product 2</option>
                        <option value="product3">Product 3</option>
                    </select>
                </div>
                <div class="button-group flex gap-3">
                    <button
                        type="button"
                        onclick="addProductRow()"
                        class="bg-[#8b8b33] text-white px-4 py-2 rounded-[12px] transition cursor-pointer flex items-center"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </button>
                    <button
                        type="button"
                        onclick="addOtherProduct(this)"
                        class="bg-[#B3541E] text-white px-5 py-2 rounded-[12px] transition cursor-pointer"
                    >
                        નવો પાક
                    </button>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button
                type="submit"
                class="bg-[#B3541E] text-white px-5 py-2 rounded-[12px] transition cursor-pointer"
            >
                Save
            </button>
        </div>
    </form>

    
                
        </div>
    </div>

    <script>
        function addProductRow() {
            const container = document.getElementById('product-container');
            const rows = container.getElementsByClassName('product-row');
            const lastRow = rows[rows.length - 1];
            const lastButtonGroup = lastRow.querySelector('.button-group');
            if (lastButtonGroup) {
                lastButtonGroup.remove();
            }

            const newRow = document.createElement('div');
            newRow.className = 'product-row flex flex-col sm:flex-row gap-3 items-end';
            newRow.innerHTML = `
                <div class="flex-1 select-container">
                    <label class="block text-gray-700 font-semibold text-sm md:text-base">
                        નવો પાક :
                    </label>
                    <select
                        name="product[]"
                        class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]"
                    >
                        <option value="" disabled selected>--- પાક  પસંદ કરો ---</option>
                        <option value="product1">Product 1</option>
                        <option value="product2">Product 2</option>
                        <option value="product3">Product 3</option>
                    </select>
                </div>
                <div class="button-group flex gap-3">
                    <button
                        type="button"
                        onclick="addProductRow()"
                        class="bg-[#8b8b33] text-white px-4 py-2 rounded-[12px] transition cursor-pointer flex items-center"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </button>
                    <button
                        type="button"
                        onclick="addOtherProduct(this)"
                        class="bg-[#B3541E] text-white px-5 py-2 rounded-[12px] transition cursor-pointer"
                    >
                        નવો પાક
                    </button>
                </div>
            `;
            container.appendChild(newRow);
        }

        function addOtherProduct(button) {
            const row = button.closest('.product-row');
            const selectContainer = row.querySelector('.select-container');
            const buttonGroup = row.querySelector('.button-group');
            
            selectContainer.style.display = 'none';
            
            const input = document.createElement('div');
            input.className = 'flex-1';
            input.innerHTML = `
                <label class="block text-gray-700 font-semibold text-sm md:text-base">
                    નવો પાક :
                </label>
                <input
                    type="text"
                    name="other_product[]"
                    placeholder="Enter નવો પાક"
                    class="w-full px-5 py-3 border border-gray-300 rounded-[12px] focus:outline-none focus:ring-1 focus:ring-[#B3541E]"
                />
            `;
            row.insertBefore(input, buttonGroup);
            
            const rows = document.getElementById('product-container').getElementsByClassName('product-row');
            const lastRow = rows[rows.length - 1];
            if (row !== lastRow) {
                buttonGroup.remove();
            }
        }
    </script>
@endsection
