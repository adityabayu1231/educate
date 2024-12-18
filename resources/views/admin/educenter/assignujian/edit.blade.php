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
                    <h1 class="text-2xl font-bold mb-2 text-black">Edu Center ✨</h1>
                    <p class="text-md text-gray-100">Edit Test Kelas</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
            <!-- Back Button di Pojok Kiri -->
            <div class="col-span-12 md:col-span-6 flex justify-start md:justify-start">
                <a href="{{ route('admin.test-kelas.index') }}" class="text-blue-500 text-sm flex items-center">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ml-2">Back</span>
                </a>
            </div>
        </div>

        <!-- Pesan error -->
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-12 gap-4 mt-6">
            <div class="col-span-12 lg:col-span-6 mx-auto">
                <form action="{{ route('admin.test-kelas.update', $testKelas->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="id_sesi" class="block text-sm font-medium text-gray-700">ID Sesi</label>
                            <select name="id_sesi" id="id_sesi" required
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                                <option value="" disabled>Pilih Kelas</option>
                                @foreach ($kelass as $kelas)
                                    <option value="{{ $kelas->id }}"
                                        {{ $testKelas->id_sesi == $kelas->id ? 'selected' : '' }}>
                                        {{ $kelas->name_class }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="nama_test" class="block text-sm font-medium text-gray-700">Nama Ujian/Test</label>
                            <input type="text" name="nama_test" id="nama_test" required
                                value="{{ old('nama_test', $testKelas->nama_test) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                            <select name="jenis" id="jenis" required
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                                <option value="" disabled>Pilih Jenis</option>
                                <option value="drilling_soal" {{ $testKelas->jenis == 'drilling_soal' ? 'selected' : '' }}>
                                    Drilling Soal</option>
                                <option value="try_out" {{ $testKelas->jenis == 'try_out' ? 'selected' : '' }}>Try Out
                                </option>
                                <option value="assessment" {{ $testKelas->jenis == 'assessment' ? 'selected' : '' }}>
                                    Assessment</option>
                                <option value="kelas_online_webinar"
                                    {{ $testKelas->jenis == 'kelas_online_webinar' ? 'selected' : '' }}>Kelas
                                    Online/Webinar</option>
                            </select>
                        </div>
                        <div>
                            <label for="teknis_ujian" class="block text-sm font-medium text-gray-700">Teknis Ujian</label>
                            <input type="text" name="teknis_ujian" id="teknis_ujian" required
                                value="{{ old('teknis_ujian', $testKelas->teknis_ujian) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="mulai_test" class="block text-sm font-medium text-gray-700">Mulai Test</label>
                            <input type="datetime-local" name="mulai_test" id="mulai_test" required
                                value="{{ old('mulai_test', \Carbon\Carbon::parse($testKelas->mulai_test)->format('Y-m-d\TH:i')) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="selesai_test" class="block text-sm font-medium text-gray-700">Selesai Test</label>
                            <input type="datetime-local" name="selesai_test" id="selesai_test" required
                                value="{{ old('selesai_test', \Carbon\Carbon::parse($testKelas->selesai_test)->format('Y-m-d\TH:i')) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="jadwal_webinar" class="block text-sm font-medium text-gray-700">Jadwal
                                Webinar</label>
                            <input type="text" name="jadwal_webinar" id="jadwal_webinar"
                                value="{{ old('jadwal_webinar', $testKelas->jadwal_webinar) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="passing_grade" class="block text-sm font-medium text-gray-700">Passing Grade</label>
                            <input type="number" name="passing_grade" id="passing_grade"
                                value="{{ old('passing_grade', $testKelas->passing_grade) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="id_jadwal_learning" class="block text-sm font-medium text-gray-700">Id Jadwal
                                Learning</label>
                            <input type="text" name="id_jadwal_learning" id="id_jadwal_learning"
                                value="{{ old('id_jadwal_learning', $testKelas->id_jadwal_learning) }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                            Update Test Kelas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
