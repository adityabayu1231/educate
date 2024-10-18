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
                    <p class="text-md text-gray-100">Tambahkan Paket Soal</p>
                </div>
            </div>
        </div>


        <!-- Tombol Back -->
        <button class="mb-6 text-blue-500 font-medium">&larr; back</button>

        <!-- Form Container -->
        <div class="grid grid-cols-2 gap-4 max-w-3xl">
            <!-- Nama Paket -->
            <div>
                <label class="block text-blue-600 text-sm mb-1" for="namaPaket">Nama Paket</label>
                <input id="namaPaket" type="text"
                    class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                    placeholder="Nama Paket">
            </div>

            <!-- Mata Pelajaran -->
            <div>
                <label class="block text-blue-600 text-sm mb-1" for="mataPelajaran">Mata Pelajaran</label>
                <input id="mataPelajaran" type="text"
                    class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                    placeholder="Mata Pelajaran">
            </div>

            <!-- Materi -->
            <div>
                <label class="block text-blue-600 text-sm mb-1" for="materi">Materi</label>
                <input id="materi" type="text"
                    class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                    placeholder="Materi">
            </div>

            <!-- Durasi Pengerjaan Soal -->
            <div>
                <label class="block text-blue-600 text-sm mb-1" for="durasi">Durasi Pengerjaan Soal (Menit)</label>
                <input id="durasi" type="number"
                    class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                    placeholder="Durasi Pengerjaan">
            </div>

            <!-- Urutan -->
            <div>
                <label class="block text-blue-600 text-sm mb-1" for="urutan">Urutan</label>
                <input id="urutan" type="text"
                    class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                    placeholder="Urutan">
            </div>

            <!-- Jenis Penilaian -->
            <div>
                <label class="block text-blue-600 text-sm mb-1" for="jenisPenilaian">Jenis Penilaian</label>
                <select id="jenisPenilaian"
                    class="w-11/12 p-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="ABS">ABS</option>
                    <option value="XYZ">XYZ</option>
                </select>
            </div>
        </div>
    </div>
@endsection
