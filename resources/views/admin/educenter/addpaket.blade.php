@extends('layouts.admin')

@section('title', 'Tambah Paket Soal')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-7xl mx-auto">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Create New Paket Soal ✨</h1>
                    <p class="text-md text-gray-100">Tambahkan Paket Soal</p>
                </div>
            </div>
        </div>

        <!-- Tombol Back -->
        <a href="{{ route('admin.paket-soal') }}"><button class="mb-6 text-blue-500 font-medium">&larr; back</button></a>

        <!-- Form Container -->
        <form action="{{ route('admin.paket-soal.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4 max-w-3xl">
                <!-- Nama Paket -->
                <div>
                    <label class="block text-blue-600 text-sm mb-1" for="namaPaket">Nama Paket</label>
                    <input id="namaPaket" type="text" name="nama_paket_soal"
                        class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        placeholder="Nama Paket" required>
                </div>

                <!-- Mata Pelajaran -->
                <div>
                    <label class="block text-blue-600 text-sm mb-1" for="mataPelajaran">Mata Pelajaran</label>
                    <select id="mataPelajaran" name="mapel_id"
                        class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        required>
                        <option value="">Pilih Mata Pelajaran</option>
                        @foreach ($mapel as $m)
                            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Durasi Pengerjaan Soal -->
                <div>
                    <label class="block text-blue-600 text-sm mb-1" for="durasi">Durasi Pengerjaan Soal (Menit)</label>
                    <input id="durasi" type="number" name="durasi"
                        class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        placeholder="Durasi Pengerjaan" required>
                </div>

                <!-- Urutan -->
                <div>
                    <label class="block text-blue-600 text-sm mb-1" for="urutan">Urutan</label>
                    <input id="urutan" type="number" name="urutan"
                        class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        placeholder="Urutan" required>
                </div>

                <!-- Jenis Penilaian -->
                <div>
                    <label class="block text-blue-600 text-sm mb-1" for="jenisPenilaian">Jenis Penilaian</label>
                    <select id="jenisPenilaian" name="penilaian"
                        class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        required>
                        <option value="ABS">ABS</option>
                        <option value="XYZ">XYZ</option>
                    </select>
                </div>

                <!-- Video Pembahasan -->
                <div>
                    <label class="block text-blue-600 text-sm mb-1" for="videoPembahasan">Video Pembahasan</label>
                    <input id="videoPembahasan" type="url" name="video_pembahasan"
                        class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        placeholder="URL Video Pembahasan">
                </div>

                <!-- Video Pembahasan Free -->
                <div>
                    <label class="block text-blue-600 text-sm mb-1" for="videoPembahasanFree">Video Pembahasan Free</label>
                    <input id="videoPembahasanFree" type="url" name="video_pembahasan_free"
                        class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        placeholder="URL Video Pembahasan Free">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
@endsection
