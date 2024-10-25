@extends('layouts.admin')

@section('title', 'Assign Paket Soal')

@section('content')
    <div class="container mx-auto px-3 py-3">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-6">
            <!-- Background Image as Cover -->
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <!-- Content: Welcome Message and Button -->
            <div class="relative flex justify-between w-full">
                <!-- Left Section: Welcome Message -->
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Edu Center ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Data Program Siswa</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>
        <!-- Header Row (Back button and Dropdowns) -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
            <!-- Back Button di Pojok Kiri -->
            <div class="col-span-12 md:col-span-6 flex justify-start md:justify-start">
                <a href="{{ route('admin.assign-soal.index') }}" class="text-blue-500 text-sm flex items-center">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ml-2">Back</span>
                </a>
            </div>

            <!-- Dropdowns di Pojok Kanan -->
            <div class="col-span-12 md:col-span-6 flex justify-end space-x-2 mt-4 md:mt-0">
                <!-- Dropdown ALL STUDENT -->
                <div class="relative inline-block text-left w-full md:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-users text-gray-500"></i> <!-- Icon for All Students -->
                    </div>
                    <select
                        class="inline-flex items-center w-full md:w-auto pl-10 pr-3 py-1 bg-gray-200 text-sm rounded-md">
                        <option value="all_students">ALL STUDENT</option>
                        <option value="student_1">Student 1</option>
                        <option value="student_2">Student 2</option>
                        <option value="student_3">Student 3</option>
                    </select>
                </div>

                <!-- Dropdown ALL BRAND -->
                <div class="relative inline-block text-left w-full md:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-briefcase text-gray-500"></i> <!-- Icon for All Brands -->
                    </div>
                    <select
                        class="inline-flex items-center w-full md:w-auto pl-10 pr-3 py-1 bg-gray-200 text-sm rounded-md">
                        <option value="all_brands">ALL BRAND</option>
                        <option value="brand_1">Brand 1</option>
                        <option value="brand_2">Brand 2</option>
                        <option value="brand_3">Brand 3</option>
                    </select>
                </div>
            </div>
        </div>


        <!-- Form Section (6 dari 12 kolom) -->
        <div class="grid grid-cols-12 gap-4 mt-6">
            <div class="col-span-12 lg:col-span-6 mx-auto">
                <form class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input type="text" id="brand"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                            <input type="text" id="nama_siswa"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="program" class="block text-sm font-medium text-gray-700">Program</label>
                            <input type="text" id="program"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="sub_program" class="block text-sm font-medium text-gray-700">Sub Program</label>
                            <input type="text" id="sub_program"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="waktu_pengerjaan" class="block text-sm font-medium text-gray-700">Waktu
                                Pengerjaan</label>
                            <input type="text" id="waktu_pengerjaan"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="nama_paket" class="block text-sm font-medium text-gray-700">Nama Paket Soal</label>
                            <input type="text" id="nama_paket" readonly
                                class="mt-1 block w-full border border-gray-300 rounded-md cursor-pointer">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="nama_sesi" class="block text-sm font-medium text-gray-700">Nama Sesi</label>
                            <input type="text" id="nama_sesi"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                            + Tambahkan
                        </button>
                    </div>
                </form>
            </div>
            <!-- Modal Popup -->
            <div id="modalPaketSoal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
                <div class="bg-white p-6 rounded-md w-full max-w-3xl">
                    <h2 class="text-lg font-bold mb-4">Pilih Paket Soal</h2>

                    <table id="paketTable" class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-gray-300 md:border-none md:table-row">
                                <th class="block md:table-cell">Pilih</th>
                                <th class="block md:table-cell">ID Paket</th>
                                <th class="block md:table-cell">Nama Paket</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                            <tr class="border border-gray-300 md:border-none md:table-row">
                                <td class="block md:table-cell"><input type="checkbox" value="1" class="select-paket">
                                </td>
                                <td class="block md:table-cell">1</td>
                                <td class="block md:table-cell">Drilling Soal</td>
                            </tr>
                            <tr class="border border-gray-300 md:border-none md:table-row">
                                <td class="block md:table-cell"><input type="checkbox" value="2" class="select-paket">
                                </td>
                                <td class="block md:table-cell">2</td>
                                <td class="block md:table-cell">Try Out</td>
                            </tr>
                            <tr class="border border-gray-300 md:border-none md:table-row">
                                <td class="block md:table-cell"><input type="checkbox" value="3"
                                        class="select-paket"></td>
                                <td class="block md:table-cell">3</td>
                                <td class="block md:table-cell">Assessment</td>
                            </tr>
                            <!-- Tambahkan baris lebih banyak sesuai data -->
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <button id="confirmPaket" class="bg-blue-500 text-white px-4 py-2 rounded-md">Pilih</button>
                        <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded-md">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Open modal when input is clicked
                const namaPaketInput = document.getElementById('nama_paket');
                const modal = document.getElementById('modalPaketSoal');
                const closeModalButton = document.getElementById('closeModal');
                const confirmPaketButton = document.getElementById('confirmPaket');

                namaPaketInput.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });

                // Close modal
                closeModalButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });

                // Confirm and select paket
                confirmPaketButton.addEventListener('click', function() {
                    let selectedPaket = '';
                    document.querySelectorAll('.select-paket:checked').forEach(function(checkbox) {
                        selectedPaket += checkbox.closest('tr').querySelector('td:nth-child(3)')
                            .textContent + ', ';
                    });
                    selectedPaket = selectedPaket.slice(0, -2); // Remove trailing comma and space

                    namaPaketInput.value = selectedPaket;
                    modal.classList.add('hidden');
                });
            });
        </script>
    @endpush
@endsection
