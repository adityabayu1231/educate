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
        <div class="grid grid-cols-12 gap-4 items-center">
            <!-- Back Button di Pojok Kiri -->
            <div class="col-span-6 flex">
                <a href="{{ route('admin.edu-center') }}" class="text-blue-500 text-sm flex items-center">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ml-2">Back</span>
                </a>
            </div>
            <!-- Dropdowns di Pojok Kanan -->
            <div class="col-span-6 flex justify-end space-x-2">
                <!-- Dropdown ALL STUDENT -->
                <div class="relative inline-block text-left">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-users text-gray-500"></i> <!-- Icon for All Students -->
                    </div>
                    <select class="inline-flex items-center pl-10 pr-3 py-1 bg-gray-200 text-sm rounded-md">
                        <!-- Tambahkan pl-10 pada select agar tidak bertabrakan dengan icon -->
                        <option value="all_students">ALL STUDENT</option>
                        <option value="student_1">Student 1</option>
                        <option value="student_2">Student 2</option>
                        <option value="student_3">Student 3</option>
                    </select>
                </div>

                <!-- Dropdown ALL BRAND -->
                <div class="relative inline-block text-left">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-briefcase text-gray-500"></i> <!-- Icon for All Brands -->
                    </div>
                    <select class="inline-flex items-center pl-10 pr-3 py-1 bg-gray-200 text-sm rounded-md">
                        <!-- Tambahkan pl-10 pada select agar tidak bertabrakan dengan icon -->
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
                            <input type="text" id="nama_paket"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
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
        </div>
    </div>
@endsection
