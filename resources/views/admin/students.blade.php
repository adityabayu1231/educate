@extends('layouts.admin')

@section('title', 'Manage Students')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Manage Students</h1>
            <form method="GET" action="{{ route('admin.students.index') }}">
                <input type="text" name="search" placeholder="Search students..."
                    class="border border-gray-300 rounded-md px-4 py-2">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md ml-2">Search</button>
            </form>
        </div>

        @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-800">
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Student Name</th>
                        <th class="py-2 px-4">Eduline ID</th>
                        <th class="py-2 px-4">Gender</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $index => $student)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $student->user->name }}</td>
                            <td class="py-2 px-4">{{ $student->eduline_id }}</td>
                            <td class="py-2 px-4">{{ $student->gender }}</td>
                            <td class="py-2 px-4">
                                <button data-id="{{ $student->id }}" data-name="{{ $student->user->name }}"
                                    data-gender="{{ $student->gender }}"
                                    class="editStudentBtn bg-blue-500 text-white px-3 py-1 rounded-md">
                                    Edit
                                </button>
                                <form action="{{ route('admin.students.destroy', $student) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded-md">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">No students found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="py-4">
                {{ $students->links() }}
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Edit Student</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_name" class="block text-gray-700">Student Name</label>
                        <input type="text" id="edit_name" name="name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_gender" class="block text-gray-700">Gender</label>
                        <select id="edit_gender" name="gender"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
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
                document.querySelectorAll('.fixed').forEach(modal => {
                    modal.classList.add('hidden');
                });
                document.getElementById(modalId).classList.remove('hidden');
                document.getElementById(modalId).classList.add('flex');
            }

            document.querySelectorAll('.editStudentBtn').forEach(button => {
                button.addEventListener('click', function() {
                    const studentId = this.getAttribute('data-id');
                    const studentName = this.getAttribute('data-name');
                    const studentGender = this.getAttribute('data-gender');

                    const form = document.getElementById('editForm');
                    form.action = `/admin/students/${studentId}`;
                    document.getElementById('edit_name').value = studentName;
                    document.getElementById('edit_gender').value = studentGender;

                    showModal('editModal');
                });
            });

            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });
        </script>
    @endpush
@endsection
