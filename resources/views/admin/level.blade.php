@extends('layouts.admin')

@section('title', 'Manage Jenjang')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Manage Jenjang</h1>
            <button id="createLevelBtn"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Create Jenjang
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
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Jenjang</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @if ($levels->isEmpty())
                        <tr>
                            <td colspan="3" class="py-3 px-6 text-center text-gray-500">Not Found</td>
                        </tr>
                    @else
                        @foreach ($levels as $level)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                                <td class="py-3 px-6 text-left">{{ $level->name_level }}</td>
                                <td class="py-3 px-6 text-right">
                                    <button data-id="{{ $level->id }}" data-name="{{ $level->name_level }}"
                                        class="editLevelBtn text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.levels.destroy', $level) }}" method="POST"
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

            <!-- Pagination Links -->
            <div class="py-4">
                {{ $levels->links() }}
            </div>
        </div>

        <!-- Create Modal -->
        <div id="createModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Create Jenjang</h2>
                <form action="{{ route('admin.levels.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name_level" class="block text-gray-700">Jenjang Name</label>
                        <input type="text" id="name_level" name="name_level"
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
                <h2 class="text-xl font-semibold mb-4">Edit Level</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_name_level" class="block text-gray-700">Level Name</label>
                        <input type="text" id="edit_name_level" name="name_level"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
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

            document.getElementById('createLevelBtn').addEventListener('click', function() {
                showModal('createModal');
            });

            document.getElementById('closeCreateModal').addEventListener('click', function() {
                document.getElementById('createModal').classList.add('hidden');
            });

            document.querySelectorAll('.editLevelBtn').forEach(button => {
                button.addEventListener('click', function() {
                    const levelId = this.getAttribute('data-id');
                    const levelName = this.getAttribute('data-name');
                    const form = document.getElementById('editForm');

                    form.action = `/admin/master/levels/${levelId}`;
                    document.getElementById('edit_name_level').value = levelName;

                    showModal('editModal');
                });
            });

            document.getElementById('closeEditModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });
        </script>
    @endpush
@endsection
