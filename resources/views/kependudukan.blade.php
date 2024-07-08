<x-layout.content>
    <x-layout.navbar>
        <li class="inline-flex items-center">
            <x-layout.navlink>
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </x-slot>
                Kependudukan
            </x-layout.navlink>
        </li>
    </x-layout.navbar>

    <div class="card flex flex-wrap my-5 -mx-2">
        <div class="w-full px-2">
            <div class="overflow-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600">
                    <thead>
                        <tr class="dark:text-white">
                            <th class="py-2 px-4 border-b">NIK</th>
                            <th class="py-2 px-4 border-b">Nama</th>
                            <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                            <th class="py-2 px-4 border-b">Tanggal Lahir</th>
                            <th class="py-2 px-4 border-b">Umur</th>
                            <th class="py-2 px-4 border-b">Wilayah</th>
                            <th class="py-2 px-4 border-b">Agama</th>
                            <th class="py-2 px-4 border-b">Status Pendidikan</th>
                            <th class="py-2 px-4 border-b">Status Ekonomi</th>
                            <th class="py-2 px-4 border-b">Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kependudukan as $data)
                            <tr class="dark:text-white">
                                <td class="py-2 px-4 border-b">{{ $data->NIK }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->nama }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->jenis_kelamin }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->tanggal_lahir }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->umur }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->wilayah->nama ?? 'N/A' }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->agama }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->status_pendidikan }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->status_ekonomi }}</td>
                                <td class="py-2 px-4 border-b">{{ $data->pekerjaan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 dark:text-white">
                {{ $kependudukan->links('pagination::tailwind') }}
            </div>

        </div>
    </div>
    <!-- Statistik dan Chart -->
    <div class="grid grid-cols-3 gap-4 mt-4 bg-white dark:bg-[#1E293B] px-4">
        <div class="col-span-1 my-5">
            <h2 class="dark:text-white">Statistik Berdasarkan Umur</h2>
            <canvas id="umurChart" width="400" height="400"></canvas>
        </div>

        <div class="col-span-1 my-5">
            <h2 class="dark:text-white">Statistik Berdasarkan Pekerjaan</h2>
            <canvas id="pekerjaanChart" width="400" height="400"></canvas>
        </div>

        <div class="col-span-1 my-5">
            <h2 class="dark:text-white">Statistik Berdasarkan Jenis Kelamin</h2>
            <canvas id="jenisKelaminChart" width="400" height="400"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Function to generate gradient color for dark mode
        function getGradient(ctx, color1, color2) {
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, color1);
            gradient.addColorStop(1, color2);
            return gradient;
        }
    
        // Data untuk chart
        const umurData = @json($umurStatistik);
        const pekerjaanData = @json($pekerjaanStatistik);
        const jenisKelaminData = @json($jenisKelaminStatistik);
    
        // Umur Chart
        const umurLabels = umurData.map(data => data.umur);
        const umurCounts = umurData.map(data => data.count);
    
        const umurCtx = document.getElementById('umurChart').getContext('2d');
        const umurChart = new Chart(umurCtx, {
            type: 'bar',
            data: {
                labels: umurLabels,
                datasets: [{
                    label: 'Jumlah Berdasarkan Umur',
                    data: umurCounts,
                    backgroundColor: getGradient(umurCtx, 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 0.7)'),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'white'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    
        // Pekerjaan Chart
        const pekerjaanLabels = pekerjaanData.map(data => data.pekerjaan);
        const pekerjaanCounts = pekerjaanData.map(data => data.count);
    
        const pekerjaanCtx = document.getElementById('pekerjaanChart').getContext('2d');
        const pekerjaanChart = new Chart(pekerjaanCtx, {
            type: 'bar',
            data: {
                labels: pekerjaanLabels,
                datasets: [{
                    label: 'Jumlah Berdasarkan Pekerjaan',
                    data: pekerjaanCounts,
                    backgroundColor: getGradient(pekerjaanCtx, 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 0.7)'),
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'white'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    
        // Jenis Kelamin Chart
        const jenisKelaminLabels = jenisKelaminData.map(data => data.jenis_kelamin);
        const jenisKelaminCounts = jenisKelaminData.map(data => data.count);
    
        const jenisKelaminCtx = document.getElementById('jenisKelaminChart').getContext('2d');
        const jenisKelaminChart = new Chart(jenisKelaminCtx, {
            type: 'bar',
            data: {
                labels: jenisKelaminLabels,
                datasets: [{
                    label: 'Jumlah Berdasarkan Jenis Kelamin',
                    data: jenisKelaminCounts,
                    backgroundColor: getGradient(jenisKelaminCtx, 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.7)'),
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            color: 'white'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'white'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'white'
                        }
                    }
                }
            }
        });
    </script>
    

</x-layout.content>
