@extends('layouts.admin')

@section('title', 'Manage Kelas')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Manage Kelas</h1>

        @if (session('success'))
            <div class="relative bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
                <div class="absolute bottom-0 left-0 h-1 bg-green-600 animate-shrink"></div>
            </div>
        @endif

        <!-- Create New Mata Pelajaran Button -->
        <button id="openCreateModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">
            <i class="fas fa-plus mr-2"></i> Create New Kelas
        </button>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama Kelas</th>
                        <th class="py-3 px-6 text-left">Tahun Ajar</th>
                        <th class="py-3 px-6 text-left">Kapasitas</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Jenis Pembelajaran</th>
                        <th class="py-3 px-6 text-left">Program</th>
                        <th class="py-3 px-6 text-left">Sub Program</th>
                        <th class="py-3 px-6 text-left">Brand</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @if ($kelass->isEmpty())
                        <tr>
                            <td colspan="7" class="py-3 px-6 text-center text-gray-500">No Data Found</td>
                        </tr>
                    @else
                        @foreach ($kelass as $index => $subject)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->name_class }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->tahun_ajar }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->kapasitas }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->status }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->jenis_pembelajaran }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->program_id }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->subprogram_id }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->brand_id }}</td>
                                <td class="py-3 px-6 text-right">
                                    <button class="bg-yellow-500 text-white px-4 py-1 rounded btn-edit"
                                        data-id="{{ $subject->id }}" data-name-class="{{ $subject->name_class }}"
                                        data-tahun-ajar="{{ $subject->tahun_ajar }}"
                                        data-kapasitas="{{ $subject->kapasitas }}" data-status="{{ $subject->status }}"
                                        data-program-id="{{ $subject->program_id }}"
                                        data-subprogram-id="{{ $subject->subprogram_id }}"
                                        data-brand-id="{{ $subject->brand_id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.kelas.destroy', $subject->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded"
                                            onclick="return confirm('Are you sure you want to delete this subject?');">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Create Subject Modal -->
        <div id="createModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-plus-circle mr-2 text-blue-500"></i> Create Kelas
                </h2>
                <form id="createForm" method="POST" action="{{ route('admin.kelas.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="create_kdkelas" class="block text-gray-700 text-sm">Nama Kelas</label>
                        <input type="text" id="create_kdkelas" name="name_class"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="create_kdmapel" class="block text-gray-700 text-sm">Kode Mata Pelajaran</label>
                        <input type="text" id="create_kdmapel" name="kdmapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="create_nama_mapel" class="block text-gray-700 text-sm">Nama Mata Pelajaran</label>
                        <input type="text" id="create_nama_mapel" name="nama_mapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="create_cover" class="block text-gray-700 text-sm">Cover</label>
                        <input type="file" id="create_cover" name="cover"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500">
                        <img id="createImagePreview" class="mt-2 hidden w-24 h-24 rounded shadow-lg">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm">Is Active</label>
                        <input type="text" id="create_is_active" name="is_active"
                            class="block w-full border border-gray-300 p-2 rounded text-sm"
                            placeholder="Input bebas, contohnya: active, inactive">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-save"></i> Save
                        </button>
                        <button type="button" id="closeCreateModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Edit Subject Modal -->
        <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-edit mr-2 text-yellow-500"></i> Edit Mata Pelajaran
                </h2>
                <form id="editForm" method="POST" action="{{ route('admin.mapel.update', ['mapel' => ':id']) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-4">
                        <label for="edit_kdkelas" class="block text-gray-700 text-sm">Kode Kelas</label>
                        <input type="text" id="edit_kdkelas" name="kdkelas"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="edit_kdmapel" class="block text-gray-700 text-sm">Kode Mata Pelajaran</label>
                        <input type="text" id="edit_kdmapel" name="kdmapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="edit_nama_mapel" class="block text-gray-700 text-sm">Nama Mata Pelajaran</label>
                        <input type="text" id="edit_nama_mapel" name="nama_mapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="edit_cover" class="block text-gray-700 text-sm">Cover</label>
                        <input type="file" id="edit_cover" name="cover"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm">
                        <img id="editImagePreview" class="mt-2 hidden w-24 h-24 rounded shadow-lg">
                    </div>

                    <div class="mb-4">
                        <label for="edit_is_active" class="block text-gray-700 text-sm">Is Active</label>
                        <input type="text" id="edit_is_active" name="is_active"
                            class="block w-full border border-gray-300 p-2 rounded text-sm"
                            placeholder="Input bebas, contohnya: active, inactive">
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <button type="button" id="closeEditModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle opening and closing of create modal
                const openCreateModal = document.getElementById('openCreateModal');
                const closeCreateModal = document.getElementById('closeCreateModal');
                const createModal = document.getElementById('createModal');

                openCreateModal.addEventListener('click', () => {
                    createModal.classList.remove('hidden');
                    createModal.classList.add('flex');
                });

                closeCreateModal.addEventListener('click', () => {
                    createModal.classList.remove('flex');
                    createModal.classList.add('hidden');
                });

                // Handle opening and closing of edit modal
                const editModal = document.getElementById('editModal');
                const closeEditModal = document.getElementById('closeEditModal');
                const editForm = document.getElementById('editForm');

                closeEditModal.addEventListener('click', () => {
                    editModal.classList.remove('flex');
                    editModal.classList.add('hidden');
                });

                // Handle edit button click
                document.querySelectorAll('.btn-edit').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;
                        const kdkelas = this.dataset.kdkelas;
                        const kdmapel = this.dataset.kdmapel;
                        const nama_mapel = this.dataset.nama;
                        const cover = this.dataset.cover;
                        const isActive = this.dataset.isActive;

                        document.getElementById('edit_id').value = id;
                        document.getElementById('edit_kdkelas').value = kdkelas;
                        document.getElementById('edit_kdmapel').value = kdmapel;
                        document.getElementById('edit_nama_mapel').value = nama_mapel;
                        document.getElementById('edit_is_active').value = isActive;

                        if (cover) {
                            const editImagePreview = document.getElementById('editImagePreview');
                            editImagePreview.src = `/storage/${cover}`;
                            editImagePreview.classList.remove('hidden');
                        } else {
                            document.getElementById('editImagePreview').classList.add('hidden');
                        }

                        editForm.action = editForm.action.replace(':id', id);
                        editModal.classList.remove('hidden');
                        editModal.classList.add('flex');
                    });
                });
            });
        </script>
    @endpush
@endsection
