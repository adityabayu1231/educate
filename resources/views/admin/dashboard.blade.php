@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-9xl mx-auto">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <!-- Background Image as Cover -->
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <!-- Content: Welcome Message and Button -->
            <div class="relative flex justify-between w-full">
                <!-- Left Section: Welcome Message -->
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Welcome back, Admin 👋</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>

                <!-- Right Section: Circular Button with Arrow -->
                <div class="relative p-4 flex flex-col items-end">
                    <button
                        class="bg-white text-blue-600 rounded-full p-3 shadow-lg hover:bg-blue-600 hover:text-white transition duration-300 mb-2">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-2 mb-8">
            <!-- Card (Sesi Berjalan) -->
            <div class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden h-full min-h-[250px]">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Sesi Berjalan</h2>
                    </header>
                    <div class="flex items-center justify-center h-full py-6">
                        <div class="text-7xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                            280
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card (Sesi Habis) -->
            <div class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden h-full min-h-[250px]">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Sesi Habis</h2>
                    </header>
                    <div class="flex items-center justify-center h-full py-6">
                        <div class="text-7xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                            167
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Date Search -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-2 mb-8">
            <!-- Input Tanggal Awal -->
            <div class="relative w-full sm:w-64">
                <i class="fas fa-calendar-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="date"
                    class="form-input px-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Start Date">
            </div>

            <!-- Input Tanggal Akhir -->
            <div class="relative w-full sm:w-64">
                <i class="fas fa-calendar-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="date"
                    class="form-input px-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="End Date">
            </div>

            <!-- Tombol Search -->
            <button
                class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 flex items-center justify-center w-full sm:w-auto">
                <i class="fas fa-search mr-2"></i>
                Search
            </button>
        </div>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            <table
                class="min-w-full bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 border-separate border-spacing-0 shadow-lg rounded-lg">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            No</th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            Nama Siswa</th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            Tanggal</th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            Waktu</th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            Kelas</th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            Mapel</th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            Materi</th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium uppercase tracking-wider">
                            Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy Data -->
                    <tr
                        class="transition-transform transform hover:bg-indigo-100 dark:hover:bg-indigo-900 duration-200 ease-in-out">
                        <td class="px-6 py-4 border-b border-gray-200 text-center">1</td>
                        <td class="px-6 py-4 border-b border-gray-200">Ahmad Fauzi</td>
                        <td class="px-6 py-4 border-b border-gray-200">2024-09-13</td>
                        <td class="px-6 py-4 border-b border-gray-200">08:30</td>
                        <td class="px-6 py-4 border-b border-gray-200">XII IPA 1</td>
                        <td class="px-6 py-4 border-b border-gray-200">Matematika</td>
                        <td class="px-6 py-4 border-b border-gray-200">Trigonometri</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-center">90</td>
                    </tr>
                    <tr
                        class="transition-transform transform hover:bg-indigo-100 dark:hover:bg-indigo-900 duration-200 ease-in-out">
                        <td class="px-6 py-4 border-b border-gray-200 text-center">2</td>
                        <td class="px-6 py-4 border-b border-gray-200">Nurul Hidayah</td>
                        <td class="px-6 py-4 border-b border-gray-200">2024-09-13</td>
                        <td class="px-6 py-4 border-b border-gray-200">09:00</td>
                        <td class="px-6 py-4 border-b border-gray-200">XII IPA 2</td>
                        <td class="px-6 py-4 border-b border-gray-200">Fisika</td>
                        <td class="px-6 py-4 border-b border-gray-200">Dinamika</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-center">85</td>
                    </tr>
                    <tr
                        class="transition-transform transform hover:bg-indigo-100 dark:hover:bg-indigo-900 duration-200 ease-in-out">
                        <td class="px-6 py-4 border-b border-gray-200 text-center">3</td>
                        <td class="px-6 py-4 border-b border-gray-200">Budi Santoso</td>
                        <td class="px-6 py-4 border-b border-gray-200">2024-09-14</td>
                        <td class="px-6 py-4 border-b border-gray-200">08:30</td>
                        <td class="px-6 py-4 border-b border-gray-200">XII IPA 1</td>
                        <td class="px-6 py-4 border-b border-gray-200">Kimia</td>
                        <td class="px-6 py-4 border-b border-gray-200">Reaksi Kimia</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-center">92</td>
                    </tr>
                    <tr
                        class="transition-transform transform hover:bg-indigo-100 dark:hover:bg-indigo-900 duration-200 ease-in-out">
                        <td class="px-6 py-4 border-b border-gray-200 text-center">4</td>
                        <td class="px-6 py-4 border-b border-gray-200">Siti Aisyah</td>
                        <td class="px-6 py-4 border-b border-gray-200">2024-09-14</td>
                        <td class="px-6 py-4 border-b border-gray-200">09:00</td>
                        <td class="px-6 py-4 border-b border-gray-200">XII IPA 2</td>
                        <td class="px-6 py-4 border-b border-gray-200">Biologi</td>
                        <td class="px-6 py-4 border-b border-gray-200">Sistem Pencernaan</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-center">88</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
