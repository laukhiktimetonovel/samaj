@extends('layouts.app')

@section('content')
   <div class="w-full lg:w-[calc(100%_-_230px)]">
        <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
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
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            },
                {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }, {
                name: " પટેલ અમૃતલાલ જોઈતારામ",
                role: "(પ્રમુખશ્રી)",
                phone: "9998569852",
                image: "{{ asset('images/user-place.jpg') }}",
            }
        ];
        const container = document.getElementById("memberGrid");

        members.forEach((member) => {
            container.innerHTML += `
                <div class="bg-white rounded-xl shadow p-2 sm:p-3 text-center flex flex-col gap-3 sm:gap-4">
                    <div class="w-full h-auto relative overflow-hidden">
                        <div class="relative overflow-hidden w-full block h-full pt-[100%] rounded-xl">
                            <img src="${member.image}" class="absolute h-full w-full object-contain left-0 top-0" loading="lazy" alt="${member.name}" />
                        </div>
                    </div>
                    <div class="flex-col gap-1 flex flex-1">
                        <h2 class="font-semibold md:font-bold sm:text-lg flex-1">${member.name}</h2>
                        <p class="text-[#575228] text-sm">${member.role}</p>
                        <p>મોબાઈલ નંબર: ${member.phone}</p>
                    </div>
                </div>`;
            });
    </script>
@endpush
