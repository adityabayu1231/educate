@extends('layouts.admin')

@section('title', 'Manage Brands')

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
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Brand ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center mb-6">
            <button id="createBrandBtn"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Brand
            </button>
        </div>

        @if (session('status'))
            <div
                class="mb-4 max-w-md p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-r-lg shadow-lg transition transform hover:-translate-y-1 hover:shadow-2xl duration-300 ease-in-out">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-tight">
                        <th class="py-2 px-4 text-left">No</th>
                        <th class="py-2 px-4 text-left">Brand Name</th>
                        <th class="py-2 px-4 text-left">Icon</th> <!-- Tambahkan kolom untuk ikon -->
                        <th class="py-2 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @if ($brands->isEmpty())
                        <tr>
                            <td colspan="4" class="py-3 px-4 text-center text-gray-500">
                                Not Found
                            </td>
                        </tr>
                    @else
                        @foreach ($brands as $index => $brand)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4 text-left">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 text-left">{{ $brand->name_brand }}</td>
                                <td class="py-2 px-4 text-left">
                                    @if ($brand->icon_brand)
                                        <img src="{{ Storage::url($brand->icon_brand) }}" alt="Brand Icon"
                                            class="h-8 w-8 object-cover">
                                    @endif
                                </td> <!-- Tampilkan ikon -->
                                <td class="py-2 px-4 text-right">
                                    <button data-id="{{ $brand->id }}" data-name="{{ $brand->name_brand }}"
                                        class="editBrandBtn text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>Edit
                                    </button>
                                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to delete this Brand?');">
                                            <i class="fas fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="py-4">
                {{ $brands->links() }}
            </div>
        </div>

        <!-- Create Modal -->
        <div id="createModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Create Brand</h2>
                <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name_brand" class="block text-gray-700">Brand Name</label>
                        <input type="text" id="name_brand" name="name_brand"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="icon_brand" class="block text-gray-700">Icon Brand</label>
                        <input type="file" id="icon_brand" name="icon_brand"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            accept="image/*" required>
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
                <h2 class="text-xl font-semibold mb-4">Edit Brand</h2>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_name_brand" class="block text-gray-700">Brand Name</label>
                        <input type="text" id="edit_name_brand" name="name_brand"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_icon_brand" class="block text-gray-700">Icon Brand</label>
                        <input type="file" id="edit_icon_brand" name="icon_brand"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            accept="image/*">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeEditModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function showModal(modalId) {
                // Hide all modals
                document.querySelectorAll('.fixed').forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });

                // Show the selected modal
                const modal = document.getElementById(modalId);
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            document.getElementById('createBrandBtn').addEventListener('click', function() {
                showModal('createModal');
            });

            document.getElementById('closeCreateModal').addEventListener('click', function() {
                document.getElementById('createModal').classList.add('hidden');
            });

            document.querySelectorAll('.editBrandBtn').forEach(button => {
                button.addEventListener('click', function() {
                    const brandId = this.getAttribute('data-id');
                    const brandName = this.getAttribute('data-name');
                    const form = document.getElementById('editForm');

                    form.action = `/admin/master/brands/${brandId}`;
                    document.getElementById('edit_name_brand').value = brandName;

                    showModal('editModal');
                });
            });

            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });
        </script>
    @endpush
@endsection
