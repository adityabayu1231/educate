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

        <!-- Tombol Back -->
        <a href="{{ route('admin.paket-soal') }}"><button
                class="mb-6 text-blue-500 hover:bg-blue-500 font-medium px-4 py-2 rounded-md hover:text-white">&larr;
                back</button></a>

        <div class="p-4 bg-gray-100">
            <div class="w-full md:w-1/2 space-y-6 mx-auto md:ml-0">
                <!-- Setengah layar di desktop, full di mobile, di pojok kiri -->
                <!-- Soal Text -->
                <div class="flex flex-col">
                    <label for="soal" class="mb-2 text-blue-600">Soal</label>
                    <textarea id="soal" rows="3" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full"></textarea>
                </div>

                <!-- Soal Gambar -->
                <div class="flex flex-col">
                    <label for="soal_gambar" class="mb-2 text-blue-600">Soal Gambar (Opsional)</label>
                    <input type="file" id="soal_gambar" accept="image/*" onchange="previewImage(event)"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <img id="image_preview"
                        class="mt-2 hidden w-full h-32 object-cover rounded-lg border border-gray-300" />
                </div>

                <!-- Pilihan A - E -->
                <div class="grid grid-cols-6 gap-4">
                    <!-- Pilihan A -->
                    <div class="flex flex-col col-span-5">
                        <label for="pil_a" class="mb-2 text-blue-600">Pilihan A</label>
                        <input type="text" id="pil_a" class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        <!-- Panjang -->
                    </div>
                    <div class="flex flex-col col-span-1">
                        <label for="skor_a" class="mb-2 text-blue-600">Skor A</label>
                        <input type="number" id="skor_a"
                            class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center"> <!-- Kotak kecil -->
                    </div>

                    <!-- Pilihan B -->
                    <div class="flex flex-col col-span-5">
                        <label for="pil_b" class="mb-2 text-blue-600">Pilihan B</label>
                        <input type="text" id="pil_b" class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        <!-- Panjang -->
                    </div>
                    <div class="flex flex-col col-span-1">
                        <label for="skor_b" class="mb-2 text-blue-600">Skor B</label>
                        <input type="number" id="skor_b"
                            class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center"> <!-- Kotak kecil -->
                    </div>

                    <!-- Pilihan C -->
                    <div class="flex flex-col col-span-5">
                        <label for="pil_c" class="mb-2 text-blue-600">Pilihan C</label>
                        <input type="text" id="pil_c" class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        <!-- Panjang -->
                    </div>
                    <div class="flex flex-col col-span-1">
                        <label for="skor_c" class="mb-2 text-blue-600">Skor C</label>
                        <input type="number" id="skor_c"
                            class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center"> <!-- Kotak kecil -->
                    </div>

                    <!-- Pilihan D -->
                    <div class="flex flex-col col-span-5">
                        <label for="pil_d" class="mb-2 text-blue-600">Pilihan D</label>
                        <input type="text" id="pil_d" class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        <!-- Panjang -->
                    </div>
                    <div class="flex flex-col col-span-1">
                        <label for="skor_d" class="mb-2 text-blue-600">Skor D</label>
                        <input type="number" id="skor_d"
                            class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center"> <!-- Kotak kecil -->
                    </div>

                    <!-- Pilihan E -->
                    <div class="flex flex-col col-span-5">
                        <label for="pil_e" class="mb-2 text-blue-600">Pilihan E</label>
                        <input type="text" id="pil_e" class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        <!-- Panjang -->
                    </div>
                    <div class="flex flex-col col-span-1">
                        <label for="skor_e" class="mb-2 text-blue-600">Skor E</label>
                        <input type="number" id="skor_e"
                            class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center"> <!-- Kotak kecil -->
                    </div>
                </div>

                <!-- Jawaban -->
                <div class="flex flex-col">
                    <label for="jawaban" class="mb-2 text-blue-600">Jawaban</label>
                    <input type="text" id="jawaban" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                </div>

                <!-- Pembahasan -->
                <div class="flex flex-col">
                    <label for="pembahasan" class="mb-2 text-blue-600">Pembahasan (Opsional)</label>
                    <textarea id="pembahasan" rows="3" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full"></textarea>
                </div>

                <!-- Gambar Pembahasan -->
                <div class="flex flex-col">
                    <label for="gambar_pembahasan" class="mb-2 text-blue-600">Gambar Pembahasan (Opsional)</label>
                    <input type="file" id="gambar_pembahasan" accept="image/*"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Video Penjelasan -->
                <div class="flex flex-col">
                    <label for="video_penjelasan" class="mb-2 text-blue-600">Link Video Penjelasan (Opsional)</label>
                    <input type="url" id="video_penjelasan" placeholder="https://www.youtube.com/watch?v=..."
                        class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                </div>

                <!-- Tombol Submit -->
                <button class="mt-4 bg-blue-500 text-white p-3 rounded-lg">Simpan Soal</button>
            </div>
        </div>

        <script>
            function previewImage(event) {
                const imagePreview = document.getElementById('image_preview');
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.classList.add('hidden');
                }
            }
        </script>
    </div>
@endsection
