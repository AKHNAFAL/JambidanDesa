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
                Penyetujuan
            </x-layout.navlink>
            <x-layout.navlink>
                <x-slot:icon>
                </x-slot:icon>
                Tambahkan File
            </x-layout.navlink>   
        </li>
    </x-layout.navbar>

    <div class="bg-[#1E293B] p-8 mt-4 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-white">Ajukan Dokumen</h2>
        <form action="/upload" method="POST" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label for="document_name" class="block text-sm font-medium text-gray-300">Document Name</label>
                <input type="text" id="document_name" name="document_name" class="mt-1 p-2 bg-gray-700 text-white rounded-md w-full border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="document_type" class="block text-sm font-medium text-gray-300">Document Type</label>
                <select id="document_type" name="document_type" class="mt-1 p-2 bg-gray-700 text-white rounded-md w-full border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="DPA">DPA</option>
                    <option value="DPPA">DPPA</option>
                    <option value="DPAL">DPAL</option>
                    <option value="RKPD">RKPD</option>
                    <option value="RAPB">RAPB</option>
                    <option value="SPP">SPP</option>
                </select>
            </div>
            <div>
                <label for="upload_date" class="block text-sm font-medium text-gray-300">Upload Date</label>
                <input type="date" id="upload_date" name="upload_date" class="mt-1 p-2 bg-gray-700 text-white rounded-md w-full border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="file_path" class="block text-sm font-medium text-gray-300">File</label>
                <input type="file" id="file_path" name="file_path" class="mt-1 p-2 bg-gray-700 text-white rounded-md w-full border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Upload</button>
            </div>
        </form>
    </div>
</x-layout.content>
