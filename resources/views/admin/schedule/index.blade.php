@extends('layouts.admin')

@section('title', 'Jadwal Assessment')

@section('content')
    <div class="py-2">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <!-- Background Image as Cover -->
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <!-- Content: Welcome Message and Button -->
            <div class="relative flex justify-between w-full">
                <!-- Left Section: Welcome Message -->
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Jadwal Assessment ✨</h1>
                </div>
            </div>
        </div>

        <div class="py-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col h-screen bg-gray-100 lg:flex-row">
                <!-- Sidebar untuk mode mobile -->
                <div class="flex flex-col w-full lg:w-1/3 mb-4 lg:mb-0">
                    <div class="grid grid-cols-2 gap-2 lg:hidden"> <!-- Menggunakan grid untuk mobile -->
                        <div class="mb-2">
                            <a href="{{ route('admin.jadwalkelas') }}"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/schedule')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/schedule')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal Assessment</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-kelas')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-kelas')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal KBM Kelas</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-privat')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-privat')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal KBM Privat</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal Coaching</span>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:grid lg:grid-cols-1 lg:gap-2"> <!-- Menggunakan grid untuk desktop -->
                        <div class="mb-2">
                            <a href="{{ route('admin.jadwalkelas') }}"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/schedule')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/schedule')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal Assessment</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-kelas')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-kelas')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal KBM Kelas</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-privat')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-privat')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal KBM Privat</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jadwal Coaching</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tabel Jadwal Assessment -->
                <div class="flex-grow p-4 overflow-x-auto">
                    <table class="min-w-full table-auto bg-white border-collapse shadow-lg rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-r from-blue-500 to-purple-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold">NO</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap">NAMA SISWA</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">TANGGAL</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">LOKASI</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">WAKTU</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">MAPEL</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">MATERI</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="px-4 py-2 border-b border-gray-200 text-sm">1</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Ahmad</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">12 September 2023
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Cibubur</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">13:00 - 15:00</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Matematika</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Aritmatika</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Tidak ada</td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="px-4 py-2 border-b border-gray-200 text-sm">2</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Budi</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">13 September 2023
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Jakarta</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">10:00 - 12:00</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Bahasa Inggris</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Tenses</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Tidak ada</td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="px-4 py-2 border-b border-gray-200 text-sm">3</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Siti</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">14 September 2023
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Depok</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">08:00 - 09:30</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Fisika</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Gerak</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Siap</td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="px-4 py-2 border-b border-gray-200 text-sm">4</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Diana</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">15 September 2023
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Tangerang</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">11:00 - 13:00</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Kimia</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Reaksi Kimia</td>
                                <td class="px-4 py-2 border-b border-gray-200 text-sm whitespace-nowrap">Perlu Persiapan
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
@endsection
