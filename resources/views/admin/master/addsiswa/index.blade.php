@extends('layouts.admin')

@section('title', 'Manage Siswa')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-9xl mx-auto">
        <!-- Banner/Header -->
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Manage Siswa Kelas: {{ $kelas->name_class }} ✨</h1>
                    <p class="text-md text-gray-100">Data siswa yang terdaftar di kelas ini</p>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali dan Tambah Siswa -->
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.kelas.index') }}"
                class="hover:bg-blue-500 hover:text-white text-gray-800 px-4 py-2 rounded-md">
                <i class="fa-solid fa-arrow-left-long"></i> Back
            </a>
            <div class="flex-grow"></div>
            <!-- Modal toggle -->
            <button id="openModalBtn"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
                Tambah Siswa
            </button>
        </div>

        <!-- Flash Message jika ada -->
        @if (session('status'))
            <div class="mb-4 max-w-md p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-r-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <!-- Tabel Data Siswa -->
        <div class="overflow-x-auto">
            <table id="data-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="py-2 px-4 text-left">No</th>
                        <th class="py-2 px-4 text-left">Nama Siswa</th>
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Tanggal Lahir</th>
                        <th class="py-2 px-4 text-left">Nama Kelas</th>
                        <th class="py-2 px-4 text-left">Program</th>
                        <th class="py-2 px-4 text-left">Sub Program</th>
                        <th class="py-2 px-4 text-left">Brand</th>
                        <th class="py-2 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($students->isEmpty())
                        <tr>
                            <td colspan="9" class="py-3 px-4 text-center text-gray-500">Not Found</td>
                        </tr>
                    @else
                        @foreach ($students as $index => $student)
                            <tr class="hover:bg-gray-50 cursor-pointer">
                                <td class="py-2 px-4 text-left">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 text-left">{{ $student->user->fullname }}</td>
                                <td class="py-2 px-4 text-left">{{ $student->user->email }}</td>
                                <td class="py-2 px-4 text-left">{{ $student->date_of_birth }}</td>
                                <td class="py-2 px-4 text-left">{{ $kelas->name_class }}</td>
                                <td class="py-2 px-4 text-left">{{ $kelas->program->name_program }}</td>
                                <td class="py-2 px-4 text-left">{{ $kelas->subprogram->name_sub_program }}</td>
                                <td class="py-2 px-4 text-left">{{ $kelas->brand->name_brand }}</td>
                                <td class="py-2 px-4 text-left">
                                    <form action="{{ route('admin.students.removeClass', $student->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to remove this student from the class?');">
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

        <!-- Main modal -->
        <div id="studentModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Pilih Siswa</h2>
                <form id="studentForm" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="students" class="block text-gray-700">Pilih Siswa</label>
                        <select id="students" name="students"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <!-- Options will be dynamically populated -->
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeStudentModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Cancel</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            // Button to open the modal
            $('#openModalBtn').click(function() {
                const kelasId = {{ $kelas->id }}; // Ambil ID kelas
                $.ajax({
                    url: `/admin/master/kelas/${kelasId}/get-students`, // Rute untuk mengambil siswa
                    method: 'GET',
                    success: function(data) {
                        $('#students').empty(); // Kosongkan opsi yang ada

                        if (data.length === 0) {
                            $('#students').append(
                                '<option value="" disabled selected>Data Not Found</option>'
                            );
                            $('#students').prop('disabled', true); // Nonaktifkan select
                        } else {
                            $('#students').prop('disabled', false); // Aktifkan select
                            data.forEach(student => {
                                $('#students').append(`
                                    <option value="${student.id}">${student.user.fullname}</option>
                                `);
                            });
                        }

                        $('#studentModal').removeClass('hidden'); // Tampilkan modal
                        $('#studentModal').addClass('flex'); // Tampilkan modal
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + error);
                        alert("An error occurred while fetching students.");
                    }
                });
            });

            // Handle the form submission
            $('#studentForm').submit(function(event) {
                event.preventDefault(); // Prevent page refresh
                const selectedStudent = $('#students').val(); // Get selected student
                const kelasId = {{ $kelas->id }}; // Ambil ID kelas

                // Send AJAX request to update class_id for student
                $.ajax({
                    url: `/admin/master/kelas/${kelasId}/add-students`, // Rute untuk menambahkan siswa
                    method: 'PATCH',
                    data: {
                        students: selectedStudent,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#studentModal').addClass('hidden'); // Hide modal
                        location.reload(); // Reload page to update data
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + error);
                        alert("An error occurred while adding students.");
                    }
                });
            });

            // Close the modal when the cancel button is clicked
            $('#closeStudentModal').click(function() {
                $('#studentModal').addClass('hidden');
                $('#studentModal').removeClass('flex');
            });

            // Close modal if clicked outside modal content
            window.addEventListener('click', function(e) {
                const modal = document.getElementById('studentModal');
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
