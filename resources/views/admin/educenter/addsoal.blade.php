@extends('layouts.admin')

@section('title', 'Manage Soal')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-7xl mx-auto">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Create New Soal ✨</h1>
                    <p class="text-md text-gray-100">Tambahkan soal dan pilihan jawabannya di sini.</p>
                </div>
            </div>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-10 gap-4"> <!-- Adjusted grid layout -->

                <!-- Nama Paket Soal -->
                <div class="col-span-10 lg:col-span-5">
                    <label for="paket_soal" class="block text-gray-700">Nama Paket Soal</label>
                    <input type="text" id="paket_soal" name="paket_soal"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Mata Pelajaran -->
                <div class="col-span-10 lg:col-span-5">
                    <label for="mata_pelajaran" class="block text-gray-700">Mata Pelajaran</label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <!-- Soal dan Upload Gambar (1 Baris) -->
                <div class="col-span-10 flex items-center space-x-4">
                    <div class="w-4/5">
                        <label for="soal" class="block text-gray-700">Soal</label>
                        <textarea id="soal" name="soal"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required></textarea>
                    </div>
                    <div class="flex flex-col items-center">
                        <label for="soal_gambar" class="block text-gray-700">Upload Gambar Soal</label>
                        <input type="file" id="soal_gambar" name="soal_gambar"
                            class="mt-1 block border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            accept="image/*">
                        <button type="button" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full mt-2">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <!-- Pilihan Jawaban A & Point A (1 Baris) -->
                <div class="col-span-10 flex items-center space-x-4">
                    <div class="w-4/5">
                        <label for="pil_a" class="block text-gray-700">Pilihan A</label>
                        <input type="text" id="pil_a" name="pil_a"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="w-1/5">
                        <label for="skor_a" class="block text-gray-700">Point</label>
                        <input type="number" id="skor_a" name="skor_a"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            min="0" max="1000" required>
                    </div>
                </div>

                <!-- Pilihan Jawaban B & Point B (1 Baris) -->
                <div class="col-span-10 flex items-center space-x-4">
                    <div class="w-4/5">
                        <label for="pil_b" class="block text-gray-700">Pilihan B</label>
                        <input type="text" id="pil_b" name="pil_b"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="w-1/5">
                        <label for="skor_b" class="block text-gray-700">Point</label>
                        <input type="number" id="skor_b" name="skor_b"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            min="0" max="1000" required>
                    </div>
                </div>

                <!-- Pilihan Jawaban C & Point C (1 Baris) -->
                <div class="col-span-10 flex items-center space-x-4">
                    <div class="w-4/5">
                        <label for="pil_c" class="block text-gray-700">Pilihan C</label>
                        <input type="text" id="pil_c" name="pil_c"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="w-1/5">
                        <label for="skor_c" class="block text-gray-700">Point</label>
                        <input type="number" id="skor_c" name="skor_c"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            min="0" max="1000">
                    </div>
                </div>

                <!-- Pilihan Jawaban D & Point D (1 Baris) -->
                <div class="col-span-10 flex items-center space-x-4">
                    <div class="w-4/5">
                        <label for="pil_d" class="block text-gray-700">Pilihan D</label>
                        <input type="text" id="pil_d" name="pil_d"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="w-1/5">
                        <label for="skor_d" class="block text-gray-700">Point</label>
                        <input type="number" id="skor_d" name="skor_d"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            min="0" max="1000">
                    </div>
                </div>

                <!-- Pilihan Jawaban E & Point E (1 Baris) -->
                <div class="col-span-10 flex items-center space-x-4">
                    <div class="w-4/5">
                        <label for="pil_e" class="block text-gray-700">Pilihan E</label>
                        <input type="text" id="pil_e" name="pil_e"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="w-1/5">
                        <label for="skor_e" class="block text-gray-700">Point</label>
                        <input type="number" id="skor_e" name="skor_e"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            min="0" max="1000">
                    </div>
                </div>

                <!-- Pembahasan -->
                <div class="col-span-10">
                    <label for="pembahasan" class="block text-gray-700">Pembahasan</label>
                    <textarea id="pembahasan" name="pembahasan"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Upload Gambar Pembahasan -->
                <div class="col-span-10">
                    <label for="gambar_pembahasan" class="block text-gray-700">Upload Gambar Pembahasan</label>
                    <input type="file" id="gambar_pembahasan" name="gambar_pembahasan"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        accept="image/*">
                </div>

                <!-- Submit Button -->
                <div class="col-span-10">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                        <i class="fas fa-plus mr-2"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
