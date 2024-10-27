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
                    <h1 class="text-2xl font-bold mb-2 text-black">Assign Kelas ✨</h1>
                    <p class="text-md text-gray-100">Daftar Assign Kelas</p>
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
            <a href="{{ route('admin.assign-soal.create') }}">
                <button id="createDataBtn"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Assign Kelas
                </button>
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <tr>
                            <th class="py-3 px-6 text-left">#</th>
                            <th class="py-3 px-6 text-left whitespace-nowrap">Nama Siswa</th>
                            <th class="py-3 px-6 text-left whitespace-nowrap">Test Kelas</th>
                            <th class="py-3 px-6 text-left whitespace-nowrap">Paket Kelas</th>
                            <th class="py-3 px-6 text-left whitespace-nowrap">Sisa Waktu</th>
                            <th class="py-3 px-6 text-left whitespace-nowrap">Is Selesai</th>
                            <th class="py-3 px-6 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @if ($ikuttests->isEmpty())
                            <tr>
                                <td colspan="7" class="py-3 px-6 text-center text-gray-500">
                                    Data Not Found
                                </td>
                            </tr>
                        @else
                            @foreach ($ikuttests as $test)
                                <tr class="border-b">
                                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-6">{{ $test->student->user->fullname ?? 'Tidak ada data' }}</td>
                                    <td class="py-3 px-6">{{ $test->testKelas->nama_test ?? 'Tidak ada data' }}</td>
                                    <td class="py-3 px-6">{{ $test->paket_soal_names ?? 'Tidak ada data' }}</td>
                                    <td class="py-3 px-6">{{ $test->sisa_waktu ?? 'Tidak ada data' }}</td>
                                    <td class="py-3 px-6">
                                        {{ $test->is_selesai ? 'Selesai' : 'Belum Selesai' }}
                                    </td>
                                    <td class="py-3 px-6 flex space-x-2">
                                        <a href="{{ route('admin.test-kelas.edit', $test->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-200">Edit</a>
                                        <form action="{{ route('admin.test-kelas.destroy', $test->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-200"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
