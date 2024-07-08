<x-layout.content>
    <x-layout.navbar>
        <li class="inline-flex items-center">
            <x-layout.navlink>
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                    </svg>
                </x-slot>
                Layanan Surat
            </x-layout.navlink>
        </li>
    </x-layout.navbar>

    <div class="card flex flex-wrap my-2 -mx-2">
        <!-- Statistik Surat Section -->
        <div class="w-full px-2 mt-3 mb-6 lg:w-1/2">
            <div class="bg-white dark:bg-gray-800 p-4 shadow rounded-lg" style="height: 500px; overflow-x: auto;">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Statistik Surat</h2>
                <canvas id="suratChart" style="height: 100%;"></canvas>
            </div>
        </div>

        <!-- Statistik Surat Bulanan Section -->
        <div class="w-full px-2 mt-3 mb-6 lg:w-1/2">
            <div class="bg-white dark:bg-gray-800 p-4 shadow rounded-lg" style="height: 500px; overflow-x: auto;">
                <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Statistik Surat Bulanan</h2>
                <canvas id="monthlyLettersChart" style="height: 100%;"></canvas>
            </div>
        </div>

        <!-- Table Section -->
        <div class="w-full px-2">
            <div class="overflow-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600">
                    <thead class="dark:text-white">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">Jenis Surat</th>
                            <th class="py-2 px-4 border-b">Tanggal Masuk</th>
                            <th class="py-2 px-4 border-b">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="dark:text-white">
                        @foreach ($surat as $index => $data)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $surat->firstItem() + $index }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->jenis_surat }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->tanggal_masuk }}</td>
                            <td class="py-2 px-4 border-b">{{ $data->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Section -->
        <div class="mt-4 dark:text-white">
            {{ $surat->links('pagination::tailwind') }}
        </div>
    </div>
</x-layout.content>

<!-- Add Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@1.0.0"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Surat Chart (Line Chart)
        const suratCtx = document.getElementById('suratChart').getContext('2d');
        const suratData = @json($statistics);

        const suratLabels = suratData.map(stat => stat.date);
        const suratValues = suratData.map(stat => stat.total);

        const suratChartOptions = {
            type: 'line',
            data: {
                labels: suratLabels,
                datasets: [{
                    label: 'Jumlah Surat Harian',
                    data: suratValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: '#ffffff', // Warna teks sumbu x
                            maxTicksLimit: 10
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)' // Warna grid sumbu x
                        }
                    },
                    y: {
                        ticks: {
                            color: '#ffffff', // Warna teks sumbu y
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)' // Warna grid sumbu y
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#ffffff' // Warna teks legenda
                        }
                    }
                }
            }
        };

        const suratChart = new Chart(suratCtx, suratChartOptions);

        // Monthly Letters Chart (Bar Chart)
        const monthlyCtx = document.getElementById('monthlyLettersChart').getContext('2d');
        const monthlyData = @json($monthlyStatistics);

        const monthlyLabels = monthlyData.map(stat => {
            const monthNames = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            return monthNames[stat.month - 1];
        });
        const monthlyValues = monthlyData.map(stat => stat.total);

        const monthlyChartOptions = {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Surat Bulanan',
                    data: monthlyValues,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: '#ffffff' // Warna teks sumbu x
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)' // Warna grid sumbu x
                        }
                    },
                    y: {
                        ticks: {
                            color: '#ffffff', // Warna teks sumbu y
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)' // Warna grid sumbu y
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#ffffff' // Warna teks legenda
                        }
                    },
                    annotation: {
                        annotations: {
                            line1: {
                                type: 'line',
                                mode: 'vertical',
                                scaleID: 'x',
                                value: 0,
                                borderColor: 'rgba(255, 255, 255, 0.5)',
                                borderWidth: 2,
                                label: {
                                    content: 'Bulan',
                                    enabled: true,
                                    position: 'top',
                                    color: '#ffffff' // Warna teks label
                                }
                            }
                        }
                    }
                }
            }
        };

        const monthlyLettersChart = new Chart(monthlyCtx, monthlyChartOptions);
    });
</script>
