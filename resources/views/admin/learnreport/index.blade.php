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
                    <h1 class="text-2xl font-bold mb-2 text-black">Learning Report ✨</h1>
                    <p class="text-sm mb-2 text-gray-100">Target Nilai</p>
                </div>
            </div>
        </div>

        <div class="py-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col h-screen bg-gray-100 lg:flex-row">
                <!-- Sidebar untuk mode mobile -->
                <div class="flex flex-col w-full lg:w-1/3 mb-4 lg:mb-0">
                    <div class="grid grid-cols-2 gap-2 lg:hidden"> <!-- Menggunakan grid untuk mobile -->
                        <div class="mb-2">
                            <a href="{{ route('admin.laporanbelajar') }}"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/learning-report')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/learning-report')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Target Nilai</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-kelas')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-kelas')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Nilai Akademik</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-privat')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-privat')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Analisa Coach</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jasmani</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Kesehatan</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Laporan KBM</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Laporan Belajar Siswa</span>
                            </a>
                        </div>
                    </div>
                    <div class="hidden lg:grid lg:grid-cols-1 lg:gap-2"> <!-- Menggunakan grid untuk desktop -->
                        <div class="mb-2">
                            <a href="{{ route('admin.laporanbelajar') }}"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/learning-report')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/learning-report')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Target Nilai</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-kelas')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-kelas')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Nilai Akademik</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-kbm-privat')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-kbm-privat')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Analisa Coach</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Jasmani</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Kesehatan</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Laporan KBM</span>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="#"
                                class="flex items-center pl-2 pr-3 py-2 rounded-lg transition-colors @if (Request::is('admin/jadwal-coaching')) bg-white text-blue-600 @endif">
                                <i
                                    class="fas fa-circle @if (Request::is('admin/jadwal-coaching')) text-blue-600 @else text-gray-400 @endif"></i>
                                <span class="ml-2">Laporan Belajar Siswa</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jadwal Assessment dengan Ikon (Panjang sesuai layar) -->
                <div class="space-y-4 ml-3 w-full">
                    <!-- Card 1 (Akademik) -->
                    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center space-x-4">
                        <i class="fas fa-graduation-cap text-blue-500 text-3xl"></i>
                        <div>
                            <div class="text-xl font-semibold">Akademik</div>
                        </div>
                    </div>

                    <!-- Card 2 (Jasmani) -->
                    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center space-x-4 w-full">
                        <i class="fas fa-running text-green-500 text-3xl"></i>
                        <div>
                            <div class="text-xl font-semibold">Jasmani</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
@endsection
