<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kabar Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">

    <!-- Navbar -->
    <nav class="bg-gray-800 p-6">
        <div class="container mx-auto flex justify-center">
            <ul class="flex space-x-8">
                <li><a href="/kabar-desa" class="hover:text-gray-400">Kabar Desa</a></li>
                <li><a href="/kabar-desa-informasi" class="hover:text-gray-400">Transparansi</a></li>
                <li><a href="/home" class="hover:text-gray-400">Official Portal</a></li>
                <li><a href="#" class="hover:text-gray-400">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="p-10 mx-auto mt-5">
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="col-span-1">
                <h2 class="text-2xl font-bold mb-4">Pemasukan Anggaran</h2>
                <div class="max-h-[400px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
                    <table class="table-auto w-full bg-gray-800 rounded-lg mb-10">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Keterangan</th>
                                <th class="px-4 py-2">Jumlah</th>
                                <th class="px-4 py-2">Jenis Akun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemasukan as $data)
                                <tr>
                                    <td class="border px-4 py-2">{{ $data->tanggal }}</td>
                                    <td class="border px-4 py-2">{{ $data->keterangan }}</td>
                                    <td class="border px-4 py-2">Rp.{{ number_format($data->jumlah, 2, ',', '.') }}</td>
                                    <td class="border px-4 py-2">{{ $data->jenis_akun }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-1">
                <h2 class="text-2xl font-bold mb-4">Pengeluaran Anggaran</h2>
                <div class="max-h-[400px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
                    <table class="table-auto w-full bg-gray-800 rounded-lg">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Keterangan</th>
                                <th class="px-4 py-2">Jumlah</th>
                                <th class="px-4 py-2">Jenis Akun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengeluaran as $data)
                                <tr>
                                    <td class="border px-4 py-2">{{ $data->tanggal }}</td>
                                    <td class="border px-4 py-2">{{ $data->keterangan }}</td>
                                    <td class="border px-4 py-2">Rp.{{ number_format($data->jumlah, 2, ',', '.') }}</td>
                                    <td class="border px-4 py-2">{{ $data->jenis_akun }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
