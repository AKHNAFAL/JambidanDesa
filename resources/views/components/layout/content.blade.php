<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Manajemen Desa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <script src="path/to/chartjs/dist/chart.umd.js"></script> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map-desa {
            height: 375px;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            color: black;
            /* Menambahkan properti warna hitam */
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="body bg-[#f4f4f4] dark:bg-[#0f172ae4] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
    <x-layout.header></x-layout.header>
    <x-layout.sidebar></x-layout.sidebar>

    <!-- CONTENT -->
    <div class="content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
        {{ $slot }}
    </div>
</body>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/info-desa-chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js" defer></script>

{{-- <script src="{{ asset('js/onload.js') }}"></script> --}}

</html>
