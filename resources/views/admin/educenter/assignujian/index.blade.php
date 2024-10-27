@extends('layouts.admin')

@section('title', 'Daftar Test Kelas')

@section('content')
    <div class="container mx-auto px-3 py-3">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-6">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Test Kelas ✨</h1>
                    <p class="text-md text-gray-100">Daftar Test Kelas</p>
                </div>
            </div>
        </div>

        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan error -->
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex items-center mb-6">
            <a href="{{ route('admin.edu-center') }}" class="hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                <i class="fa-solid fa-arrow-left-long"></i> Back
            </a>
            <div class="flex-grow"></div>
            <a href="{{ route('admin.test-kelas.create') }}">
                <button id="createDataBtn"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Test Kelas
                </button>
            </a>
        </div>

        <div class="overflow-x-auto"> <!-- Tambahkan div pembungkus ini -->
            <table id="data-table" class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-6 text-left">No.</th>
                        <th class="py-3 px-6 text-left">Nama Test</th>
                        <th class="py-3 px-6 text-left">Jenis</th>
                        <th class="py-3 px-6 text-left">Teknis Ujian</th>
                        <th class="py-3 px-6 text-left">Mulai Test</th>
                        <th class="py-3 px-6 text-left">Selesai Test</th>
                        <th class="py-3 px-6 text-left">Nama Sesi</th> <!-- Tambahkan kolom ini -->
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @if ($testKelas->isEmpty())
                        <tr>
                            <td colspan="8" class="py-3 px-6 text-center text-gray-500">
                                Data Not Found
                            </td>
                        </tr>
                    @else
                        @foreach ($testKelas as $test)
                            <tr class="border-b">
                                <td class="py-3 px-6">{{ $loop->iteration }}</td>
                                <td class="py-3 px-6 whitespace-nowrap">{{ $test->nama_test }}</td>
                                <td class="py-3 px-6">{{ $test->jenis }}</td>
                                <td class="py-3 px-6">{{ $test->teknis_ujian }}</td>
                                <td class="py-3 px-6 whitespace-nowrap">{{ $test->mulai_test }}</td>
                                <td class="py-3 px-6 whitespace-nowrap">{{ $test->selesai_test }}</td>
                                <td class="py-3 px-6 whitespace-nowrap">{{ $test->kelas->name_class ?? 'N/A' }}</td>
                                <!-- Ambil nama sesi -->
                                <td class="py-3 px-6 flex space-x-2">
                                    <a href="{{ route('admin.test-kelas.edit', $test->id) }}"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-200">Edit</a>
                                    <form action="{{ route('admin.test-kelas.destroy', $test->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition duration-200"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
