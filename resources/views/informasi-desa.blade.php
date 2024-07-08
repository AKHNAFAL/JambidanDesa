<x-layout.content>
    <x-layout.navbar>
        <li class = "inline-flex items-center">
            <x-layout.navlink href="/">
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                    </svg>
                </x-slot:icon>
                Informasi Desa
            </x-layout.navlink>
        </li>
    </x-layout.navbar>

    {{-- Card --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 my-5">
        <x-card-general>
            <x-slot:icon>
                <div
                    class="flex justify-center items-center w-14 h-14 bg-blue-300 dark:bg-blue-300 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="stroke-current w-10 h-10 text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path
                            d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
                    </svg>
                </div>
            </x-slot:icon>
            <x-slot:value>
                {{ $jumlahProyek }}
            </x-slot:value>
            Jumlah Proyek Aktif
        </x-card-general>
        <x-card-general>
            <x-slot:icon>
                <div
                    class="flex justify-center items-center w-14 h-14 bg-red-300 dark:bg-red-300 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="stroke-current w-10 h-10 text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </x-slot:icon>
            <x-slot:value>
                {{ $documents_pending }}
            </x-slot:value>
            Dokumen Butuh Penyetujuan
        </x-card-general>
        <x-card-general>
            <x-slot:icon>
                <div
                    class="flex justify-center items-center w-14 h-14 bg-green-300 dark:bg-green-300 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="stroke-current w-10 h-10 text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path fill-rule="evenodd"
                            d="M12 1.5c-1.921 0-3.816.111-5.68.327-1.497.174-2.57 1.46-2.57 2.93V21.75a.75.75 0 0 0 1.029.696l3.471-1.388 3.472 1.388a.75.75 0 0 0 .556 0l3.472-1.388 3.471 1.388a.75.75 0 0 0 1.029-.696V4.757c0-1.47-1.073-2.756-2.57-2.93A49.255 49.255 0 0 0 12 1.5Zm3.53 7.28a.75.75 0 0 0-1.06-1.06l-6 6a.75.75 0 1 0 1.06 1.06l6-6ZM8.625 9a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm5.625 3.375a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

            </x-slot:icon>
            <x-slot:value>
                {{ number_format($currentYearData['persentasePemanfaatan'], 2, ',', '.') }}%
            </x-slot:value>
            Penggunaan Anggaran
        </x-card-general>
        <x-card-general>
            <x-slot:icon>
                <div
                    class="flex justify-center items-center w-14 h-14 bg-yellow-200 dark:bg-yellow-200 rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="stroke-current w-10 h-10 text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path fill-rule="evenodd"
                            d="M5.478 5.559A1.5 1.5 0 0 1 6.912 4.5H9A.75.75 0 0 0 9 3H6.912a3 3 0 0 0-2.868 2.118l-2.411 7.838a3 3 0 0 0-.133.882V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0 0 17.088 3H15a.75.75 0 0 0 0 1.5h2.088a1.5 1.5 0 0 1 1.434 1.059l2.213 7.191H17.89a3 3 0 0 0-2.684 1.658l-.256.513a1.5 1.5 0 0 1-1.342.829h-3.218a1.5 1.5 0 0 1-1.342-.83l-.256-.512a3 3 0 0 0-2.684-1.658H3.265l2.213-7.191Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M12 2.25a.75.75 0 0 1 .75.75v6.44l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 0 1 1.06-1.06l1.72 1.72V3a.75.75 0 0 1 .75-.75Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </x-slot:icon>
            <x-slot:value>
                {{ $jumlahSuratBulanIni }}
            </x-slot:value>
            Surat Masuk
        </x-card-general>
    </div>

    <div class="grid grid-cols-5 gap-4 mt-4">
        {{-- Anggaran --}}
        <div class="col-span-2 p-3 bg-gray-50 dark:bg-[#1E293B] rounded-lg">
            <div class="ml-3 dark:text-white">
                <h2 class="text-gray-300">Sisa Anggaran</h2>
                <span class="text-3xl font-medium"> Rp
                    {{ number_format($currentYearData['sisaAnggaran'], 2, ',', '.') }}</span>
            </div>
            <div id="chart-total-pendapatan" class="">

            </div>
            <div id="chart-total-belanja" class="">

            </div>
        </div>
        {{-- Distribusi Surat --}}
        <div class="col-span-2 bg-gray-50 dark:bg-[#1E293B] rounded-lg">
            <div>
                <h1 class="mt-4 ml-4 font-medium text-2xl dark:text-gray-400">Surat Masuk Bulan Ini</h1>
            </div>
            <div id="chart-distribusi-surat">

            </div>
            
        </div>

        {{-- Trending topics --}}
        <div class="col-span-1 p-3 bg-gray-50 dark:bg-[#1E293B] rounded-lg">
            <h2 class="mb-3 text-xl font-bold dark:text-gray-400">Trending Topics</h2>
            <div id="trending-topics"
                class="dark:text-white max-h-[px] overflow-y-scroll scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
            </div>
            <a href="/kelola-web-user" class="flex items-center justify-center text-blue-400 text-lg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628L12 14.471v2.34c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256l-7.108-4.061C13.555 6.346 12 7.249 12 8.689v2.34L5.055 7.061Z" />
              </svg>
              </a>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-4 mt-4 max-h-400px">
        <div class="col-span-2 p-3 rounded-lg bg-gray-50 dark:bg-[#1E293B] dark:text-white">
            <div id="map-desa">
                <!-- Map Content -->
            </div>
        </div>
        <div class="col-span-3 py-3 bg-gray-50 dark:bg-[#1E293B] dark:text-white rounded-lg">
            <div class="grid grid-cols-2 text-center">
                <h1 class="ml-3 mb-3 text-3xl font-medium">{{ $jumlahProyekTertunda }} Proyek Tertunda</h1>
                <h1 class="ml-3 mb-3 text-3xl font-medium">{{ $jumlahProyekSelesai }} Proyek Selesai</h1>
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
                        @foreach ($proyek as $index => $p)
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
            <a href="/proyek" class="flex items-center justify-center text-blue-400 text-lg mt-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628L12 14.471v2.34c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256l-7.108-4.061C13.555 6.346 12 7.249 12 8.689v2.34L5.055 7.061Z" />
              </svg>
              </a>
        </div>
    </div>

    <div class="mt-5 p-3 rounded-lg bg-gray-50 dark:bg-[#1E293B] dark:text-white">
        {{-- <h2 class="mb-4 mt-4 ml-4 font-medium text-2xl dark:text-white">Perbandingan Nilai Indikator dengan Target SDG<a href="#" class="text-blue-400 text-lg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M5.055 7.06C3.805 6.347 2.25 7.25 2.25 8.69v8.122c0 1.44 1.555 2.343 2.805 1.628L12 14.471v2.34c0 1.44 1.555 2.343 2.805 1.628l7.108-4.061c1.26-.72 1.26-2.536 0-3.256l-7.108-4.061C13.555 6.346 12 7.249 12 8.689v2.34L5.055 7.061Z" />
          </svg>
          </a></h2> --}}
        <div id="chart-sdgs" class="h-[800px]">

        </div>
    </div>


    {{-- Trending Topics --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            displayTrendingTopics();
        });

        function displayTrendingTopics() {
            const result = JSON.parse(localStorage.getItem('result'));
            const trendingTopicsDiv = document.getElementById('trending-topics');

            if (result && result.topics) {
                trendingTopicsDiv.innerHTML = ''; // Kosongkan konten sebelumnya

                result.topics.forEach(topic => {
                    const topicItem = document.createElement('div');
                    topicItem.classList.add('mb-3');
                    topicItem.innerHTML = `
                        <div class="p-2 bg-white dark:bg-gray-800 rounded-lg">
                            <span class="font-medium text-black dark:text-white">${topic.topic}<br></span>
                            <span class="text-gray-500 dark:text-gray-400">${topic.date}</span>
                        </div>
                    `;
                    trendingTopicsDiv.appendChild(topicItem);
                });
            } else {
                trendingTopicsDiv.innerHTML = `
                    <div class="p-2 bg-white dark:bg-gray-800 rounded-lg shadow">
                        <span class="font-bold text-black dark:text-white">No Topic Available</span>
                        <p>Rate limit reached - Or Data Unavailable</p>
                    </div>
                `;
            }
        }
    </script>

    {{-- Script Chart Anggaran --}}
    <script>
        var years = [
            @foreach ($data as $year => $anggaran)
                "{{ $year }}",
            @endforeach
        ].reverse();

        var data = @json($data);
    </script>

    {{-- Script Chart Surat --}}
    <script>
        var options = {
            series: [{
                data: @json($suratCounts)
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                },
                background: 'transparent',
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                    colors: {
                        ranges: [{
                            from: 0,
                            to: 1000,
                            color: '#00E396' // Light green for a minimal look
                        }]
                    }
                }
            },
            dataLabels: {
                enabled: true
            },
            xaxis: {
                categories: @json($jenisSurat),
                labels: {
                    style: {
                        colors: '#fff', // White labels for dark mode
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#fff', // White labels for dark mode
                        fontSize: '12px'
                    }
                }
            },
            grid: {
                borderColor: '#444', // Dark grid lines for contrast
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: false
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-distribusi-surat"), options);
        chart.render();
    </script>

    {{-- Script Map Desa --}}
    <script>
        var map = L.map('map-desa').setView([-7.8527, 110.4183], 14); // Sesuaikan koordinat dan zoom level

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Masukkan GeoJSON dari PHP ke JavaScript
        var geojson = {!! $geojson !!};

        function getColor(d) {
            return d > 1000 ? '#800026' :
                d > 500 ? '#BD0026' :
                d > 200 ? '#E31A1C' :
                d > 100 ? '#FC4E2A' :
                d > 50 ? '#FD8D3C' :
                d > 20 ? '#FEB24C' :
                d > 10 ? '#FED976' :
                '#FFEDA0';
        }

        function style(feature) {
            return {
                fillColor: getColor(feature.properties.jumlah_pen),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        function onEachFeature(feature, layer) {
            if (feature.properties && feature.properties.pedukuhan) {
                layer.bindTooltip("Pedukuhan: " + feature.properties.pedukuhan + "<br>Jumlah Penduduk: " + feature
                    .properties.jumlah_pen);
            }
        }

        L.geoJson(geojson, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

        // Menambahkan kontrol legenda
        var legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 10, 20, 50, 100, 200, 500, 1000],
                labels = [];

            // Loop through our density intervals and generate a label with a colored square for each interval
            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
            }

            return div;
        };

        legend.addTo(map);

        // Menambahkan kontrol informasi
        var info = L.control();

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info'); // Create a div with a class "info"
            this.update();
            return this._div;
        };

        info.update = function(props) {
            this._div.innerHTML = '<h4>Jumlah Populasi Tiap Dusun</h4>' + (props ?
                '<b>' + props.pedukuhan + '</b><br />' + props.jumlah_pen + ' people' :
                'Hover salah satu wilayah');
        };

        info.addTo(map);

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }

            info.update(layer.feature.properties);
        }

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        var geojson = L.geoJson(geojson, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);
    </script>

    {{-- Script Chart SDGs --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                chart: {
                    type: 'line',
                    height: 350,
                },
                series: @json($formattedDataSDGs),
                xaxis: {
                    categories: @json($categoriesSDGs),
                    title: {
                        text: 'SDG Targets',
                        style: {
                            color: '#ffffff'  // White color for title
                        }
                    },
                    labels: {
                        style: {
                            colors: Array(@json($categoriesSDGs).length).fill('#ffffff'),  // White color for all labels
                            background: '#2c2c2c',  // Adding a slight background to make labels stand out
                            fontSize: '12px',
                            fontWeight: 'bold'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Indicator Values',
                        style: {
                            color: '#ffffff'  // White color for title
                        }
                    },
                    labels: {
                        style: {
                            colors: '#ffffff',  // White color for all labels
                            background: '#2c2c2c',  // Adding a slight background to make labels stand out
                            fontSize: '12px',
                            fontWeight: 'bold'
                        }
                    }
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    labels: {
                        colors: '#ffffff',  // White color for legend
                        useSeriesColors: false
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-sdgs"), options);
            chart.render();
        });
    </script> --}}

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/heatmap.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('chart-sdgs', {
                chart: {
                    type: 'heatmap',
                    plotBorderWidth: 1,
                    backgroundColor: '#1E293B'
                },
                title: {
                    text: 'SDG Indicator Values Comparison',
                    style: {
                        color: '#ecf0f1'
                    }
                },
                xAxis: {
                    categories: @json($years),
                    labels: {
                        style: {
                            color: '#ecf0f1'
                        }
                    }
                },
                yAxis: {
                    categories: @json($categoriesSDGs),
                    title: null,
                    labels: {
                        style: {
                            color: '#ecf0f1'
                        }
                    }
                },
                colorAxis: {
                    min: 0,
                    minColor: '#86BCE4',
                    maxColor: '#06476F'
                },
                legend: {
                    align: 'right',
                    layout: 'vertical',
                    margin: 0,
                    verticalAlign: 'top',
                    y: 25,
                    symbolHeight: 280,
                    itemStyle: {
                        color: '#ecf0f1'
                    }
                },
                series: [{
                    name: 'SDG Indicators',
                    borderWidth: 1,
                    data: @json($formattedDataSDGs),
                    dataLabels: {
                        enabled: true,
                        color: '#ecf0f1',
                        style: {
                            textOutline: 'none',
                            fontSize: '15px',
                            fontWeight: 'bold'
                        }
                    },
                    colsize: 1, // Adjust the column size
                    rowsize: 1 // Adjust the row size
                }],
                tooltip: {
                    backgroundColor: '#1E293B',
                    style: {
                        color: '#ecf0f1'
                    },
                    formatter: function () {
                        return '<b>' + this.series.yAxis.categories[this.point.y] + '</b><br>' +
                            'Year: <b>' + this.series.xAxis.categories[this.point.x] + '</b><br>' +
                            'Value: <b>' + this.point.value + '</b>';
                    }
                }
            });
        });
    </script>
    
    
</x-layout.content>
