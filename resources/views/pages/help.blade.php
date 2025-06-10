@extends('layouts.app')

@section('content')
    <style>
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-in-out;
        }

        .accordion-content.open {
            max-height: 500px; /* Adjust as per content */
            transition: max-height 0.5s ease-in-out;
        }
    </style>
    <div class="py-4 md:py-6 w-full px-4 md:min-h-screen md:max-h-screen md:overflow-y-auto">
        <!-- Title -->
        <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
            BilApp માર્ગદર્શિકા
        </h2>
        <div>
            <div class="mx-auto">
                <!-- Accordion Item -->
                <div class="cursor-pointer relative border border-gray-200 bg-white rounded-lg hover:shadow-sm hover:border-[#4B4B4B] mb-3 transition-all duration-500">
                    <button onclick="toggleAccordion(event)" class="cursor-pointer w-full flex justify-between items-center p-4 font-medium text-left">
                        <h3 class="w-full text-[18px] font-semibold text-gray-800 group-hover:text-[#4B4B4B] transition-colors duration-300">
                            BilApp એન્ડ્રોઇડ મોબાઈલમાં કઈ રીતે ઇન્સ્ટોલ કરવી?
                        </h3>
                        <svg class="w-5 h-5 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="accordion-content trans px-4 text-gray-700">
                        <div class="accordion-body pb-3">
                            <ol class="mt-4 list-decimal list-inside space-y-4 text-gray-800">
                                <li>
                                    સૌથી પહેલાં <b>ગૂગલ ક્રોમ</b> Browser માં <b>bileshwarsurat.com</b> લિંક ખોલો.<br />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img1.png" alt="logo" class="col-md-4 col-10 d-inline-block help-img" />
                                </li>
                                <li>
                                    વેબસાઇટ ખુલી જાય ત્યારે browser ની જમણી બાજુ ઉપર ત્રણ ટપકા પર ક્લિક કરી menu ખોલો.<br />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img2.png" alt="logo" class="d-inline-block help-img" />
                                </li>
                                <li>
                                    નવા લેટેસ્ટ browser મા "Add to Home screen" ઓપ્શન હશે તેના પર ક્લિક કરો, ત્યાર બાદ 2 ઓપ્શન આવશે તેમાંથી "Install" ઓપ્શન પર ક્લિક કરો. જો ફરીથી "Install" બટન દેખાય તો ફરીથી ક્લિક કરવું. એપ્લિકેશન
                                    જાતે ઇન્સ્ટોલ થઈ જશે.<br />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img3.png" alt="logo" class="col-md-2 col-6 d-inline-block help-img" />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img5.png" alt="logo" class="col-md-2 col-6 d-inline-block help-img" />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img4.png" alt="logo" class="col-md-2 col-6 d-inline-block help-img" />
                                </li>
                            </ol>
                            <br />
                            <b>નોંધ:</b> જુના browser મા "Add to Home screen" ની જગ્યાએ સીધું જ "Install App" નુ ઓપ્શન દેખાશે તેના પર ક્લિક કરો અને ફરી Install બટન દેખાય તો ક્લિક કરો. એપ્લિકેશન જાતે ઇન્સ્ટોલ થઈ જશે.
                        </div>
                    </div>
                </div>

                <!-- Accordion Item -->
                <div class="cursor-pointer relative border border-gray-200 bg-white rounded-lg hover:shadow-sm hover:border-[#4B4B4B] mb-3 transition-all duration-500">
                    <button onclick="toggleAccordion(event)" class="cursor-pointer w-full flex justify-between items-center p-4 font-medium text-left">
                        <h3 class="w-full text-[18px] font-semibold text-gray-800 group-hover:text-[#4B4B4B] transition-colors duration-300">
                            BilApp એપલ(iPhone) મોબાઈલમાં કઈ રીતે ઇન્સ્ટોલ કરવી?
                        </h3>
                        <svg class="w-5 h-5 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="accordion-content trans px-4 text-gray-700">
                        <div class="accordion-body">
                            <ol class="mt-4 list-decimal list-inside space-y-4 text-gray-800">
                                <li><b>સફારી</b> Browser મા <b>bileshwarsurat.com</b> વેબસાઇટ ખોલો.</li>
                                <li>
                                    વેબસાઇટ ખુલી જાય ત્યારે browser ની નીચે આવેલા શેર બટન પર ક્લિક કરો અને ત્યારબાદ "Add to Home screen" પર ક્લિક કરો.<br />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img6.jpg" alt="logo" class="col-md-2 col-6 d-inline-block help-img" />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img7.png" alt="logo" class="col-md-2 col-6 d-inline-block help-img" />
                                </li>
                                <li>
                                    ત્યારબાદ "Add" બટન પર ક્લિક કરો. એપ્લિકેશન ઇન્સ્ટોલ થઈ જશે.<br />
                                    <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/img/img8.png" alt="logo" class="col-md-2 col-8 d-inline-block help-img" />
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Accordion Item -->
                <div class="cursor-pointer relative border border-gray-200 bg-white rounded-lg hover:shadow-sm hover:border-[#4B4B4B] mb-3 transition-all duration-500">
                    <button onclick="toggleAccordion(event)" class="cursor-pointer w-full flex justify-between items-center p-4 font-medium text-left">
                        <h3 class="w-full text-[18px] font-semibold text-gray-800 group-hover:text-[#4B4B4B] transition-colors duration-300">
                            BilApp એપલઘરના સભ્યોની માહિતી BilApp માં કઈ રીતે ઉમેરવી કે સુધારવી?
                        </h3>
                        <svg class="w-5 h-5 transform transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="accordion-content px-4 text-gray-700">
                        <div class="transition-all duration-500">
                            <p>
                                <span class="font-bold">નોંધ:</span> સભ્ય ઉમેરતા પહેલા તમારા ઘરના મુખ્ય વ્યક્તિનું નામ તમારા પરિવારની યાદીમાં આવી ગયું છે કે નહિ તે તપાસી લેવું. જો ના આવ્યું હોય તો મંડળનો સંપર્ક કરવો, જો પરિવારના
                                લિસ્ટ માં નામ હોય તો નીચે પ્રમાણે ઘરના સભ્યો ઉમેરવા.
                            </p>

                            <div class="text-[15px] text-gray-600 leading-relaxed pb-3">
                                <ol class="mt-4 list-decimal list-inside space-y-4 text-gray-800">
                                    <li>
                                        "નવો સભ્ય ઉમેરો" પર ક્લિક કરો.
                                    </li>
                                    <li>
                                        હવે ઘરના મુખ્ય વ્યક્તિનો મોબાઈલ નંબર લખો જે તમે મંડળમાં આપ્યો હોય. નંબર લખી, નીચે આપેલા
                                        <span class="px-2 py-1 bg-sky-100 text-sky-700 rounded">Send OTP</span> બટન પર એકવાર ક્લિક કરી થોડી રાહ જોવો. થોડી જ સેકન્ડમાં OTP ઉપર લખેલા મોબાઈલ નંબર પર આવી જશે.
                                    </li>
                                    <li>
                                        હવે તમારા નંબર પર આવેલો 6 અંક નો OTP લખો અને નીચે આપેલા
                                        <span class="px-2 py-1 bg-sky-100 text-sky-700 rounded">Login</span> બટન પર ક્લિક કરો.
                                    </li>
                                    <li>
                                        તમારું પ્રોફાઈલ હવે ખુલી જશે, જેમાં તમે ઘરના સભ્યો ઉમેરી શકશો અથવા ઉમેરેલા સભ્યો ની માહિતી સુધારી પણ શકશો.
                                        <ul class="list-decimal list-inside pl-6 space-y-2 mt-2 text-gray-700">
                                            <li>
                                                નવો સભ્ય ઉમેરવા
                                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded">નવો સભ્ય ઉમેરો</span> બટન પર ક્લિક કરો.
                                            </li>
                                            <li>
                                                જે સભ્યની માહિતીમાં સુધારો કરવો હોય તેના નામની સામે આવેલા
                                                <button class="inline-flex items-center p-[2px] bg-gray-100 rounded hover:bg-gray-200">
                                                    <img src="assets/icons/pensil.svg" alt="Edit" class="w-4 h-4" />
                                                </button>
                                                પેન્સિલ જેવા બટન પર ક્લિક કરો.
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        સભ્યની માહિતી ભરવાનું ફોર્મ ખુલી જશે, તેમાં ગુજરાતી ભાષા માં સંપૂર્ણ માહિતી ભરી
                                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded">Save</span> બટન પર ક્લિક કરશો એટલે નવો સભ્ય ઉમેરાઈ જશે અથવા સભ્યની માહિતી માં સુધારો થઇ જશે.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function toggleAccordion(event) {
            const button = event.currentTarget;
            const content = button.nextElementSibling;
            const icon = button.querySelector("svg");

            content.classList.toggle("open");
            icon.classList.toggle("rotate-180");
        }
    </script>
@endpush
