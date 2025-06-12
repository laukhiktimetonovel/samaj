@extends('layouts.app')

@section('content')
   <div class="w-full lg:w-[calc(100%_-_230px)]">
        <!-- Title -->
        <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
            શ્રી તળપદા કોળી પટેલ સમાજ સમૂહ લગ્ન સમિતિ
        </h2>
        <div class="mt-5">
            <h2 class="w-max bg-[#faebd7] mb-[25px] mt-[45px] px-[11px] py-[11px] rounded-[5px] text-lg font-semibold ">
                સમિતિ ના હોદેદારો</h2>
            <div>
                <div id="memberGrid" class="grid grid-cols-2 xl:grid-cols-4 2xl:grid-cols-6 gap-2 sm:gap-4"></div>
            </div>
        </div>

        <div class="space-y-4">
            <h2 class="w-max bg-[#faebd7] mt-[50px] my-[25px] px-[11px] py-[11px] rounded-[5px] text-lg font-semibold ">
                ૩૧ મો સમૂહ લગ્નોત્સવ, ર૦રપ ના દાતાશ્રી
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                <div class="bg-white rounded-[12px] p-4 md:p-6 flex flex-col gap-2 border border-gray-200">

                    <p class="text-[#B3541E] md:text-xl font-semibold">
                        શ્રી પટેલ માઘવલાલ રામજીદાસ 
                    </p>
                </div>
                <div class="bg-white rounded-[12px] p-4 md:p-6 flex flex-col gap-2 border border-gray-200">

                    <p class="text-[#B3541E] md:text-xl font-semibold">
                        શ્રી પટેલ માઘવલાલ રામજીદાસ 
                    </p>
                </div>
                <div class="bg-white rounded-[12px] p-4 md:p-6 flex flex-col gap-2 border border-gray-200">

                    <p class="text-[#B3541E] md:text-xl font-semibold">
                       શ્રી પટેલ માઘવલાલ રામજીદાસ 
                    </p>
                </div>
                <div class="bg-white rounded-[12px] p-4 md:p-6 flex flex-col gap-2 border border-gray-200">

                    <p class="text-[#B3541E] md:text-xl font-semibold">
                       શ્રી પટેલ માઘવલાલ રામજીદાસ 
                    </p>
                </div>
            </div> 
        </div>

        <h2 class="w-max bg-[#faebd7] my-[25px] mt-[50px] px-[11px] py-[11px] rounded-[5px] text-lg font-semibold ">
            સમુહલગ્નનું શુભ મુહૂર્ત
        </h2>

        <div class="bg-white shadow p-4 md:p-6 rounded-xl text-[18px] grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
            <div class="grid grid-cols-2 gap-2">
                <span class="font-bold">જવેરા વાવવા:</span>
                <span class="font-medium">સંવત ર૦૮૧ ના આસો વદ - ૧૩ ને રવિવાર તા. ૧૯-૧૦-ર૦રપ ના રોજ સવારે ૯.૦૦ થી ૧૦.૩૦ કલાકે</span>

                <span class="font-bold">ગણેશ સ્થાપના / લગ્ન લખવાનું :</span>
                <span class="font-medium">સંવત ર૦૮ર ના કારતક સુદ - ૭ ને બુધવાર તા. ર૯-૧૦-ર૦રપ ના રોજ સવારે ૬.૦૦ થી ૯.૦૦ કલાકે
                </span>

                <span class="font-bold">ગ્રહશાંતિ :</span>
                <span class="font-medium">સંવત ર૦૮ર ના કારતક સુદ - ૮ ને ગુરૂવાર તા. ૩૦-૧૦-ર૦રપ ના રોજ સવારે ૬.૦૦ થી ૭.૩૦ કલાકે / ૧૦.૩૦ થી ૩.૦૦ કલાકે
                </span>

                <span class="font-bold">વરચડાવો :</span>
                <span class="font-medium">સંવત ર૦૮૨ ના કારતક સુદ - ૯ ને શુક્રવાર તા. ૩૧-૧૦-ર૦રપ ના રોજ સવારે ૬.૦૦ થી ૭.૩૦ કલાકે
                </span>

                <span class="font-bold">વરપાંખણી :</span>
                <span class="font-medium">સંવત ર૦૮ર ના કારતક સુદ - ૯ ને શુક્રવાર તા. ૩૧-૧૦-ર૦રપ ના રોજ સવારે ૭.૩૦ કલાકે
                </span>

                <span class="font-bold">હસ્તમેળાપ :</span>
                <span class="font-medium">સંવત ર૦૮૨ ના કારતક સુદ - ૯ ને શુક્રવાર તા. ૩૧-૧૦-ર૦રપ ના રોજ સવારે ૯.૦૦ થી ૧૦.૩૦ કલાકે
                </span>

                <span class="font-bold">કન્યાવિદાય :</span>
                <span class="font-medium">સંવત ર૦૮ર ના કારતક સુદ - ૯ ને શુક્રવાર તા. ૩૧-૧૦-ર૦રપ ના રોજ બપોરે ૧ર.૦૦ થી ૧.૩૦ કલાકે/સાંજે ૪.૩૦ થી ૬.૦૦ કલાકે
                </span>
            </div>
        </div>

        <h2 class="w-max bg-[#faebd7] my-[25px] mt-[50px] px-[11px] py-[11px] rounded-[5px] text-lg font-semibold ">
            -: નામ નોંધાવા સંપર્ક કરો :-
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4">
            <div class="bg-white shadow p-4 rounded-[12px]">
                <h4 class="text-center text-lg font-semibold">તળપદા ગ્રામ પંચાયત</h4>
                <ul class="mt-4 space-y-4 list-disc list-outside pl-6">
                    <li>
                        <p>
                            તળપદા :
                        </p>
                        <p class="text-[#B3541E] font-semibold"> મો:<img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/number_img/number_image1.png" class="inline-block max-w-[160px]" /></p>
                    </li>
                    <li>
                        <p>
                            પટેલ તનમેશભાઈ જી.(તલાટી કમ મંત્રી)
                        </p>
                        <p class="text-[#B3541E] font-semibold"> મો:<img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/number_img/number_image2.png" class="inline-block max-w-[160px]" /></p>
                    </li>
                    
                </ul>
            </div>

            <div class="bg-white shadow p-4 rounded-[12px]">
                <h4 class="text-center text-lg font-semibold">પ્રકાશ વિદ્યાલય, બિલિયા</h4>
                <ul class="mt-4 space-y-4 list-disc list-outside pl-6">
                    <li>
                        <p>
                            સુરેશભાઈ સુંઢિયા(આચાર્યશ્રી)
                        </p>
                        <p class="text-[#B3541E] font-semibold"> મો:<img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/number_img/number_image4.png" class="inline-block max-w-[160px]" /></p>
                    </li>
                    <li>
                        <p>
                            નાગરભાઈ એ. પટેલ(પ્રમુખશ્રી)
                        </p>
                        <p class="text-[#B3541E] font-semibold"> મો:<img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/number_img/number_image5.png" class="inline-block max-w-[160px]" /></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const members = [{
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            {
                name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                role: "(પ્રમુખશ્રી)",
                phone: "7896589625",
                image: "{{ asset('images/user-place.webp') }}",
            },
            
        ];
        const container = document.getElementById("memberGrid");

        members.forEach((member) => {
            container.innerHTML += `
                <div class="bg-white rounded-xl shadow p-2 sm:p-3 text-center flex flex-col gap-3 sm:gap-4">
                    <div class="w-full h-auto relative overflow-hidden">
                        <div class="relative overflow-hidden w-full block h-full pt-[100%]  border-gray-100 rounded-xl">
                            <img src="${member.image}" class="absolute h-full w-full object-contain left-0 top-0" loading="lazy" alt="${member.name}" />
                        </div>
                    </div>
                    <div class="flex-col gap-1 flex flex-1">
                        <h2 class="font-semibold md:font-bold sm:text-lg flex-1">${member.name}</h2>
                        <p class="text-[#B3541E] text-sm">${member.role}</p>
                        <p>Mo: ${member.phone}</p>
                    </div>
                </div>`;
        });
    </script>
@endpush
