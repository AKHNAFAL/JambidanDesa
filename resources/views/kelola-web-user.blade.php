<x-layout.content>
    <x-layout.navbar>
        <li class = "inline-flex items-center">
            <x-layout.navlink>
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                    </svg>
                </x-slot:icon>
                Kelola Web User
            </x-layout.navlink>
        </li>
    </x-layout.navbar>

    <div class="grid grid-cols-2 gap-4 mt-4">
        <div class="col-span-1 bg-white dark:bg-[#1E293B] pb-4 rounded-lg">
            <div class="mb-5">
                @if (session('success'))
                    <div id="success-alert" class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('broadcast.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <textarea placeholder="Beri pengumuman kepada warga" id="isi_broadcast" name="isi_broadcast" rows="4"
                            class="w-full p-2 rounded bg-gray-700 text-white" required></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim</button>
                </form>
            </div>
            <div
                class="max-h-[660px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-900 scrollbar-track-gray-300 dark:scrollbar-thumb-gray-700 dark:scrollbar-track-gray-600">
                <ul>
                    @foreach ($komentar as $komentar)
                        <li class="mb-4 px-4 pb-4 dark:text-white border-b-8 border-white dark:border-[#282F40]">
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
        {{-- <div class="col-span-1 grid grid-cols-2 gap-4"> --}}
        <div class="col-span-1 bg-white dark:bg-[#1E293B] dark:text-white p-4 rounded-lg">
            <div class="h-auto">
                <h2 class="font-medium text-xl mb-3">Trending Topic</h2>
                {{-- <ul>
                    @if ($result !== 'ERROR')
                        @foreach ($result['topics'] as $topic)
                            <li class="mb-5">
                                <div x-data="{ open: false }" class="flex flex-col">
                                    <!-- Title for dropdown -->
                                    <div @click="open = !open"
                                        class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                                        <div class="flex items-center">
                                            <span
                                                class="font-bold mr-2 text-black dark:text-white">{{ $topic['topic'] }}</span>
                                            <span class="text-gray-500 dark:text-gray-400">{{ $topic['date'] }}</span>
                                        </div>
                                        <svg :class="{ 'transform rotate-180': open }"
                                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-300 ease-in-out"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                    <!-- Dropdown content -->
                                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90"
                                        class="mt-2 p-3 rounded-lg dark:bg-white dark:bg-opacity-5">
                                        @foreach ($topic['breakdown'] as $point)
                                            <p class="p-3 mb-2 border-b-2 border-gray-600 text-black dark:text-white">
                                                {{ $point }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="mb-5">
                            <div
                                class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                                <div class="flex items-center">
                                    <span class="font-bold mr-2 text-black dark:text-white">No Topic Available</span>
                                    <p>Rate limit reached - Wait for a minute</p>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul> --}}
                <div id="loading" style="display: none;" class="hidden m-20">
                    <div class="flex items-center justify-center space-x-2">
                        <div class="w-4 h-4 rounded-full bg-white animate-bounce"></div>
                        <div class="w-4 h-4 rounded-full bg-white animate-bounce animation-delay-200"></div>
                        <div class="w-4 h-4 rounded-full bg-white animate-bounce animation-delay-400"></div>
                    </div>
                </div>
                <ul id="topics-list">

                </ul>
                <button id="fetch-button" class="p-2 bg-blue-500 text-white rounded">Update Topics</button>
            </div>
        </div>

    </div>

    {{-- Update tiap button ditekan --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan data dari local storage saat halaman dimuat
            displayTopicsFromLocalStorage();

            // Tambahkan event listener ke tombol
            document.getElementById('fetch-button').addEventListener('click', function() {
                // Tampilkan indikator loading
                document.getElementById('loading').style.display = 'block';
                document.getElementById('topics-list').innerHTML = '';

                // Ambil data JSON dari endpoint
                fetch('/get-topics')
                    .then(response => response.json())
                    .then(data => {
                        // Simpan data ke local storage
                        localStorage.setItem('result', JSON.stringify(data));
                        // Tampilkan data ke view
                        displayTopicsFromLocalStorage();
                        // Sembunyikan indikator loading
                        document.getElementById('loading').style.display = 'none';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        displayError();
                        // Sembunyikan indikator loading
                        document.getElementById('loading').style.display = 'none';
                    });
            });
        });

        function displayTopicsFromLocalStorage() {
            const result = JSON.parse(localStorage.getItem('result'));
            const topicsList = document.getElementById('topics-list');
            topicsList.innerHTML = ''; // Kosongkan konten sebelumnya

            if (result && result.topics) {
                result.topics.forEach(topic => {
                    const topicItem = document.createElement('li');
                    topicItem.classList.add('mb-5');
                    topicItem.innerHTML = `
                        <div x-data="{ open: false }" class="flex flex-col">
                            <!-- Title for dropdown -->
                            <div @click="open = !open"
                                class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                                <div class="flex items-center">
                                    <span class="font-bold mr-2 text-black dark:text-white">${topic.topic}</span>
                                    <span class="text-gray-500 dark:text-gray-400">${topic.date}</span>
                                </div>
                                <svg :class="{ 'transform rotate-180': open }"
                                    class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-300 ease-in-out"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            <!-- Dropdown content -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="mt-2 p-3 rounded-lg dark:bg-white dark:bg-opacity-5">
                                ${topic.breakdown.map(point => `<p class="p-3 mb-2 border-b-2 border-gray-600 text-black dark:text-white">${point}</p>`).join('')}
                            </div>
                        </div>
                    `;
                    topicsList.appendChild(topicItem);
                });
            } else {
                displayError();
            }
        }

        function displayError() {
            const topicsList = document.getElementById('topics-list');
            const errorItem = document.createElement('li');
            errorItem.classList.add('mb-5');
            errorItem.innerHTML = `
                <div
                    class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                    <div class="flex items-center">
                        <span class="font-bold mr-2 text-black dark:text-white">No Topic Available</span>
                        <p>Rate limit reached - Or Data Unavailable</p>
                    </div>
                </div>
            `;
            topicsList.appendChild(errorItem);
        }
    </script>

    {{-- Ambil dari local storage --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const result = localStorage.getItem('result');
            if (result) {
                const data = JSON.parse(result);
                if (data !== 'ERROR') {
                    displayTopics(data.topics);
                } else {
                    displayError();
                }
            } else {
                fetchAndStoreResult();
            }
        });

        function fetchAndStoreResult() {
            fetch('/get-topics')
                .then(response => response.json())
                .then(data => {
                    localStorage.setItem('result', JSON.stringify(data));
                    displayTopics(data.topics);
                })
                .catch(error => {
                    console.error('Error:', error);
                    displayError();
                });
        }

        function displayTopics(topics) {
            const topicsList = document.getElementById('topics-list');
            topics.forEach(topic => {
                const topicItem = document.createElement('li');
                topicItem.classList.add('mb-5');
                topicItem.innerHTML = `
                    <div x-data="{ open: false }" class="flex flex-col">
                        <div @click="open = !open"
                            class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                            <div class="flex items-center">
                                <span class="font-bold mr-2 text-black dark:text-white">${topic.topic}</span>
                                <span class="text-gray-500 dark:text-gray-400">${topic.date}</span>
                            </div>
                            <svg :class="{ 'transform rotate-180': open }"
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-300 ease-in-out"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="mt-2 p-3 rounded-lg dark:bg-white dark:bg-opacity-5">
                            ${topic.breakdown.map(point => `<p class="p-3 mb-2 border-b-2 border-gray-600 text-black dark:text-white">${point}</p>`).join('')}
                        </div>
                    </div>
                `;
                topicsList.appendChild(topicItem);
            });
        }

        function displayError() {
            const topicsList = document.getElementById('topics-list');
            const errorItem = document.createElement('li');
            errorItem.classList.add('mb-5');
            errorItem.innerHTML = `
                <div
                    class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                    <div class="flex items-center">
                        <span class="font-bold mr-2 text-black dark:text-white">No Topic Available</span>
                        <p>Rate limit reached - Wait for a minute</p>
                    </div>
                </div>
            `;
            topicsList.appendChild(errorItem);
        }
    </script> --}}


    {{-- Langsung generate --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil data JSON dari endpoint
            fetch('/get-topics')
                .then(response => response.json())
                .then(data => {
                    // Periksa apakah hasilnya adalah ERROR
                    if (data !== 'ERROR') {
                        displayTopics(data.topics);
                    } else {
                        displayError();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    displayError();
                });
        });

        function displayTopics(topics) {
            const topicsList = document.getElementById('topics-list');
            topics.forEach(topic => {
                const topicItem = document.createElement('li');
                topicItem.classList.add('mb-5');
                topicItem.innerHTML = `
                    <div x-data="{ open: false }" class="flex flex-col">
                        <!-- Title for dropdown -->
                        <div @click="open = !open"
                            class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                            <div class="flex items-center">
                                <span class="font-bold mr-2 text-black dark:text-white">${topic.topic}</span>
                                <span class="text-gray-500 dark:text-gray-400">${topic.date}</span>
                            </div>
                            <svg :class="{ 'transform rotate-180': open }"
                                class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-300 ease-in-out"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <!-- Dropdown content -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="mt-2 p-3 rounded-lg dark:bg-white dark:bg-opacity-5">
                            ${topic.breakdown.map(point => `<p class="p-3 mb-2 border-b-2 border-gray-600 text-black dark:text-white">${point}</p>`).join('')}
                        </div>
                    </div>
                `;
                topicsList.appendChild(topicItem);
            });
        }

        function displayError() {
            const topicsList = document.getElementById('topics-list');
            const errorItem = document.createElement('li');
            errorItem.classList.add('mb-5');
            errorItem.innerHTML = `
                <div
                    class="flex items-center justify-between cursor-pointer p-3 bg-gray-200 dark:bg-white dark:bg-opacity-5 rounded-lg transition duration-300 ease-in-out">
                    <div class="flex items-center">
                        <span class="font-bold mr-2 text-black dark:text-white">No Topic Available</span>
                        <p>Rate limit reached - Wait for a minute</p>
                    </div>
                </div>
            `;
            topicsList.appendChild(errorItem);
        }
    </script> --}}

</x-layout.content>
