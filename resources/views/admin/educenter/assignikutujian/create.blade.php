@extends('layouts.admin')

@section('title', 'Assign Paket Soal')

@section('content')
    <div class="container mx-auto px-3 py-3">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-6">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Edu Center ✨</h1>
                    <p class="text-md text-gray-100">Data Program Siswa</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
            <div class="col-span-12 md:col-span-6 flex justify-start">
                <a href="{{ route('admin.assign-soal.index') }}" class="text-blue-500 text-sm flex items-center">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ml-2">Back</span>
                </a>
            </div>
            <div class="col-span-12 md:col-span-6 flex justify-end space-x-2 mt-4 md:mt-0">
                <div class="relative inline-block text-left w-full md:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-users text-gray-500"></i>
                    </div>
                    <select
                        class="inline-flex items-center w-full md:w-auto pl-10 pr-3 py-1 bg-gray-200 text-sm rounded-md">
                        <option value="all_students">ALL STUDENT</option>
                        <option value="student_1">Student 1</option>
                        <option value="student_2">Student 2</option>
                        <option value="student_3">Student 3</option>
                    </select>
                </div>
                <div class="relative inline-block text-left w-full md:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-briefcase text-gray-500"></i>
                    </div>
                    <select
                        class="inline-flex items-center w-full md:w-auto pl-10 pr-3 py-1 bg-gray-200 text-sm rounded-md">
                        <option value="all_brands">ALL BRAND</option>
                        <option value="brand_1">Brand 1</option>
                        <option value="brand_2">Brand 2</option>
                        <option value="brand_3">Brand 3</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Pesan error -->
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-12 gap-4 mt-6">
            <div class="col-span-12 lg:col-span-6 mx-auto">
                <form class="space-y-4" method="POST" action="{{ route('admin.assign-soal.store') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <select id="brand" class="mt-1 block w-full border border-gray-300 rounded-md">
                                <option value="">Pilih Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name_brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="program" class="block text-sm font-medium text-gray-700">Program</label>
                            <select id="program" class="mt-1 block w-full border border-gray-300 rounded-md">
                                <option value="">Pilih Program</option>
                                @foreach ($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name_program }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="sub_program" class="block text-sm font-medium text-gray-700">Sub Program</label>
                            <select id="sub_program" class="mt-1 block w-full border border-gray-300 rounded-md" disabled>
                                <option value="" disabled selected>Pilih Sub Program</option>
                            </select>
                        </div>

                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                            <select id="student_id" name="student_id"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                                <option value="" disabled selected>Pilih Siswa</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="nama_sesi" class="block text-sm font-medium text-gray-700">Nama Sesi</label>
                            <select id="nama_sesi" name="test_kelas_id"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                                <option value="" disabled selected>Pilih Test Kelas</option>
                                @foreach ($testKelas as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_test }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="sisa_waktu" class="block text-sm font-medium text-gray-700">Sisa Waktu</label>
                            <input type="text" id="sisa_waktu" name="sisa_waktu"
                                class="mt-1 block w-full border border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="relative">
                        <!-- Trigger button -->
                        <button id="dropdownButton" type="button"
                            class="w-full py-2 px-4 border border-gray-300 bg-white rounded-md shadow-sm text-sm text-gray-700 hover:bg-gray-50 flex justify-between items-center">
                            Pilih Paket Soal
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown options -->
                        <div id="dropdownMenu"
                            class="hidden absolute z-10 w-full mt-2 bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto">
                            <div class="py-2 px-4">
                                @foreach ($pakets as $paket)
                                    <div class="flex items-center mb-2">
                                        <input type="checkbox" id="paket_{{ $paket->id }}" name="paket_soal_id[]"
                                            value="{{ $paket->id }}"
                                            class="text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="paket_{{ $paket->id }}" class="ml-2 text-gray-700 text-sm">
                                            {{ $paket->nama_paket_soal }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <script>
                        // JavaScript to toggle dropdown visibility
                        document.getElementById('dropdownButton').addEventListener('click', function() {
                            document.getElementById('dropdownMenu').classList.toggle('hidden');
                        });

                        // Close dropdown if clicked outside
                        window.addEventListener('click', function(event) {
                            const dropdownMenu = document.getElementById('dropdownMenu');
                            const dropdownButton = document.getElementById('dropdownButton');
                            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                dropdownMenu.classList.add('hidden');
                            }
                        });
                    </script>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                            + Tambahkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const brandSelect = document.getElementById("brand");
                const programSelect = document.getElementById("program");
                const subProgramSelect = document.getElementById("sub_program");
                const namaSiswaSelect = document.getElementById("student_id");

                // Event listeners untuk fetch subprogram
                brandSelect.addEventListener("change", fetchSubprograms);
                programSelect.addEventListener("change", fetchSubprograms);

                async function fetchSubprograms() {
                    const brandId = brandSelect.value;
                    const programId = programSelect.value;

                    if (!brandId || !programId) {
                        subProgramSelect.innerHTML =
                            '<option value="" disabled selected>Pilih Sub Program</option>';
                        subProgramSelect.disabled = true;
                        return;
                    }

                    try {
                        const response = await fetch(
                            `/api/subprograms/search?brand_id=${brandId}&program_id=${programId}`, {
                                headers: {
                                    'Accept': 'application/json'
                                }
                            });

                        if (!response.ok) {
                            console.error("Failed to fetch subprograms. Status:", response.status);
                            subProgramSelect.innerHTML =
                                '<option value="" disabled selected>Pilih Sub Program</option>';
                            subProgramSelect.disabled = true;
                            return;
                        }

                        const subprograms = await response.json();
                        subProgramSelect.innerHTML =
                            '<option value="" disabled selected>Pilih Sub Program</option>';
                        subProgramSelect.disabled = false;

                        subprograms.forEach(subprogram => {
                            subProgramSelect.innerHTML +=
                                `<option value="${subprogram.id}">${subprogram.name_sub_program}</option>`;
                        });

                        // Tambahkan event listener untuk fetch students setelah subprogram dipilih
                        subProgramSelect.addEventListener("change", fetchStudents);
                    } catch (error) {
                        console.error("Error fetching subprograms:", error);
                        subProgramSelect.innerHTML =
                            '<option value="" disabled selected>Pilih Sub Program</option>';
                        subProgramSelect.disabled = true;
                    }
                }

                async function fetchStudents() {
                    const brandId = brandSelect.value;
                    const programId = programSelect.value;
                    const subProgramId = subProgramSelect.value;

                    if (!brandId || !programId || !subProgramId) return;

                    try {
                        const response = await fetch(
                            `http://educate_to.test/api/datasiswa?brand_id=${brandId}&program_id=${programId}&sub_program_id=${subProgramId}`
                        );
                        const students = await response.json();

                        namaSiswaSelect.innerHTML = '<option value="" disabled selected>Pilih Siswa</option>';
                        students.forEach(student => {
                            const fullname = student.user ? student.user.fullname : "Nama tidak tersedia";
                            namaSiswaSelect.innerHTML +=
                                `<option value="${student.id}">${fullname}</option>`;
                        });
                    } catch (error) {
                        console.error("Error fetching students:", error);
                    }
                }
            });
        </script>
    @endpush
@endsection
