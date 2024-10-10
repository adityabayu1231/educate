@section('title', 'Teacher Schedule')
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Judul Halaman -->
            <p class="text-2xl font-semibold">Teacher Schedule ✨</p>

            <!-- Baris Pertama: Tanggal dan Search Button -->
            <div class="flex justify-between items-center my-4">
                <div class="flex space-x-4 items-center">
                    <!-- Input Tanggal Awal dengan Icon Search -->
                    <div class="relative">
                        <span class="absolute left-2 top-2 text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="date" placeholder="mm/dd/yyyy" class="border rounded-md px-8 py-2 pl-8"
                            style="appearance: none;" />
                    </div>
                    <!-- Input Tanggal Akhir dengan Icon Calendar -->
                    <div class="relative">
                        <span class="absolute left-2 top-2 text-gray-400">
                            <i class="fas fa-calendar-alt"></i>
                        </span>
                        <input type="date" placeholder="mm/dd/yyyy" class="border rounded-md px-8 py-2 pl-8"
                            style="appearance: none;" />
                    </div>
                    <button class="bg-blue-500 text-white rounded-md px-4 py-2">Search</button>
                </div>

                <div>
                    <select class="border rounded-md px-3 py-2">
                        <option>All</option>
                        <option>Bulan Ini</option>
                        <option>Minggu Ini</option>
                        <option>Hari Ini</option>
                    </select>
                </div>
            </div>

            <!-- Card untuk Tabel -->
            <div class="bg-white shadow-lg rounded-lg p-6 my-4">
                <h2 class="text-lg font-semibold flex items-center">
                    <i class="fas fa-calendar-alt mr-2"></i> My Schedule
                </h2>
                <hr class="mb-2 border-t-2 border-gray-300">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 text-left">
                                <th class="py-2 px-4">Time</th>
                                <th class="py-2 px-4">Mapel</th>
                                <th class="py-2 px-4">Materi</th>
                                <th class="py-2 px-4">E-Module</th>
                                <th class="py-2 px-4">Location</th>
                                <th class="py-2 px-4">Fee</th>
                                <th class="py-2 px-4">Validations</th>
                                <th class="py-2 px-4">Google Maps</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh Baris Data -->
                            <tr class="hover:bg-gray-100 cursor-pointer">
                                <td class="border-t py-2 px-4 whitespace-nowrap">3:00 - 15:00 WIB</td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Bahasa Indonesia</td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Antonim</td>
                                <td class="border-t py-2 px-4">
                                    <button class="bg-blue-500 text-white rounded-md px-2">Lihat</button>
                                </td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Cibubur</td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Rp. 150.000</td>
                                <td class="border-t py-2 px-4">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-l-md hover:bg-blue-600">
                                            Accept
                                        </button>
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-500 border border-red-500 rounded-r-md hover:bg-red-600">
                                            Revise
                                        </button>
                                    </div>
                                </td>
                                <td class="border-t py-2 px-4">
                                    <button class="bg-blue-500 text-white rounded-md px-2">Lihat</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100 cursor-pointer">
                                <td class="border-t py-2 px-4 whitespace-nowrap">3:00 - 15:00 WIB</td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Bahasa Indonesia</td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Antonim</td>
                                <td class="border-t py-2 px-4">
                                    <button class="bg-blue-500 text-white rounded-md px-2">Lihat</button>
                                </td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Cimanggis</td>
                                <td class="border-t py-2 px-4 whitespace-nowrap">Rp. 150.000</td>
                                <td class="border-t py-2 px-4">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-l-md hover:bg-blue-600">
                                            Accept
                                        </button>
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-red-500 border border-red-500 rounded-r-md hover:bg-red-600">
                                            Revise
                                        </button>
                                    </div>
                                </td>
                                <td class="border-t py-2 px-4">
                                    <button class="bg-blue-500 text-white rounded-md px-2">Lihat</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
