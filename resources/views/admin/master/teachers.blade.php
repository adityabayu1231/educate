@extends('layouts.admin')

@section('title', 'Manage Teachers')

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
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Guru ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center mb-6">
            <form method="GET" action="{{ route('admin.students.index') }}">
                <input type="text" name="search" placeholder="Search guru..."
                    class="border border-gray-300 rounded-md px-4 py-2">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md ml-2">Search</button>
            </form>
        </div>

        <!-- Display success or error messages -->
        @if (session('status'))
            <div class="mb-4 max-w-md p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-r-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @elseif ($errors->any())
            <div class="mb-4 max-w-md p-4 bg-red-100 text-red-800 border-l-4 border-red-500 rounded-r-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-red-500"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            </div>
        @endif

        <!-- Table for displaying teachers -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-800 uppercase text-xs leading-tight">
                        <th class="py-2 px-4 text-left">No</th>
                        <th class="py-2 px-4 text-left">Full Name</th>
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Subject</th>
                        <th class="py-2 px-4 text-left">Gender</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @forelse ($teachers as $teacher)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $teacher->user->fullname }}</td>
                            <td class="py-2 px-4">{{ $teacher->user->email }}</td>
                            <td class="py-2 px-4">{{ $teacher->subject->name ?? 'N/A' }}</td>
                            <td class="py-2 px-4">{{ ucfirst($teacher->gender) }}</td>
                            <td class="py-2 px-4 text-right">
                                <!-- Edit Button -->
                                <button data-id="{{ $teacher->id }}" data-fullname="{{ $teacher->user->fullname }}"
                                    class="editTeacherBtn text-blue-500 hover:text-blue-700 mr-2">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-3 px-4 text-center text-gray-500">No teachers found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="py-4">
                {{ $teachers->links() }}
            </div>
        </div>

        <!-- Modal for Edit -->
        <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Edit Teacher</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- User ID -->
                    <input type="hidden" id="edit_user_id" name="user_id">

                    <!-- Full Name -->
                    <div class="mb-4">
                        <label for="edit_fullname" class="block text-gray-700">Full Name</label>
                        <input type="text" id="edit_fullname" name="fullname"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="edit_email" class="block text-gray-700">Email</label>
                        <input type="email" id="edit_email" name="email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <!-- Subject -->
                    <div class="mb-4">
                        <label for="edit_subject" class="block text-gray-700">Subject</label>
                        <select id="edit_subject" name="subject_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Gender -->
                    <div class="mb-4">
                        <label for="edit_gender" class="block text-gray-700">Gender</label>
                        <select id="edit_gender" name="gender"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <!-- Religion -->
                    <div class="mb-4">
                        <label for="edit_religion" class="block text-gray-700">Religion</label>
                        <input type="text" id="edit_religion" name="religion"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Place of Birth -->
                    <div class="mb-4">
                        <label for="edit_place_of_birth" class="block text-gray-700">Place of Birth</label>
                        <input type="text" id="edit_place_of_birth" name="place_of_birth"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-4">
                        <label for="edit_date_of_birth" class="block text-gray-700">Date of Birth</label>
                        <input type="date" id="edit_date_of_birth" name="date_of_birth"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="edit_address" class="block text-gray-700">Address</label>
                        <textarea id="edit_address" name="address" rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <!-- University -->
                    <div class="mb-4">
                        <label for="edit_university" class="block text-gray-700">University</label>
                        <input type="text" id="edit_university" name="university"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Degree -->
                    <div class="mb-4">
                        <label for="edit_degree" class="block text-gray-700">Degree</label>
                        <input type="text" id="edit_degree" name="degree"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Major -->
                    <div class="mb-4">
                        <label for="edit_major" class="block text-gray-700">Major</label>
                        <input type="text" id="edit_major" name="major"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- National ID (NIK) -->
                    <div class="mb-4">
                        <label for="edit_nik" class="block text-gray-700">National ID (NIK)</label>
                        <input type="text" id="edit_nik" name="nik"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- CV -->
                    <div class="mb-4">
                        <label for="edit_cv" class="block text-gray-700">CV</label>
                        <input type="file" id="edit_cv" name="cv"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Bank -->
                    <div class="mb-4">
                        <label for="edit_bank" class="block text-gray-700">Bank</label>
                        <input type="text" id="edit_bank" name="bank"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Account Number -->
                    <div class="mb-4">
                        <label for="edit_account_number" class="block text-gray-700">Account Number</label>
                        <input type="text" id="edit_account_number" name="account_number"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Account Name -->
                    <div class="mb-4">
                        <label for="edit_account_name" class="block text-gray-700">Account Name</label>
                        <input type="text" id="edit_account_name" name="account_name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Submit and Cancel buttons -->
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
            // Function to show the edit modal
            document.querySelectorAll('.editTeacherBtn').forEach(button => {
                button.addEventListener('click', function() {
                    const teacherId = this.getAttribute('data-id');
                    fetch(`/admin/teachers/${teacherId}/edit`) // Assuming you have an edit route
                        .then(response => response.json())
                        .then(data => {
                            if (data) {
                                document.getElementById('edit_id').value = data.id;
                                document.getElementById('place_of_birth').value = data.place_of_birth;
                                document.getElementById('date_of_birth').value = data.date_of_birth;
                                document.getElementById('gender').value = data.gender;
                                document.getElementById('religion').value = data.religion;
                                document.getElementById('address').value = data.address;
                                document.getElementById('university').value = data.university;
                                document.getElementById('degree').value = data.degree;
                                document.getElementById('major').value = data.major;
                                document.getElementById('achievements').value = data.achievements;
                                document.getElementById('notes').value = data.notes;
                                document.getElementById('nik').value = data.nik;
                                document.getElementById('bank').value = data.bank;
                                document.getElementById('account_number').value = data.account_number;
                                document.getElementById('account_name').value = data.account_name;

                                // Show the modal
                                showModal('editModal');
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching teacher data:', error);
                        });
                });
            });

            // Close modal functionality
            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });
        </script>
    @endpush
@endsection
