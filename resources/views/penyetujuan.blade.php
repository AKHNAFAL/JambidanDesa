<x-layout.content>
    <x-layout.navbar>
        <li class = "inline-flex items-center">
            <x-layout.navlink>
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg> 
                </x-slot:icon>
                Penyetujuan
            </x-layout.navlink>
        </li>
    </x-layout.navbar>

    <div class = "">
        {{-- <div class="mt-4 flex justify-center">
            <table class="w-full text-md bg-white dark:bg-gray-800 dark:text-white shadow-md rounded mb-4 ">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nomor</th>
                        <th class="text-left p-3 px-5">Nama Kokumen</th>
                        <th class="text-left p-3 px-5">File</th>
                        <th></th>
                    </tr>
                    <tr class="border-b hover:bg-orange-100 bg-gray-100 dark:bg-gray-800 dark:text-white">
                        <td class="p-3 px-5">1</td>
                        <td class="p-3 px-5">Dokumen Anggaran tahun 2024</td>
                        <td class="p-3 px-5">
                            01_45_2024.docx
                        </td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Setujui</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Tolak</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
        {{-- Pending --}}
        <div class="mx-auto mt-4">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        {{-- <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form> --}}
                        <h1 class="p-2 font-bold text-gray-900 whitespace-nowrap dark:text-white dark:bg-yellow-600 rounded-lg flex items-center justify-center">PERLU PENYETUJUAN</h1>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="/tambahkan-file" id="createProductModalButton" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambahkan File
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-3">Nama Dokumen</th>
                                <th scope="col" class="px-4 py-3">Tipe Dokumen</th>
                                <th scope="col" class="px-4 py-3">Tanggal Unggah</th>
                                <th scope="col" class="px-4 py-3">File</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents_pending as $document)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3">{{ $document->id }}</th>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $document->document_name }}</td>
                                <td class="px-4 py-3">{{ $document->document_type }}</td>
                                <td class="px-4 py-3 max-w-[12rem] truncate">{{ $document->upload_date }}</td>
                                <td class="px-4 py-3">
                                    <a href="#">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                          </svg>
                                    </a>
                                  </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    {{-- <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Setujui</button>
                                    <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Tolak</button> --}}
                                    <form action="{{ route('penyetujuan.updateStatus', ['id' => $document->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="Approved">
                                        <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Setujui</button>
                                    </form>
                                    <form action="{{ route('penyetujuan.updateStatus', ['id' => $document->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="status" value="Rejected">
                                        <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Approved --}}
        <div class="mx-auto mt-4">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <h1 class="p-2 font-bold text-gray-900 whitespace-nowrap dark:text-white dark:bg-green-700 rounded-lg flex items-center justify-center">DISETUJUI</h1>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-3">Nama Dokumen</th>
                                <th scope="col" class="px-4 py-3">Tipe Dokumen</th>
                                <th scope="col" class="px-4 py-3">Tanggal Unggah</th>
                                <th scope="col" class="px-4 py-3">File</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents_approved as $document)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3">{{ $document->id }}</th>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $document->document_name }}</td>
                                <td class="px-4 py-3">{{ $document->document_type }}</td>
                                <td class="px-4 py-3 max-w-[12rem] truncate">{{ $document->upload_date }}</td>
                                <td class="px-4 py-3">
                                    <a href="#">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                          </svg>
                                    </a>
                                  </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    {{-- <button type="button" class="mr-3 w-[105px] text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Kembalikan</button> --}}
                                    <form action="{{ route('penyetujuan.updateStatus', ['id' => $document->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="Pending">
                                        <button type="submit" class="mr-3 text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Ubah</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Rejected --}}
        <div class="mx-auto mt-4">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <h1 class="p-2 font-bold text-gray-900 whitespace-nowrap dark:text-white dark:bg-red-700 rounded-lg flex items-center justify-center">DITOLAK</h1>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">ID</th>
                                <th scope="col" class="px-4 py-3">Nama Dokumen</th>
                                <th scope="col" class="px-4 py-3">Tipe Dokumen</th>
                                <th scope="col" class="px-4 py-3">Tanggal Unggah</th>
                                <th scope="col" class="px-4 py-3">File</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents_rejected as $document)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3">{{ $document->id }}</th>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $document->document_name }}</td>
                                <td class="px-4 py-3">{{ $document->document_type }}</td>
                                <td class="px-4 py-3 max-w-[12rem] truncate">{{ $document->upload_date }}</td>
                                <td class="px-4 py-3">
                                    <a href="#">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                          </svg>
                                    </a>
                                  </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <form action="{{ route('penyetujuan.updateStatus', ['id' => $document->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="Pending">
                                        <button type="submit" class="mr-3 text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Ubah</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.content>
