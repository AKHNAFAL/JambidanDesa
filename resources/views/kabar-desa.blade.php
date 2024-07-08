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
    <div class="container mx-auto mt-5">
        <div class="flex">
            <!-- Kolom 1 -->
            <div class="w-2/3 bg-gray-800 p-5 m-3">
                @if (session('success'))
                    <div id="success-alert" class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="/submit_comment" method="post">
                    @csrf
                    <div class="mb-4">
                        <textarea placeholder="Apa yang sedang terjadi?" id="comment" name="comment" rows="4"
                            class="w-full p-2 rounded bg-gray-700 text-white" required></textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim</button>
                </form>

                <div class="bg-white dark:bg-[#1E293B] py-4 rounded-lg">
                    <ul>
                        @foreach ($post_komentar as $komentar)
                            <li class="mb-4 px-4 pb-4 dark:text-white border-b-2 border-gray-500 dark:border-gray-500">
                                <div class="flex items-center">
                                    <span class="font-bold mr-2">Anonim</span>
                                    <span class="text-gray-500 dark:text-gray-400">{{ $komentar->tanggal_post }}</span>
                                </div>
                                <div class="mt-2">{{ $komentar->komentar }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Kolom 2 -->
            <div class="w-1/3">
                <div class="bg-gray-800 p-5 m-3">
                    <h2 class="text-white text-2xl font-semibold mb-4">Dari Kepala Desa, </h2>
                    <div class="text-white mt-2">
                        @if($broadcast)
                            <div id="typewriter" class="text-lg"></div>
                            <small class="text-gray-400">Dibuat pada: {{ $broadcast->created_at }}</small>
                        @else
                            <p class="text-lg">Tidak ada broadcast terbaru.</p>
                        @endif
                    </div>
                </div>
                <div class="bg-gray-800 p-5 m-3">
                    <h2 class="text-white text-2xl">Topik Untuk Kamu</h2>
                    <div id="trending-topics" class="mt-5">
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

{{-- treinding topic --}}
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
                    <p>Rate limit reached - Wait for a minute</p>
                </div>
            `;
        }
    }
</script>

{{-- success alert --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 5000); // 5000 milidetik = 5 detik
        }
    });
</script>

{{-- TypeWriting --}}
<script src="https://cdn.jsdelivr.net/npm/typewriter-effect/dist/core.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var broadcastText = @json($broadcast ? $broadcast->isi_broadcast : '');
        if (broadcastText) {
            var app = document.getElementById('typewriter');

            var typewriter = new Typewriter(app, {
                loop: false,
                delay: 75,
            });

            typewriter
                .typeString(broadcastText)
                .start();
        }
    });
</script>

</html>
