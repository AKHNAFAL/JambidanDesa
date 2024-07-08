<x-layout.content>
    <x-layout.navbar>
        <li class = "inline-flex items-center">
            <x-layout.navlink>
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                    </svg>
                </x-slot:icon>
                Layanan Surat
            </x-layout.navlink>
            <x-layout.navlink>
                <x-slot:icon>
                </x-slot:icon>
                Proyek
            </x-layout.navlink>
        </li>
    </x-layout.navbar>

    <div class = "mt-4">
        <div class="bg-gray-50 dark:bg-[#1E293B] dark:text-white rounded-lg">
            <div class="bg-yellow-500 dark:bg-yellow-500 rounded-lg">
                <h1 class="p-1 flex items-center justify-center text-lg font-bold">SEDANG BERJALAN</h1>
            </div>
            <div
                class="max-h-[300px] overflow-y-scroll scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="py-2 px-4"></th>
                            <th class="py-2 px-4">Nama Proyek</th>
                            <th class="py-2 px-4">Tanggal Mulai</th>
                            <th class="py-2 px-4">Persentase Penyelesaian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                        @foreach ($proyek_proses as $index => $p)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                                <td class="py-2 px-4">{{ $p->nama_proyek }}</td>
                                <td class="py-2 px-4 text-center">{{ $p->tanggal_mulai }}</td>
                                <td class="py-2 px-4 text-center">{{ $p->persentase_penyelesaian }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-5 gap-4 mt-4">
        <div id="chart-status-proyek"
            class="col-span-2 pr-8 pt-5 bg-gray-50 dark:bg-[#1E293B] dark:text-white rounded-lg">

        </div>
        <div class="col-span-3 bg-gray-50 dark:bg-[#1E293B] dark:text-white rounded-lg">
            <div class="bg-red-500 dark:bg-red-500 rounded-lg">
                <h1 class="p-1 flex items-center justify-center text-lg font-bold">Tertunda</h1>
            </div>
            <div
                class="max-h-[200px] overflow-y-scroll scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="py-2 px-4"></th>
                            <th class="py-2 px-4">Nama Proyek</th>
                            <th class="py-2 px-4">Tanggal Mulai</th>
                            <th class="py-2 px-4">Persentase Penyelesaian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                        @foreach ($proyek_tertunda as $index => $p)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                                <td class="py-2 px-4">{{ $p->nama_proyek }}</td>
                                <td class="py-2 px-4 text-center">{{ $p->tanggal_mulai }}</td>
                                <td class="py-2 px-4 text-center">{{ $p->persentase_penyelesaian }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-span-3 bg-gray-50 dark:bg-[#1E293B] dark:text-white rounded-lg mt-4">
        <div class="bg-green-500 dark:bg-green-500 rounded-lg">
            <h1 class="p-1 flex items-center justify-center text-lg font-bold">SELESAI</h1>
        </div>
        <div
            class="max-h-[300px] overflow-y-scroll scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="py-2 px-4"></th>
                        <th class="py-2 px-4">Nama Proyek</th>
                        <th class="py-2 px-4">Tanggal Mulai</th>
                        <th class="py-2 px-4">Persentase Penyelesaian</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
                    @foreach ($proyek_selesai as $index => $p)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                            <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $p->nama_proyek }}</td>
                            <td class="py-2 px-4 text-center">{{ $p->tanggal_mulai }}</td>
                            <td class="py-2 px-4 text-center">{{ $p->persentase_penyelesaian }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- Indikator status --}}
    <script>
        var options = {
            series: [{
                data: [
                    @json($proyek_selesai_count),
                    @json($proyek_tertunda_count),
                    @json($proyek_proses_count)
                ]
            }],
            chart: {
                type: 'bar',
                height: 200
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Selesai', 'Tertunda', 'Dalam Proses'],
                labels: {
                    style: {
                        colors: '#FFFFFF',
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#FFFFFF',
                        fontSize: '12px'
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-status-proyek"), options);
        chart.render();
    </script>

</x-layout.content>
