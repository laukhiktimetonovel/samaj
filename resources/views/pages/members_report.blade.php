@extends('layouts.app')

@section('content')
    <div>
        <h2 class="font-semibold text-2xl mb-4 text-center md:text-left">
            સભ્યોનો રિપોર્ટ
        </h2>
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6 max-w-5xl">
                <div class="bg-white rounded-[12px] shadow p-4 text-center">
                    <p class="text-xl font-semibold">સદસ્ય :</p>
                    <p class="text-2xl font-semibold pt-2 text-[#B3541E]">{{ $grandTotalSadasy }}</p>
                </div>
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="w-full xl:w-8/12 p-2">
                    <div class="bg-white shadow rounded-xl p-4">
                        <h2 class="text-red-900 text-xl font-bold mb-4 mt-2">સભ્ય સંખ્યા</h2>
                        <div class="overflow-x-auto bg-white">
                            <table class="text-center min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400" rowspan="2">પરિવાર</th>
                                        <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400" colspan="2">સભ્ય</th>
                                        <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400" rowspan="2">કુલ સદસ્ય</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">પુરુષ</th>
                                        <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">સ્ત્રી</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-sm">
                                    @foreach($reportData as $village => $data)
                                        <tr>
                                            <td class="font-bold bg-[#fff8ee] py-2 px-4 border-gray-300 border">{{ $village }}</td>
                                            <td class="py-2 px-4 border-gray-300 border">{{ $data['male'] }}</td>
                                            <td class="py-2 px-4 border-gray-300 border">{{ $data['female'] }}</td>
                                            <td class="font-bold bg-[#fff8ee] py-2 px-4 border-gray-300 border">{{ $data['total'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="py-2 px-4 border border-gray-300 bg-[antiquewhite] font-bold">કુલ</td>
                                        <td class="py-2 px-4 border border-gray-300 bg-[antiquewhite] font-bold">
                                            {{ array_sum(array_column($reportData, 'male')) }}
                                        </td>
                                        <td class="py-2 px-4 border border-gray-300 bg-[antiquewhite] font-bold">
                                            {{ array_sum(array_column($reportData, 'female')) }}
                                        </td>
                                        <td class="py-2 px-4 border border-gray-300 bg-[antiquewhite] font-bold">{{ $grandTotalSadasy }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p class="mt-6 mb-2 underline text-red-900 text-2xl font-bold text-center">કુલ સદસ્યોની સંખ્યા: {{ $grandTotalSadasy }}</p>
                    </div>
                </div>

                <div class="w-full xl:w-4/12 p-2">
                    <!-- Blood Group Chart -->
                    <div class="bg-white shadow rounded-xl p-4 mb-4">
                        <h2 class="text-red-900 text-xl font-bold mb-4 mt-2">બ્લડગ્રુપ ચાર્ટ</h2>
                        <table class="text-center min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">બ્લડગ્રુપ</th>
                                    <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">કુલ સંખ્યા</th>
                                    <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">ટકાવારી</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-200">
                                @foreach($bloodGroupData as $group => $data)
                                    <tr>
                                        <td class="py-2 px-4 border-gray-300 border">{{ $group }}</td>
                                        <td class="py-2 px-4 border-gray-300 border">{{ $data['count'] }}</td>
                                        <td class="py-2 px-4 border-gray-300 border">{{ $data['percentage'] }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Gender Ratio Chart -->
                    <div class="bg-white shadow rounded-xl p-4">
                        <h2 class="text-red-900 text-xl font-bold mb-4 mt-2">સ્ત્રી - પુરુષ રેશિયો</h2>
                        <table class="w-full text-left border-t border-gray-200 mb-4">
                            <thead>
                                <tr>
                                    <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">જાતિ</th>
                                    <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">કુલ સંખ્યા</th>
                                    <th class="bg-[#b3541e4a] py-2 px-4 border border-gray-400">ટકાવારી</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-200">
                                <tr>
                                    <td class="py-2 px-4 border-gray-300 border">
                                        <div class="flex items-center gap-2"><span class="size-4 rounded bg-[#f472b6] block"></span> સ્ત્રીઓ</div>
                                    </td>
                                    <td class="py-2 px-4 border-gray-300 border">{{ $genderRatio['female']['count'] }}</td>
                                    <td class="py-2 px-4 border-gray-300 border">{{ $genderRatio['female']['percentage'] }}%</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-gray-300 border">
                                        <div class="flex items-center gap-2"><span class="size-4 rounded bg-[#3b82f6] block"></span> પુરુષો</div>
                                    </td>
                                    <td class="py-2 px-4 border-gray-300 border">{{ $genderRatio['male']['count'] }}</td>
                                    <td class="py-2 px-4 border-gray-300 border">{{ $genderRatio['male']['percentage'] }}%</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-sm mb-2">→ ગામ માં દર 100 પુરુષો સામે {{ $genderRatio['ratio'] }} સ્ત્રીઓ છે.</p>
                        <span>(BilApp માં હાજર માહિતી પરથી*)</span>
                        <canvas id="genderPieChart" class="mx-auto" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById("genderPieChart").getContext("2d");
        new Chart(ctx, {
            type: "pie",
            data: {
                labels: ["સ્ત્રીઓ", "પુરુષો"],
                datasets: [
                    {
                        data: [{{ $genderRatio['female']['count'] }}, {{ $genderRatio['male']['count'] }}],
                        backgroundColor: ["#f472b6", "#3b82f6"],
                    },
                ],
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: "bottom",
                    },
                },
            },
        });
    </script>
@endpush