@extends('layouts.admin')

@section('title', 'Assign Paket Soal')

@section('content')
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center mb-6">
            <a href="#" class="text-blue-500 flex items-center">
                <i class="fas fa-arrow-left"></i>
                <span class="ml-2">Back</span>
            </a>
            <div class="flex space-x-4">
                <div class="relative">
                    <button class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md flex items-center">
                        ALL STUDENT <i class="fas fa-caret-down ml-2"></i>
                    </button>
                </div>
                <div class="relative">
                    <button class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-md flex items-center">
                        ALL BRAND <i class="fas fa-caret-down ml-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-md">
            <!-- Form Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Left Side Form -->
                <div>
                    <div class="mb-4">
                        <label for="brand" class="block text-gray-600">Brand</label>
                        <input type="text" id="brand"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="program" class="block text-gray-600">Program</label>
                        <input type="text" id="program"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="waktu" class="block text-gray-600">Waktu Pengerjaan</label>
                        <input type="text" id="waktu"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="sesi" class="block text-gray-600">Nama Sesi</label>
                        <input type="text" id="sesi"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <!-- Right Side Form -->
                <div>
                    <div class="mb-4">
                        <label for="nama-siswa" class="block text-gray-600">Nama Siswa</label>
                        <input type="text" id="nama-siswa"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="sub-program" class="block text-gray-600">Sub Program</label>
                        <input type="text" id="sub-program"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="nama-paket" class="block text-gray-600">Nama Paket Soal</label>
                        <input type="text" id="nama-paket"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                            value="Pop up">
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="flex justify-center mt-6">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-md flex items-center hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i> Tambahkan
                </button>
            </div>
        </div>
    </div>
@endsection
