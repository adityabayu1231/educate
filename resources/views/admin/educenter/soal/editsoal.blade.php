@extends('layouts.admin')

@section('title', 'Edit Soal')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-7xl mx-auto">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Edit Soal ✨</h1>
                    <p class="text-md text-gray-100">Edit soal dan pilihan jawabannya di sini.</p>
                </div>
            </div>
        </div>

        <!-- Tombol Back -->
        <a href="{{ url()->previous() }}"><button
                class="mb-2 text-blue-500 hover:bg-blue-500 font-medium px-4 py-2 rounded-md hover:text-white">&larr;
                back</button></a>

        <form action="{{ route('admin.soals.update', $soal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-4 bg-gray-100">
                <div class="w-full md:w-1/2 space-y-6 mx-auto md:ml-0">
                    <!-- Paket Soal -->
                    <div class="flex flex-col">
                        <label for="paket_soal_id" class="mb-2 text-blue-600">Paket Soal</label>

                        <!-- Select yang disabled (seolah-olah readonly) -->
                        <select name="paket_soal_id_display" id="paket_soal_id_display"
                            class="p-2 border border-gray-300 rounded-lg shadow-sm w-full" disabled>
                            @foreach ($pakets as $paket)
                                <option value="{{ $paket->id }}"
                                    {{ $paket->id == $soal->paket_soal_id ? 'selected' : '' }}>
                                    {{ $paket->nama_paket_soal }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Input hidden untuk mengirimkan nilai sebenarnya -->
                        <input type="hidden" name="paket_soal_id" value="{{ $soal->paket_soal_id }}">
                    </div>

                    <!-- Bab -->
                    <div class="flex flex-col">
                        <label for="bab" class="mb-2 text-blue-600">Bab</label>
                        <input type="text" name="bab" id="bab" value="{{ $soal->bab }}"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                    </div>

                    <!-- Soal Text -->
                    <div class="flex flex-col">
                        <label for="soal" class="mb-2 text-blue-600">Soal</label>
                        <textarea name="soal" id="soal" rows="3" class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">{{ $soal->soal }}</textarea>
                    </div>

                    <!-- Soal Gambar -->
                    <div class="flex flex-col">
                        <label for="soal_gambar" class="mb-2 text-blue-600">Soal Gambar (Opsional)</label>
                        <input type="file" name="soal_gambar" id="soal_gambar" accept="image/*"
                            onchange="previewImage(event)"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @if ($soal->soal_gambar)
                            <img src="{{ Storage::url($soal->soal_gambar) }}" id="image_preview"
                                class="mt-2 w-full h-32 object-cover rounded-lg border border-gray-300" />
                        @else
                            <img id="image_preview"
                                class="mt-2 hidden w-full h-32 object-cover rounded-lg border border-gray-300" />
                        @endif
                    </div>

                    <!-- Pilihan A - E -->
                    <div class="grid grid-cols-6 gap-4">
                        <!-- Pilihan A -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_a" class="mb-2 text-blue-600">Pilihan A</label>
                            <input type="text" name="pil_a" id="pil_a" value="{{ $soal->pil_a }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_a" class="mb-2 text-blue-600">Skor A</label>
                            <input type="number" name="skor_a" id="skor_a" value="{{ $soal->skor_a }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan B -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_b" class="mb-2 text-blue-600">Pilihan B</label>
                            <input type="text" name="pil_b" id="pil_b" value="{{ $soal->pil_b }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_b" class="mb-2 text-blue-600">Skor B</label>
                            <input type="number" name="skor_b" id="skor_b" value="{{ $soal->skor_b }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan C -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_c" class="mb-2 text-blue-600">Pilihan C</label>
                            <input type="text" name="pil_c" id="pil_c" value="{{ $soal->pil_c }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_c" class="mb-2 text-blue-600">Skor C</label>
                            <input type="number" name="skor_c" id="skor_c" value="{{ $soal->skor_c }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan D -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_d" class="mb-2 text-blue-600">Pilihan D</label>
                            <input type="text" name="pil_d" id="pil_d" value="{{ $soal->pil_d }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_d" class="mb-2 text-blue-600">Skor D</label>
                            <input type="number" name="skor_d" id="skor_d" value="{{ $soal->skor_d }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>

                        <!-- Pilihan E -->
                        <div class="flex flex-col col-span-5">
                            <label for="pil_e" class="mb-2 text-blue-600">Pilihan E</label>
                            <input type="text" name="pil_e" id="pil_e" value="{{ $soal->pil_e }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-full">
                        </div>
                        <div class="flex flex-col col-span-1">
                            <label for="skor_e" class="mb-2 text-blue-600">Skor E</label>
                            <input type="number" name="skor_e" id="skor_e" value="{{ $soal->skor_e }}"
                                class="p-2 border border-gray-300 rounded-lg shadow-sm w-16 text-center">
                        </div>
                    </div>

                    <!-- Jawaban -->
                    <div class="flex flex-col">
                        <label for="jawaban" class="mb-2 text-blue-600">Jawaban</label>
                        <select name="jawaban" id="jawaban"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                            <option value="A" {{ $soal->jawaban == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $soal->jawaban == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $soal->jawaban == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $soal->jawaban == 'D' ? 'selected' : '' }}>D</option>
                            <option value="E" {{ $soal->jawaban == 'E' ? 'selected' : '' }}>E</option>
                        </select>
                    </div>

                    <!-- Pembahasan -->
                    <div class="flex flex-col">
                        <label for="pembahasan" class="mb-2 text-blue-600">Pembahasan (Opsional)</label>
                        <textarea name="pembahasan" id="pembahasan" rows="3"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">{{ $soal->pembahasan }}</textarea>
                    </div>

                    <!-- Gambar Pembahasan -->
                    <div class="flex flex-col">
                        <label for="gambar_pembahasan" class="mb-2 text-blue-600">Gambar Pembahasan (Opsional)</label>
                        <input type="file" name="gambar_pembahasan" id="gambar_pembahasan" accept="image/*"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Video Penjelasan -->
                    <div class="flex flex-col">
                        <label for="video_penjelasan" class="mb-2 text-blue-600">Link Video Penjelasan (Opsional)</label>
                        <input type="url" name="video_penjelasan" id="video_penjelasan"
                            placeholder="https://www.youtube.com/watch?v=..." value="{{ $soal->video_penjelasan }}"
                            class="p-3 border border-gray-300 rounded-lg shadow-sm w-full">
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="mt-4 bg-blue-500 text-white p-3 rounded-lg">Update Soal</button>
                </div>
            </div>
        </form>

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
