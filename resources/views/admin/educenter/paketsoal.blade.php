@extends('layouts.admin')

@section('title', 'Manage Data')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-9xl mx-auto">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.edu-center') }}" class=" hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                <i class="fa-solid fa-arrow-left-long"></i> Back
            </a>
            <div class="flex-grow"></div>
            <button id="createDataBtn"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Soal
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-tight">
                        <th class="py-2 px-4 text-center">NO</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Nama Paket</th>
                        <th class="py-2 px-4 text-left">Mapel</th>
                        <th class="py-2 px-4 text-left">Materi</th>
                        <th class="py-2 px-4 text-left">Durasi</th>
                        <th class="py-2 px-4 text-left">Penilaian</th>
                        <th class="py-2 px-4 text-left">Urutan</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Video Pembahasan Platinum</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Video Pembahasan Free</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-2 px-4 text-center">1</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Paket A</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Matematika</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Logaritma</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">35 menit</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Score</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">2</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Video Platinum A</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Video Free A</td>
                        <td class="py-2 px-4 text-right">
                            <div class="flex flex-col space-y-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.addsoal') }}"><button
                                            class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-md w-24">Add
                                            Soal</button></a>
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md w-24">Lihat/Edit</button>
                                </div>
                                <div class="flex space-x-2">
                                    <button
                                        class="bg-purple-500 hover:bg-purple-600 text-white px-2 py-1 rounded-md w-24">Bank
                                        Soal</button>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md w-24"
                                            onclick="return confirm('Are you sure you want to delete this Soal?');">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-2 px-4 text-center">2</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Paket B</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Matematika</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Peluang</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">40 menit</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Score</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">1</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Video Platinum B</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Video Free B</td>
                        <td class="py-2 px-4 text-right">
                            <div class="flex flex-col space-y-2">
                                <div class="flex space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-md w-24">Add
                                        Soal</button>
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md w-24">Lihat/Edit</button>
                                </div>
                                <div class="flex space-x-2">
                                    <button
                                        class="bg-purple-500 hover:bg-purple-600 text-white px-2 py-1 rounded-md w-24">Bank
                                        Soal</button>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md w-24"
                                            onclick="return confirm('Are you sure you want to delete this Soal?');">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-2 px-4 text-center">3</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Paket C</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Matematika</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Statistika</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">30 menit</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Score</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">3</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Video Platinum C</td>
                        <td class="py-2 px-4 text-left whitespace-nowrap">Video Free C</td>
                        <td class="py-2 px-4 text-right">
                            <div class="flex flex-col space-y-2">
                                <div class="flex space-x-2">
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-md w-24">Add
                                        Soal</button>
                                    <button
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md w-24">Lihat/Edit</button>
                                </div>
                                <div class="flex space-x-2">
                                    <button
                                        class="bg-purple-500 hover:bg-purple-600 text-white px-2 py-1 rounded-md w-24">Bank
                                        Soal</button>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md w-24"
                                            onclick="return confirm('Are you sure you want to delete this Soal?');">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="py-4">
                <!-- Tambahkan navigasi pagination jika menggunakan data asli -->
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // JavaScript untuk modal dan aksi lainnya bisa ditambahkan di sini.
        </script>
    @endpush
@endsection
