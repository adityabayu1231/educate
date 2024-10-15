@extends('layouts.admin')

@section('title', 'Manage Tahun Ajaran')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-9xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Manage Tahun Ajaran ✨</h1>

        @if (session('success'))
            <div id="successMessage"
                class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 transition-opacity duration-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end items-center mb-6">
            <button id="createTahunBtn"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Tahun Ajaran
            </button>
        </div>

        @if ($tahunAjaran->isEmpty())
            <p class="text-center text-gray-500">Tidak Ada Tahun Ajaran</p>
        @else
            <div class="overflow-x-auto w-full md:w-1/2">
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 rounded-lg">
                            <th class="py-2 px-4 text-left text-sm font-medium text-gray-600">No</th>
                            <th class="py-2 px-4 text-left text-sm font-medium text-gray-600 whitespace-nowrap">Nama Tahun
                                Ajaran</th>
                            <th class="py-2 px-4 text-left text-sm font-medium text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tahunAjaran as $index => $tahun)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 text-sm text-gray-700">{{ $tahun->name }}</td>
                                <td class="py-2 px-4">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <button type="button"
                                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-200 rounded-l-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-700 editTahunBtn"
                                            data-id="{{ $tahun->id }}" data-name="{{ $tahun->name }}">Edit</button>
                                        <form action="{{ route('admin.tahun-ajaran.destroy', $tahun) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-gray-200 rounded-r-lg hover:bg-red-700 focus:ring-2 focus:ring-red-700"
                                                onclick="return confirm('Yakin ingin menghapus tahun ajaran ini?');">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Modal Create -->
    <div id="createTahunModal" class="fixed inset-0 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-4 w-1/3">
            <h2 class="text-xl font-bold mb-4">Tambah Tahun Ajaran</h2>
            <form id="createTahunForm" action="{{ route('admin.tahun-ajaran.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="createName" class="block text-gray-700">Nama Tahun Ajaran</label>
                    <input type="text" id="createName" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeCreateModal"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Batal</button>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editTahunModal" class="fixed inset-0 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-4 w-1/3">
            <h2 class="text-xl font-bold mb-4">Edit Tahun Ajaran</h2>
            <form id="editTahunForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="editName" class="block text-gray-700">Nama Tahun Ajaran</label>
                    <input type="text" id="editName" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeEditModal"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Batal</button>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Menampilkan pesan sukses selama 3 detik
        window.addEventListener('load', () => {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.classList.add('opacity-0');
                    // Kembali ke ukuran normal
                    successMessage.style.height = '0';
                }, 3000);
            }
        });

        // Modal Create
        const createTahunBtn = document.getElementById('createTahunBtn');
        const createTahunModal = document.getElementById('createTahunModal');
        const closeCreateModal = document.getElementById('closeCreateModal');

        createTahunBtn.addEventListener('click', () => {
            createTahunModal.classList.remove('hidden');
            createTahunModal.classList.add('flex');
        });

        closeCreateModal.addEventListener('click', () => {
            createTahunModal.classList.add('hidden');
            createTahunModal.classList.remove('flex');
        });

        // Modal Edit
        const editTahunBtns = document.querySelectorAll('.editTahunBtn');
        const editTahunModal = document.getElementById('editTahunModal');
        const closeEditModal = document.getElementById('closeEditModal');
        const editTahunForm = document.getElementById('editTahunForm');

        editTahunBtns.forEach(button => {
            button.addEventListener('click', (e) => {
                const id = e.target.dataset.id;
                const name = e.target.dataset.name;

                editTahunForm.action = `{{ url('admin/master/tahun-ajaran') }}/${id}`;
                editTahunForm.querySelector('#editName').value = name;

                editTahunModal.classList.remove('hidden');
                editTahunModal.classList.add('flex');
            });
        });

        closeEditModal.addEventListener('click', () => {
            editTahunModal.classList.add('hidden');
            editTahunModal.classList.remove('flex');
        });
    </script>
@endsection
