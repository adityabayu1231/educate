@extends('layouts.admin')

@section('title', 'Manage Programs')

@section('content')
    <div class="container mx-auto p-4">

        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <!-- Background Image as Cover -->
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <!-- Content: Welcome Message and Button -->
            <div class="relative flex justify-between w-full">
                <!-- Left Section: Welcome Message -->
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Program ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        <!-- Success message with progress bar animation -->
        @if (session('success'))
            <div id="successMessage" class="relative bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
                <div class="absolute bottom-0 left-0 h-1 bg-green-600 animate-shrink"></div>
            </div>
        @endif

        <div class="flex justify-end">
            <!-- Button to open the create modal -->
            <button id="openCreateModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">Tambah
                Program</button>
        </div>

        <!-- Table displaying the programs -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Program Name</th>
                        <th class="py-3 px-6 text-left">Is Active</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Cover Image</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @if ($programs->isEmpty())
                        <tr>
                            <td colspan="8" class="py-3 px-6 text-center text-gray-500"> <!-- Ubah colspan menjadi 8 -->
                                Not Found
                            </td>
                        </tr>
                    @else
                        @foreach ($programs as $index => $program)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 text-left font-medium text-gray-900">{{ $program->name_program }}</td>
                                <td class="py-2 px-4 text-left">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer toggle" data-id="{{ $program->id }}"
                                            {{ $program->is_active ? 'checked' : '' }}>
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </td>

                                <td class="py-3 px-6 text-left">{{ $program->description }}</td>
                                <td class="py-3 px-6 text-left">
                                    @if ($program->cover_image)
                                        <img src="{{ asset('storage/' . $program->cover_image) }}" alt="Cover Image"
                                            class="w-24 h-auto">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <button data-id="{{ $program->id }}" data-name="{{ $program->name_program }}"
                                        data-is-active="{{ $program->is_active }}"
                                        data-is-leads="{{ $program->is_leads }}" data-is-home="{{ $program->is_home }}"
                                        data-description="{{ $program->description }}"
                                        data-cover-image="{{ $program->cover_image }}"
                                        class="flex items-center text-blue-500 hover:text-blue-700 btn-edit">
                                        <i class="fas fa-edit"></i>
                                        <span class="ml-2">Edit</span>
                                    </button>
                                    <form action="{{ route('admin.programs.destroy', $program) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                            <span class="ml-2">Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Create Program Modal -->
        <div id="createModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div
                class="bg-white rounded-lg p-6 w-full max-w-2xl mx-auto my-8 md:my-16 relative overflow-y-auto max-h-[90vh]">
                <h2 class="text-xl font-semibold mb-4">Create Program</h2>
                <form id="createForm" method="POST" action="{{ route('admin.programs.store') }}" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Program Name -->
                        <div class="mb-4">
                            <label for="create_name_program" class="block text-gray-700 text-base">Program Name</label>
                            <input type="text" id="create_name_program" name="name_program"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <!-- Is Active Toggle -->
                        <div class="mb-4">
                            <label for="create_is_active" class="block text-gray-700 text-base">Is Active</label>
                            <!-- Hidden input untuk nilai false -->
                            <input type="hidden" name="is_active" value="0">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="create_is_active" name="is_active" class="sr-only peer"
                                    value="1">
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2 mb-4">
                            <label for="create_description" class="block text-gray-700 text-base">Description</label>
                            <textarea id="create_description" name="description"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Cover Image -->
                        <div class="md:col-span-2 mb-4">
                            <label for="create_cover_image" class="block text-gray-700 text-base">Cover Image</label>
                            <input type="file" id="create_cover_image" name="cover_image"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500">
                            <img id="createImagePreview" src="" alt="Image Preview"
                                class="mt-2 max-w-xs max-h-48 hidden">
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeCreateModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Create</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Edit Modal --}}
        <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div
                class="bg-white rounded-lg p-6 w-full max-w-2xl mx-auto my-8 md:my-16 relative overflow-y-auto max-h-[90vh]">
                <h2 class="text-xl font-semibold mb-4">Edit Program</h2>
                <form id="editForm" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Program Name -->
                        <div class="mb-4">
                            <label for="edit_name_program" class="block text-gray-700 text-base">Program Name</label>
                            <input type="text" id="edit_name_program" name="name_program"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>

                        <!-- Is Active Toggle -->
                        <div class="mb-4">
                            <label for="edit_is_active" class="block text-gray-700 text-base">Is Active</label>
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="edit_is_active" name="is_active" class="sr-only peer">
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2 mb-4">
                            <label for="edit_description" class="block text-gray-700 text-base">Description</label>
                            <textarea id="edit_description" name="description"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <!-- Cover Image -->
                        <div class="md:col-span-2 mb-4">
                            <label for="edit_cover_image" class="block text-gray-700 text-base">Cover Image</label>
                            <input type="file" id="edit_cover_image" name="cover_image"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500">
                            <img id="editImagePreview" src="" alt="Image Preview"
                                class="mt-2 max-w-xs max-h-48 hidden">
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-2">
                        <button type="button" id="closeEditModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            // Show modal function
            function showModal(modalId) {
                document.getElementById(modalId).classList.remove('hidden');
                document.getElementById(modalId).classList.add('flex');
            }

            // Close modal function
            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
                document.getElementById(modalId).classList.remove('flex');
            }

            // Auto-hide modal after 3 seconds and remove success message with animation
            function autoHideModal(modalId) {
                setTimeout(() => {
                    closeModal(modalId);
                }, 3000);
            }

            // Animate the success message progress bar and hide it
            if (document.getElementById('successMessage')) {
                setTimeout(() => {
                    document.getElementById('successMessage').classList.add('hidden');
                }, 3000);
            }

            // Open create modal
            document.getElementById('openCreateModal').addEventListener('click', function() {
                showModal('createModal');
            });

            // Close create modal
            document.getElementById('closeCreateModal').addEventListener('click', function() {
                closeModal('createModal');
            });

            // Open edit modal
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    const programId = this.getAttribute('data-id');
                    const programName = this.getAttribute('data-name');
                    const programIsActive = this.getAttribute('data-is-active') === 'true'; // Set to boolean
                    const programDescription = this.getAttribute('data-description');
                    const programCoverImage = this.getAttribute('data-cover-image');

                    // Update form action URL
                    const form = document.getElementById('editForm');
                    form.action = `/admin/master/programs/${programId}`;

                    // Set values for input fields
                    document.getElementById('edit_name_program').value = programName;
                    document.getElementById('edit_is_active').checked =
                        programIsActive; // Set checkbox checked state
                    document.getElementById('edit_description').value = programDescription;

                    // Update image preview
                    const imgElement = document.getElementById('editImagePreview');
                    imgElement.src = programCoverImage ? `/storage/${programCoverImage}` : '';
                    imgElement.classList.toggle('hidden', !programCoverImage);

                    showModal('editModal');
                });
            });

            // Close edit modal
            document.getElementById('closeEditModal').addEventListener('click', function() {
                closeModal('editModal');
            });

            // Function to preview image on file select
            function previewImage(event, previewId) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.getElementById(previewId);
                    imgElement.src = e.target.result;
                    imgElement.classList.remove('hidden'); // Remove 'hidden' class to display image
                }
                if (file) {
                    reader.readAsDataURL(file);
                }
            }

            // Add event listeners for image previews on create and edit forms
            document.getElementById('create_cover_image').addEventListener('change', function(event) {
                previewImage(event, 'createImagePreview');
            });

            document.getElementById('edit_cover_image').addEventListener('change', function(event) {
                previewImage(event, 'editImagePreview');
            });

            document.querySelectorAll('.toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const programId = this.getAttribute('data-id');
                    const isActive = this.checked ? 1 : 0; // Set is_active value

                    fetch(`/admin/master/programs/${programId}/toggle-active`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                is_active: isActive
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Status updated successfully');
                            } else {
                                console.error('Error updating status:', data.error);
                                alert('Failed to update status.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Something went wrong!');
                        });
                });
            });
        </script>
    @endpush
@endsection
