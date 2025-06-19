@extends('layouts.app')

@section('content')
    <div class="w-full lg:w-[calc(100%_-_230px)]">
    <!-- Profile Card -->
    <div class="bg-white p-4 md:p-6 shadow rounded-xl grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
        <!-- Image -->
        <div class="col-span-1 flex justify-center">
            <div class="relative overflow-hidden w-full block h-full pt-[100%] border border-gray-100 rounded-xl">
                <img
                    src="{{ $member->photo_url ?? asset('images/default-avatar.png') }}"
                    class="absolute h-full w-full object-contain left-0 top-0"
                    loading="lazy"
                    alt="{{ $member->full_name }}"
                />
            </div>
        </div>

        <!-- Info -->
        <div class="col-span-2 space-y-2 text-gray-700">
            <div class="grid grid-cols-2 gap-4">
                <span class="font-semibold">સભ્ય નં :</span>
                <span class="font-bold">{{ $member->id }}</span>

                <span class="font-semibold">નામ :</span>
                <span class="font-bold">{{ $member->full_name }} ({{ $member->village_name }})</span>

                <span class="font-semibold">મોબાઈલ નંબર :</span>
                <span class="font-medium">{{ $member->mobile ?? '—' }}</span>

                <span class="font-semibold">જન્મ તારીખ :</span>
                <span class="font-medium">
                    {{ \Carbon\Carbon::parse($member->birth_date)->format('d-m-Y') }}
                    @if($member->birth_date)
                    ({{ \Carbon\Carbon::parse($member->birth_date)->age }} વર્ષ)
                    @endif
                </span>

                <span class="font-semibold">બ્લડ ગ્રુપ :</span>
                <span class="font-medium">{{ $member->blood_group ?? '—' }}</span>

                <span class="font-semibold">અભ્યાસ :</span>
                <span class="font-medium">{{ $member->education ?? '—' }}</span>

                <span class="font-semibold">વૈવાહિક દરજ્જો :</span>
                <span class="font-medium">{{ $member->marital_status ?? '—' }}</span>

                <span class="font-semibold">મોસાળ :</span>
                <span class="font-medium">
                    {{ $member->mosal_name ?? '—' }},
                    {{ $member->mosal_village ?? '—' }}
                </span>

                <span class="font-semibold">હાલના રહેઠાણનું સરનામું :</span>
                <span class="font-medium">{{ $member->current_address ?? '—' }}</span>

                <span class="font-semibold">વ્યવસાયનું નામ અથવા પ્રકાર :</span>
                <span class="font-medium">{{ $member->business_name ?? '—' }}</span>

                <span class="font-semibold">ગામનું સરનામું :</span>
                <span class="font-medium">{{ $member->village_address ?? '—' }}</span>

                <span class="font-semibold">વ્યવસાયનું સરનામું :</span>
                <span class="font-medium">{{ $member->business_address ?? '—' }}</span>
            </div>
        </div>
    </div>

    <!-- Divider & Family Members -->
    <div class="border-t mt-6 pt-4">
        <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">ઘરના સદસ્ય</h2>

        @if($children->isEmpty())
            <p class="text-center text-gray-600">⚠︎ સભ્ય ઉમેરેલા નથી</p>
        @else
            <div class="space-y-4">
                @foreach($children as $child)
                    <div class="bg-white shadow p-4 md:p-6 rounded-xl text-[15px] grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                        <div class="grid grid-cols-2 gap-2">
                            <span class="font-semibold">નામ :</span>
                            <span class="font-bold">{{ $child->full_name }} ({{ $child->parent->village_name }})</span>

                            <span class="font-semibold">મુખ્ય સભ્ય સાથે સંબંધ :</span>
                            <span class="font-medium">{{ $child->relation }}</span>

                            <span class="font-semibold">મોબાઈલ નંબર :</span>
                            <span class="font-medium">{{ $child->mobile ?? '—' }}</span>

                            <span class="font-semibold">જન્મ તારીખ :</span>
                            <span class="font-medium">
                                {{ $child->birth_date ? \Carbon\Carbon::parse($child->birth_date)->format('d-m-Y') : '—' }}
                                @if($child->birth_date)
                                ({{ \Carbon\Carbon::parse($child->birth_date)->age }} વર્ષ)
                                @endif
                            </span>

                            <span class="font-semibold">બ્લડ ગ્રુપ :</span>
                            <span class="font-medium">{{ $child->blood_group ?? '—' }}</span>

                            <span class="font-semibold">અભ્યાસ :</span>
                            <span class="font-medium">{{ $child->education ?? '—' }}</span>

                            <span class="font-semibold">વૈવાહિક દરજ્જો :</span>
                            <span class="font-medium">{{ $child->marital_status ?? '—' }}</span>

                            <span class="font-semibold">મોસાળ :</span>
                            <span class="font-medium">
                                {{ $child->mosal_name ?? '—' }},
                                {{ $child->mosal_village ?? '' }}
                            </span>

                            <span class="font-semibold">વ્યવસાયનું નામ અથવા પ્રકાર :</span>
                            <span class="font-medium">{{ $child->business_name ?? '—' }}</span>

                            <span class="font-semibold">વ્યવસાયનું સરનામું :</span>
                            <span class="font-medium">{{ $child->business_address ?? '—' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    </div>
@endsection
