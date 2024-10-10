@extends('layouts.admin')

@section('title', 'Manage SubPrograms')

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
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Sub Programs ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center mb-6">
            <button id="createSubProgramBtn"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah SubProgram
            </button>
        </div>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-r-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 border-l-4 border-red-500 rounded-r-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-red-500"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- Table SubProgram -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Program</th>
                        <th class="py-3 px-6 text-left">Brand</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @if ($subPrograms->isEmpty())
                        <tr>
                            <td colspan="5" class="py-3 px-6 text-center text-gray-500">
                                Not Found
                            </td>
                        </tr>
                    @else
                        @foreach ($subPrograms as $index => $subProgram)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                                <td class="py-3 px-6 text-left">{{ $subProgram->name_sub_program }}</td>
                                <td class="py-3 px-6 text-left">{{ $subProgram->program->name_program ?? 'N/A' }}</td>
                                <td class="py-3 px-6 text-left">{{ $subProgram->brand->name_brand ?? 'N/A' }}</td>
                                <td class="py-3 px-6 text-right">
                                    <button data-id="{{ $subProgram->id }}" data-program="{{ $subProgram->program_id }}"
                                        data-brand="{{ $subProgram->brand_id }}"
                                        data-name="{{ $subProgram->name_sub_program }}"
                                        class="editSubProgramBtn text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.subprograms.destroy', $subProgram) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to delete this program?');">
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
            <div class="py-4">
                {{ $subPrograms->links() }}
            </div>
        </div>

        <!-- Create Modal -->
        <div id="createModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Create SubProgram</h2>
                <form action="{{ route('admin.subprograms.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="program_id" class="block text-gray-700">Program</label>
                        <select id="program_id" name="program_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Select Program</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="brand_id" class="block text-gray-700">Brand</label>
                        <select id="brand_id" name="brand_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="name_sub_program" class="block text-gray-700">Name</label>
                        <input type="text" id="name_sub_program" name="name_sub_program"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
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
                <h2 class="text-xl font-semibold mb-4">Edit SubProgram</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <!-- Pastikan ada name="id" untuk mengirim ID -->
                    <div class="mb-4">
                        <label for="edit_program_id" class="block text-gray-700">Program</label>
                        <select id="edit_program_id" name="program_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Select Program</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="edit_brand_id" class="block text-gray-700">Brand</label>
                        <select id="edit_brand_id" name="brand_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="edit_name_sub_program" class="block text-gray-700">Name</label>
                        <input type="text" id="edit_name_sub_program" name="name_sub_program"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
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

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const createSubProgramBtn = document.getElementById('createSubProgramBtn');
                const createModal = document.getElementById('createModal');
                const closeCreateModal = document.getElementById('closeCreateModal');

                const editModal = document.getElementById('editModal');
                const closeEditModal = document.getElementById('closeEditModal');
                const editForm = document.getElementById('editForm');

                createSubProgramBtn.addEventListener('click', function() {
                    createModal.classList.remove('hidden');
                    createModal.classList.add('flex');
                });

                closeCreateModal.addEventListener('click', function() {
                    createModal.classList.add('hidden');
                });

                closeEditModal.addEventListener('click', function() {
                    editModal.classList.add('hidden');
                });

                document.querySelectorAll('.editSubProgramBtn').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        const programId = this.getAttribute('data-program');
                        const brandId = this.getAttribute('data-brand');
                        const name = this.getAttribute('data-name');

                        document.getElementById('edit_id').value = id;
                        document.getElementById('edit_program_id').value = programId;
                        document.getElementById('edit_brand_id').value = brandId;
                        document.getElementById('edit_name_sub_program').value = name;

                        editForm.action =
                            `/admin/master/subprograms/${id}`; // Pastikan ini sesuai dengan route yang benar
                        editModal.classList.remove('hidden');
                        editModal.classList.add('flex');
                    });
                });
            });
        </script>
    @endpush
@endsection
