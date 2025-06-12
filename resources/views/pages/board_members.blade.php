@extends('layouts.app')

@section('content')
   <div class="w-full lg:w-[calc(100%_-_230px)]">
        <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
            તળપદા કોળી પટેલ સમાજ ના હોદ્દેદારો
        </h2>
        <div >
            <div id="memberGrid" class="grid grid-cols-2 xl:grid-cols-4 2xl:grid-cols-6 gap-2 sm:gap-4"></div> 
        </div>
    </div>
@endsection
@push('scripts')
        <script>
            const members = [
                {
                    name: "પટેલ અમૃતલાલ જોઈતારામ સાંગડોત",
                    role: "(પ્રમુખશ્રી)",
                    phone: "૯૮૨૫૧૨૧૮૦૮",
                    image: "img1.jpg",
                },
                {
                    name: "પટેલ ગોપાળભાઈ ભગવાનભાઈ કિયાદરા",
                    role: "(ઉપ પ્રમુખશ્રી)",
                    phone: "૯૮૨૫૦૬૩૬૦૦",
                    image: "img2.jpg",
                },
                {
                    name: "પટેલ રસિકભાઈ ગણેશભાઈ વરવાડીયા",
                    role: "(મંત્રીશ્રી)",
                    phone: "૯૩૭૪૭૨૫૪૩૫",
                    image: "img3.jpg",
                },
                {
                    name: "પટેલ રસિકભાઈ છગનભાઈ પેપડીયા",
                    role: "(ખજાનચી)",
                    phone: "૯૮૨૫૧૨૮૮૨૬",
                    image: "img4.jpg",
                },
                {
                    name: "પટેલ રમેશભાઈ મણિલાલ મોખાત",
                    role: "(ઓડિટર)",
                    phone: "૯૮૨૫૧૪૫૮૪૨",
                    image: "img5.jpg",
                },
                {
                    name: "પટેલ સુરેશભાઈ અંબારામભાઈ મહેરવાડીયા",
                    role: "(કારોબારી સભ્ય)",
                    phone: "૯૮૨૫૪૪૦૫૨૫",
                    image: "img6.jpg",
                },
                {
                    name: "પટેલ સુરેશભાઈ ચેલારામભાઈ સિધ્ધપુરા",
                    role: "(કારોબારી સભ્ય)",
                    phone: "૯૮૨૫૧૨૧૩૧૦",
                    image: "img7.jpg",
                },
                {
                    name: "પટેલ ભરતભાઈ વીરાભાઇ હજારી",
                    role: "(કારોબારી સભ્ય)",
                    phone: "૯૩૭૬૯૭૪૦૬૩",
                    image: "img8.jpg",
                },
                {
                    name: "પટેલ અમરતભાઈ નારાયણભાઈ પાંચોટિયા",
                    role: "(કારોબારી સભ્ય)",
                    phone: "૯૮૭૯૮૮૬૬૩૬",
                    image: "img9.jpg",
                },
                {
                    name: "પટેલ ભરતભાઈ ગણેશભાઈ કિયાદરા",
                    role: "(કારોબારી સભ્ય)",
                    phone: "૯૪૨૬૧૪૯૯૪૫",
                    image: "img10.jpg",
                },
                {
                    name: "પટેલ રાકેશભાઈ ત્રિભોવનભાઈ નુંગરા",
                    role: "(કારોબારી સભ્ય)",
                    phone: "૯૯૭૯૯૬૬૪૯૯",
                    image: "img11.jpg",
                },
            ];
            const container = document.getElementById("memberGrid");

            members.forEach((member) => {
                container.innerHTML += `
                    <div class="bg-white rounded-xl shadow p-2 sm:p-3 text-center flex flex-col gap-3 sm:gap-4">
                        <div class="w-full h-auto relative overflow-hidden">
                            <div class="relative overflow-hidden w-full block h-full pt-[100%] border border-gray-100 rounded-xl">
                                <img src="https://ctxfealcva.cloudimg.io/bileshwarsurat.com/assets/hodedar/${member.image}" class="absolute h-full w-full object-contain left-0 top-0" loading="lazy" alt="${member.name}" />
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
