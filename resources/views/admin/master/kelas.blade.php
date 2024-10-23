@extends('layouts.admin')

@section('title', 'Manage Kelas')

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
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Kelas ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="relative bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
                <div class="absolute bottom-0 left-0 h-1 bg-green-600 animate-shrink"></div>
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

        <div class="flex justify-end mb-4">
            <!-- Create New Kelas Button -->
            <button id="openCreateModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                <i class="fas fa-plus mr-2"></i> Tambah Kelas
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="data-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-normal">
                        <th>
                            <span class="flex items-center">
                                No
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Nama Kelas
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Tahun Ajaran
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Kapasitas
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Status
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Jenis Pembelajaran
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Program
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Sub Program
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Brand
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @if ($kelass->isEmpty())
                        <tr>
                            <td colspan="10" class="py-3 px-6 text-center text-gray-500">No Data Found</td>
                        </tr>
                    @else
                        @foreach ($kelass as $index => $kelas)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->name_class }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->tahun_ajar }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->kapasitas }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->jenis_pembelajaran }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->program->name_program }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->subprogram->name_sub_program }}</td>
                                <td class="py-3 px-6 text-left">{{ $kelas->brand->name_brand }}</td>
                                <td class="py-3 px-6 text-right">
                                    <button class="bg-yellow-500 text-white px-4 py-1 rounded btn-edit"
                                        data-id="{{ $kelas->id }}" data-name-class="{{ $kelas->name_class }}"
                                        data-tahun-ajar="{{ $kelas->tahun_ajar }}"
                                        data-jenis-pembelajaran="{{ $kelas->jenis_pembelajaran }}"
                                        data-kapasitas="{{ $kelas->kapasitas }}" data-status="{{ $kelas->status }}"
                                        data-program-id="{{ $kelas->program_id }}"
                                        data-subprogram-id="{{ $kelas->subprogram_id }}"
                                        data-brand-id="{{ $kelas->brand_id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.kelas.destroy', $kelas->id) }}" method="POST"
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

        <!-- Create Kelas Modal -->
        <div id="createModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-plus-circle mr-2 text-blue-500"></i> Create Kelas
                </h2>
                <form id="createForm" method="POST" action="{{ route('admin.kelas.store') }}">
                    @csrf
                    <div class="flex flex-wrap -mx-2">
                        <!-- Nama Kelas -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_name_class" class="block text-gray-700 text-sm">Nama Kelas</label>
                            <input type="text" id="create_name_class" name="name_class"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Tahun Ajar -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_tahun_ajar" class="block text-gray-700 text-sm">Tahun Ajar</label>
                            <input type="text" id="create_tahun_ajar" name="tahun_ajar"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Kapasitas -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_kapasitas" class="block text-gray-700 text-sm">Kapasitas</label>
                            <input type="number" id="create_kapasitas" name="kapasitas"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Status -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_status" class="block text-gray-700 text-sm">Status</label>
                            <select id="create_status" name="status"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Jenis Pembelajaran -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_jenis_pembelajaran" class="block text-gray-700 text-sm">Jenis
                                Pembelajaran</label>
                            <input type="text" id="create_jenis_pembelajaran" name="jenis_pembelajaran"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Brand -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_brand_id" class="block text-gray-700 text-sm">Brand</label>
                            <select id="create_brand_id" name="brand_id"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Program -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_program_id" class="block text-gray-700 text-sm">Program</label>
                            <select id="create_program_id" name="program_id"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sub Program -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="create_subprogram_id" class="block text-gray-700 text-sm">Sub Program</label>
                            <select id="create_subprogram_id" name="subprogram_id"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required disabled>
                                <option value="" disabled selected>Pilih Sub Program</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" id="closeCreateModal"
                            class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Create Kelas Modal -->

        <!-- Edit Kelas Modal -->
        <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-edit mr-2 text-yellow-500"></i> Edit Kelas
                </h2>
                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-2">
                        <!-- Nama Kelas -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_name_class" class="block text-gray-700 text-sm">Nama Kelas</label>
                            <input type="text" id="edit_name_class" name="name_class"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Tahun Ajar -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_tahun_ajar" class="block text-gray-700 text-sm">Tahun Ajar</label>
                            <input type="text" id="edit_tahun_ajar" name="tahun_ajar"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Kapasitas -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_kapasitas" class="block text-gray-700 text-sm">Kapasitas</label>
                            <input type="number" id="edit_kapasitas" name="kapasitas"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Status -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_status" class="block text-gray-700 text-sm">Status</label>
                            <select id="edit_status" name="status"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Jenis Pembelajaran -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_jenis_pembelajaran" class="block text-gray-700 text-sm">Jenis
                                Pembelajaran</label>
                            <input type="text" id="edit_jenis_pembelajaran" name="jenis_pembelajaran"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                        </div>

                        <!-- Brand -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_brand_id" class="block text-gray-700 text-sm">Brand</label>
                            <select id="edit_brand_id" name="brand_id"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Program -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_program_id" class="block text-gray-700 text-sm">Program</label>
                            <select id="edit_program_id" name="program_id"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sub Program -->
                        <div class="w-full md:w-1/2 px-2 mb-4">
                            <label for="edit_subprogram_id" class="block text-gray-700 text-sm">Sub Program</label>
                            <select id="edit_subprogram_id" name="subprogram_id"
                                class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                                @foreach ($subprograms as $subprogram)
                                    <option value="{{ $subprogram->id }}">{{ $subprogram->name_sub_program }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" id="closeEditModal"
                            class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Edit Kelas Modal -->

    </div>
    @push('scripts')
        <script>
            document.getElementById('openCreateModal').addEventListener('click', function() {
                document.getElementById('createModal').classList.remove('hidden');
            });

            document.getElementById('closeCreateModal').addEventListener('click', function() {
                document.getElementById('createModal').classList.add('hidden');
            });

            const editButtons = document.querySelectorAll('.btn-edit');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const nameClass = this.dataset.nameClass;
                    const tahunAjar = this.dataset.tahunAjar;
                    const kapasitas = this.dataset.kapasitas;
                    const status = this.dataset.status;
                    const programId = this.dataset.programId;
                    const subprogramId = this.dataset.subprogramId;
                    const brandId = this.dataset.brandId;
                    const jenisPembelajaran = this.dataset.jenisPembelajaran;

                    const editForm = document.getElementById('editForm');
                    editForm.action = `/admin/master/kelas/${id}`;

                    document.getElementById('edit_name_class').value = nameClass;
                    document.getElementById('edit_tahun_ajar').value = tahunAjar;
                    document.getElementById('edit_kapasitas').value = kapasitas;
                    document.getElementById('edit_status').value = status;
                    document.getElementById('edit_program_id').value = programId;
                    document.getElementById('edit_subprogram_id').value = subprogramId;
                    document.getElementById('edit_brand_id').value = brandId;
                    document.getElementById('edit_jenis_pembelajaran').value = jenisPembelajaran;

                    document.getElementById('editModal').classList.remove('hidden');
                });
            });

            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });

            // Misalkan Anda memiliki tombol hapus dalam tabel
            $('.delete-button').on('click', function() {
                const kelasId = $(this).data('id'); // Ambil ID kelas dari atribut data
                const url = `/admin/master/kelas/${kelasId}`; // Sesuaikan dengan URL route Anda

                if (confirm('Apakah Anda yakin ingin menghapus kelas ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        success: function(response) {
                            alert(response.message);
                            // Hapus elemen tabel kelas dari tampilan, atau reload halaman
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Terjadi kesalahan saat menghapus kelas.');
                        }
                    });
                }
            });

            document.addEventListener("DOMContentLoaded", () => {
                const createBrandSelect = document.getElementById("create_brand_id");
                const createProgramSelect = document.getElementById("create_program_id");
                const createSubprogramSelect = document.getElementById("create_subprogram_id");

                // Event listener untuk perubahan pada brand
                createBrandSelect.addEventListener("change", fetchSubprograms);
                createProgramSelect.addEventListener("change", fetchSubprograms);

                async function fetchSubprograms() {
                    const brandId = createBrandSelect.value;
                    const programId = createProgramSelect.value;

                    // Pastikan brand_id dan program_id terpilih
                    if (!brandId || !programId) {
                        createSubprogramSelect.innerHTML =
                            '<option value="" disabled selected>Pilih Sub Program</option>';
                        createSubprogramSelect.disabled = true;
                        return;
                    }

                    try {
                        const response = await fetch(
                            `http://educate_to.test/api/subprograms/search?brand_id=${brandId}&program_id=${programId}`
                        );

                        // Cek apakah status response OK (200)
                        if (!response.ok) {
                            console.error("Failed to fetch subprograms. Status:", response.status);
                            createSubprogramSelect.innerHTML =
                                '<option value="" disabled selected>Pilih Sub Program</option>';
                            createSubprogramSelect.disabled = true;
                            return;
                        }

                        const subprograms = await response.json();
                        console.log("Subprograms fetched successfully:", subprograms);

                        // Clear previous options
                        createSubprogramSelect.innerHTML =
                            '<option value="" disabled selected>Pilih Sub Program</option>';
                        createSubprogramSelect.disabled = false; // Enable the select

                        // Loop through the fetched subprograms and create option elements
                        subprograms.forEach(subprogram => {
                            const option = document.createElement("option");
                            option.value = subprogram.id;
                            option.textContent = subprogram.name_sub_program;
                            createSubprogramSelect.appendChild(option);
                        });
                    } catch (error) {
                        console.error("Error fetching subprograms:", error);
                        createSubprogramSelect.innerHTML =
                            '<option value="" disabled selected>Pilih Sub Program</option>';
                        createSubprogramSelect.disabled = true;
                    }
                }
            });
        </script>
    @endpush
@endsection
