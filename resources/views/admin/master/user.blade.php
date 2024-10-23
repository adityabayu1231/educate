@extends('layouts.admin')

@section('title', 'Manage Users')

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
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages User ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center mb-6">
            <button id="createUserBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                <i class="fas fa-plus mr-2"></i> Create User
            </button>
        </div>

        @if (session('status'))
            <div class="mb-4 max-w-md p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-r-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="data-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-tight">
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
                            <span class="flex items-center">
                                FullName
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Email
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Role
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
                        <th class="py-2 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @if ($users->isEmpty())
                        <tr>
                            <td colspan="6" class="py-3 px-4 text-center text-gray-500">Not Found</td>
                        </tr>
                    @else
                        @foreach ($users as $index => $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4 text-left">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 text-left">{{ $user->fullname }}</td>
                                <td class="py-2 px-4 text-left">{{ $user->email }}</td>
                                <td class="py-2 px-4 text-left">{{ $user->role->name }}</td>
                                <td class="py-2 px-4 text-left">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer toggle"
                                            data-id="{{ $user->id }}" {{ $user->is_active ? 'checked' : '' }}>
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </td>
                                <td class="py-2 px-4 text-right">
                                    <button data-id="{{ $user->id }}" data-fullname="{{ $user->fullname }}"
                                        data-email="{{ $user->email }}" data-password="{{ $user->password }}"
                                        class="editUserBtn text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
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
                {{ $users->links() }}
            </div>
        </div>

        <!-- Create Modal -->
        <div id="createModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Create User</h2>
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="fullname" class="block text-gray-700">Full Name</label>
                        <input type="text" id="fullname" name="fullname"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="role_id" class="block text-gray-700">Role</label>
                        <select id="role_id" name="role_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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
        <div id="editModal" class="fixed inset-0 items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Edit User</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH') <!-- Mengubah metode menjadi PATCH -->
                    <div class="mb-4">
                        <label for="edit_fullname" class="block text-gray-700">Full Name</label>
                        <input type="text" id="edit_fullname" name="fullname"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_email" class="block text-gray-700">Email</label>
                        <input type="email" id="edit_email" name="email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="old_password" class="block text-gray-700">Old Password</label>
                        <input type="text" id="old_password" name="old_password" readonly
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="new_password" class="block text-gray-700">New Password</label>
                        <input type="password" id="new_password" name="new_password"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="edit_role_id" class="block text-gray-700">Role</label>
                        <select id="edit_role_id" name="role_id"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
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
                    modal.classList.remove('flex');
                });

                const modal = document.getElementById(modalId);
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            document.getElementById('createUserBtn').addEventListener('click', function() {
                showModal('createModal');
            });

            document.getElementById('closeCreateModal').addEventListener('click', function() {
                document.getElementById('createModal').classList.add('hidden');
            });

            document.querySelectorAll('.editUserBtn').forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-id');
                    const userFullname = this.getAttribute('data-fullname');
                    const userEmail = this.getAttribute('data-email');
                    const userPassword = this.getAttribute('data-password'); // Ambil password lama
                    const form = document.getElementById('editForm');

                    form.action = `/admin/master/users/${userId}`;
                    document.getElementById('edit_fullname').value = userFullname;
                    document.getElementById('edit_email').value = userEmail;
                    document.getElementById('old_password').value = userPassword; // Set password lama

                    showModal('editModal');
                });
            });

            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });

            document.querySelectorAll('.toggle').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const userId = this.getAttribute('data-id');
                    const isActive = this.checked ? 1 : 0;

                    fetch(`/admin/master/users/${userId}/toggle`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                is_active: isActive
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            this.checked = !this.checked; // Revert state jika ada error
                        });
                });
            });
        </script>
    @endpush
@endsection
