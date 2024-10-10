@extends('layouts.admin')

@section('title', 'Manage Paket')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Manage Paket</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button id="openCreateModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">
            <i class="fas fa-plus mr-2"></i> Create New Paket
        </button>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama Paket</th>
                        <th class="py-3 px-6 text-left">Durasi</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @foreach ($pakets as $index => $paket)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                            <td class="py-3 px-6 text-left">{{ $paket->nama_paket }}</td>
                            <td class="py-3 px-6 text-left">{{ $paket->durasi }} menit</td>
                            <td class="py-3 px-6 text-right">
                                <button class="bg-yellow-500 text-white px-4 py-1 rounded btn-edit"
                                    data-id="{{ $paket->id }}" data-nama-paket="{{ $paket->nama_paket }}"
                                    data-durasi="{{ $paket->durasi }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create Paket Modal -->
        <div id="createModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-plus-circle mr-2 text-blue-500"></i> Create Paket
                </h2>
                <form action="{{ route('admin.paket.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_nama_paket" class="block text-gray-700 text-sm">Nama Paket</label>
                            <input type="text" id="create_nama_paket" name="nama_paket"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_durasi" class="block text-gray-700 text-sm">Durasi (menit)</label>
                            <input type="number" id="create_durasi" name="durasi"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" id="closeCreateModal"
                            class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Paket Modal -->
        <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-edit mr-2 text-yellow-500"></i> Edit Paket
                </h2>
                <form action="" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_nama_paket" class="block text-gray-700 text-sm">Nama Paket</label>
                            <input type="text" id="edit_nama_paket" name="nama_paket"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_durasi" class="block text-gray-700 text-sm">Durasi (menit)</label>
                            <input type="number" id="edit_durasi" name="durasi"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" id="closeEditModal"
                            class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Open Create Modal
                document.getElementById('openCreateModal').addEventListener('click', function() {
                    document.getElementById('createModal').classList.remove('hidden');
                });

                // Close Create Modal
                document.getElementById('closeCreateModal').addEventListener('click', function() {
                    document.getElementById('createModal').classList.add('hidden');
                });

                // Close Edit Modal
                document.getElementById('closeEditModal').addEventListener('click', function() {
                    document.getElementById('editModal').classList.add('hidden');
                });

                // Edit Button Click
                document.querySelectorAll('.btn-edit').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;
                        const nama_paket = this.dataset.nama_paket;
                        const durasi = this.dataset.durasi;

                        document.getElementById('edit_id').value = id;
                        document.getElementById('edit_nama_paket').value = nama_paket;
                        document.getElementById('edit_durasi').value = durasi;

                        document.getElementById('editModal').classList.remove('hidden');
                    });
                });
            });
        </script>
    </div>
@endsection
