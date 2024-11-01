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
        <a href="{{ url()->previous() }}"><button
                class="mb-2 text-blue-500 hover:bg-blue-500 font-medium px-4 py-2 rounded-md hover:text-white">&larr;
                back</button></a>

        <form action="{{ route('admin.soals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-4 bg-gray-100">
                <!-- Menyesuaikan ukuran form -->
                <div class="w-full md:w-1/2 lg:w-3/4 xl:w-2/3 space-y-6 mx-auto md:ml-0">
                    <!-- Paket Soal -->
                    <div class="flex flex-col">
                        <label for="paket_soal_id" class="mb-2 text-blue-600">Paket Soal</label>

                        <!-- Select yang disabled (seolah-olah readonly) -->
                        <select name="paket_soal_id_display" id="paket_soal_id_display"
                            class="p-2 border border-gray-300 rounded-lg shadow-sm w-full" disabled>
                            @foreach ($pakets as $paket)
                                <option value="{{ $paket->id }}" {{ $paket->id == $paketId ? 'selected' : '' }}>
                                    {{ $paket->nama_paket_soal }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Input hidden untuk mengirimkan nilai sebenarnya -->
                        <input type="hidden" name="paket_soal_id" value="{{ $paketId }}">
                    </div>

                    <!-- Bab -->
                    <div class="flex flex-col">
                        <label for="bab" class="mb-2 text-blue-600">Bab</label>
                        <input type="text" name="bab" id="bab"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                    </div>

                    <!-- Soal Text -->
                    <div class="flex flex-col">
                        <label for="soal" class="mb-2 text-blue-600">Soal</label>
                        <textarea name="soal" id="soal" rows="3" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full"></textarea>
                    </div>

                    <!-- Soal Gambar -->
                    <div class="flex flex-col">
                        <label for="soal_gambar" class="mb-2 text-blue-600">Soal Gambar (Opsional)</label>
                        <input type="file" name="soal_gambar" id="soal_gambar" accept="image/*"
                            onchange="previewImage(event)"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <img id="image_preview"
                            class="mt-2 hidden w-full h-32 object-cover rounded-lg border border-gray-300" />
                    </div>

                    <!-- Pilihan A - E -->
                    <div class="grid grid-cols-6 gap-4">
                        <!-- Pilihan A -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_a" class="mb-2 text-blue-600">Pilihan A</label>
                            <input type="text" name="pil_a" id="pil_a"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_a" class="mb-2 text-blue-600">Skor A</label>
                            <input type="number" name="skor_a" id="skor_a"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan B -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_b" class="mb-2 text-blue-600">Pilihan B</label>
                            <input type="text" name="pil_b" id="pil_b"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_b" class="mb-2 text-blue-600">Skor B</label>
                            <input type="number" name="skor_b" id="skor_b"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan C -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_c" class="mb-2 text-blue-600">Pilihan C</label>
                            <input type="text" name="pil_c" id="pil_c"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_c" class="mb-2 text-blue-600">Skor C</label>
                            <input type="number" name="skor_c" id="skor_c"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan D -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_d" class="mb-2 text-blue-600">Pilihan D</label>
                            <input type="text" name="pil_d" id="pil_d"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_d" class="mb-2 text-blue-600">Skor D</label>
                            <input type="number" name="skor_d" id="skor_d"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan E -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_e" class="mb-2 text-blue-600">Pilihan E</label>
                            <input type="text" name="pil_e" id="pil_e"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_e" class="mb-2 text-blue-600">Skor E</label>
                            <input type="number" name="skor_e" id="skor_e"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>
                    </div>

                    <!-- Jawaban -->
                    <div class="flex flex-col">
                        <label for="jawaban" class="mb-2 text-blue-600">Jawaban</label>
                        <select name="jawaban" id="jawaban"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <!-- Pembahasan -->
                    <div class="flex flex-col">
                        <label for="pembahasan" class="mb-2 text-blue-600">Pembahasan (Opsional)</label>
                        <textarea name="pembahasan" id="pembahasan" rows="3"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full"></textarea>
                    </div>

                    <!-- Gambar Pembahasan -->
                    <div class="flex flex-col">
                        <label for="gambar_pembahasan" class="mb-2 text-blue-600">Gambar Pembahasan (Opsional)</label>
                        <input type="file" name="gambar_pembahasan" id="gambar_pembahasan" accept="image/*"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-full">
                        Simpan Soal
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const imagePreview = document.getElementById('image_preview');
            reader.onload = function() {
                imagePreview.src = reader.result;
                imagePreview.classList.remove('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script src="https://cdn.tiny.cloud/1/vodsxc16gkv4tycfr5bpo5v8hzfdwi9eiaud09iuqoqkrqy6/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "math", "advlist", "anchor", "autolink", "charmap", "code", "codesample", "fullscreen",
                "help", "image", "insertdatetime", "link", "lists", "media",
                "preview", "searchreplace", "table", "visualblocks",
            ],
            toolbar: "math | codesample | undo redo | styles | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }",
            branding: false,
            // Jika Anda menggunakan plugin tambahan yang tidak ada dalam CDN default
            external_plugins: {
                'math': 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js' // URL untuk plugin matematika
            }
        });
    </script>
@endsection
