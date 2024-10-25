@extends('layouts.admin')

@section('title', 'Edit Test Kelas')

@section('content')
    <div class="container mx-auto px-3 py-3">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-6">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Edit Test Kelas ✏️</h1>
                    <p class="text-md text-gray-100">Formulir untuk mengubah data Test Kelas</p>
                </div>
            </div>
        </div>

        <!-- Form untuk Edit Test Kelas -->
        <div class="grid grid-cols-12 gap-4 mt-6">
            <div class="col-span-12 lg:col-span-6 mx-auto">
                <form action="{{ route('admin.test-kelas.update', $testKelas->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Nama Test -->
                    <div>
                        <label for="nama_test" class="block text-sm font-medium text-gray-700">Nama Test</label>
                        <input type="text" name="nama_test" id="nama_test"
                            value="{{ old('nama_test', $testKelas->nama_test) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Jenis -->
                    <div>
                        <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                        <input type="text" name="jenis" id="jenis" value="{{ old('jenis', $testKelas->jenis) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Teknis Ujian -->
                    <div>
                        <label for="teknis_ujian" class="block text-sm font-medium text-gray-700">Teknis Ujian</label>
                        <input type="text" name="teknis_ujian" id="teknis_ujian"
                            value="{{ old('teknis_ujian', $testKelas->teknis_ujian) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Mulai Test -->
                    <div>
                        <label for="mulai_test" class="block text-sm font-medium text-gray-700">Mulai Test</label>
                        <input type="datetime-local" name="mulai_test" id="mulai_test"
                            value="{{ old('mulai_test', $testKelas->mulai_test) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Selesai Test -->
                    <div>
                        <label for="selesai_test" class="block text-sm font-medium text-gray-700">Selesai Test</label>
                        <input type="datetime-local" name="selesai_test" id="selesai_test"
                            value="{{ old('selesai_test', $testKelas->selesai_test) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Jadwal Webinar -->
                    <div>
                        <label for="jadwal_webinar" class="block text-sm font-medium text-gray-700">Jadwal Webinar</label>
                        <input type="text" name="jadwal_webinar" id="jadwal_webinar"
                            value="{{ old('jadwal_webinar', $testKelas->jadwal_webinar) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Jadwal Learning -->
                    <div>
                        <label for="id_jadwal_learning" class="block text-sm font-medium text-gray-700">Jadwal
                            Learning</label>
                        <input type="text" name="id_jadwal_learning" id="id_jadwal_learning"
                            value="{{ old('id_jadwal_learning', $testKelas->id_jadwal_learning) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Passing Grade -->
                    <div>
                        <label for="passing_grade" class="block text-sm font-medium text-gray-700">Passing Grade</label>
                        <input type="number" name="passing_grade" id="passing_grade"
                            value="{{ old('passing_grade', $testKelas->passing_grade) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
