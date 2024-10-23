@extends('layouts.admin')

@section('title', 'Manage Tingkats')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-9xl mx-auto">

        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <!-- Background Image as Cover -->
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <!-- Content: Welcome Message and Button -->
            <div class="relative flex justify-between w-full">
                <!-- Left Section: Welcome Message -->
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Tingkat ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center mb-6">
            <button id="createTingkatBtn"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Tingkat
            </button>
        </div>

        @if (session('status'))
            <div class="mb-4 max-w-md p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-r-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="data-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Jenjang</th>
                        <th class="py-3 px-6 text-left">Nama Kelas</th>
                        <th class="py-3 px-6 text-left">Kode Tingkat</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @if ($tingkats->isEmpty())
                        <tr>
                            <td colspan="5" class="py-3 px-6 text-center text-gray-500">Not Found</td>
                        </tr>
                    @else
                        @foreach ($tingkats as $tingkat)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                                <td class="py-3 px-6 text-left">{{ $tingkat->level->name_level }}</td>
                                <td class="py-3 px-6 text-left">{{ $tingkat->nama_kelas }}</td>
                                <td class="py-3 px-6 text-left">{{ $tingkat->kode_tingkat }}</td>
                                <td class="py-3 px-6 text-right">
                                    <button data-id="{{ $tingkat->id }}" data-nama_kelas="{{ $tingkat->nama_kelas }}"
                                        data-kode_tingkat="{{ $tingkat->kode_tingkat }}"
                                        data-level_id="{{ $tingkat->level_id }}"
                                        class="editTingkatBtn text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.tingkat.destroy', $tingkat) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <!-- Pagination -->
            {{-- <div class="py-4">
                {{ $tingkats->links() }}
            </div> --}}
        </div>

        <!-- Create Modal -->
        <div id="createModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Create Tingkat</h2>
                <form action="{{ route('admin.tingkat.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="level_id" class="block text-gray-700">Jenjang</label>
                        <select id="level_id" name="level_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name_level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="nama_kelas" class="block text-gray-700">Nama Kelas</label>
                        <input type="text" id="nama_kelas" name="nama_kelas"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="kode_tingkat" class="block text-gray-700">Kode Tingkat</label>
                        <input type="text" id="kode_tingkat" name="kode_tingkat"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            readonly required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeCreateModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Create</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Edit Tingkat</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_level_id" class="block text-gray-700">Level</label>
                        <select id="edit_level_id" name="level_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name_level }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_nama_kelas" class="block text-gray-700">Nama Kelas</label>
                        <input type="text" id="edit_nama_kelas" name="nama_kelas"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required oninput="generateKodeTingkat()">
                    </div>
                    <div class="mb-4">
                        <label for="edit_kode_tingkat" class="block text-gray-700">Kode Tingkat</label>
                        <input type="text" id="edit_kode_tingkat" name="kode_tingkat"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            readonly required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeEditModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('createTingkatBtn').onclick = function() {
            document.getElementById('createModal').classList.remove('hidden');
            document.getElementById('createModal').classList.add('flex');
        };

        document.getElementById('closeCreateModal').onclick = function() {
            document.getElementById('createModal').classList.add('hidden');
            document.getElementById('createModal').classList.remove('flex');
        };

        document.querySelectorAll('.editTingkatBtn').forEach(button => {
            button.onclick = function() {
                const tingkatId = this.getAttribute('data-id');
                const namaKelas = this.getAttribute('data-nama_kelas');
                const kodeTingkat = this.getAttribute('data-kode_tingkat');
                const levelId = this.getAttribute('data-level_id');

                document.getElementById('editForm').action = '/admin/master/tingkat/' + tingkatId;
                document.getElementById('edit_nama_kelas').value = namaKelas;
                document.getElementById('edit_kode_tingkat').value = kodeTingkat;
                document.getElementById('edit_level_id').value = levelId;

                document.getElementById('editModal').classList.remove('hidden');
                document.getElementById('editModal').classList.add('flex');
            };
        });

        document.getElementById('closeEditModal').onclick = function() {
            document.getElementById('editModal').classList.add('hidden');
        };
        document.addEventListener('DOMContentLoaded', function() {
            const namaKelasInput = document.getElementById('nama_kelas');
            const kodeTingkatInput = document.getElementById('kode_tingkat');

            // Event listener untuk input nama kelas
            namaKelasInput.addEventListener('input', function() {
                // Ambil nilai dari nama kelas
                const namaKelas = namaKelasInput.value;
                // Hapus spasi dari nama kelas
                const kodeTingkat = namaKelas.replace(/\s+/g, '');
                // Set nilai ke kode tingkat
                kodeTingkatInput.value = kodeTingkat;
            });
        });

        function generateKodeTingkat() {
            // Mengambil nilai dari input nama kelas
            const namaKelas = document.getElementById('edit_nama_kelas').value;
            // Menghilangkan spasi dan mengubah ke huruf kecil
            const kodeTingkat = namaKelas.replace(/\s+/g, '');
            // Mengatur nilai ke input kode tingkat
            document.getElementById('edit_kode_tingkat').value = kodeTingkat;
        }
    </script>
@endsection
