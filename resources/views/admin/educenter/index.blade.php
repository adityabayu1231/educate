@extends('layouts.admin')

@section('title', 'Edu Center')

@section('content')
    <div class="py-2">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Edu Center ✨</h1>
                </div>
            </div>
        </div>

        <div class="max-w-7xl py-4 mx-auto sm:px-6 lg:px-8">
            <!-- Responsive grid for boxes: full width on desktop, 2 boxes on tablets, 1 on mobile -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- Box 1: E-Module -->
                <a href="{{ route('admin.e-module') }}">
                    <div class="border rounded-lg shadow-md overflow-hidden bg-white h-96 hover:shadow-lg transition">
                        <div class="border-t-4 border-blue-500 p-6">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar fa-lg text-blue-500"></i>
                                <h2 class="text-lg font-semibold ml-2">E-Module</h2>
                            </div>
                        </div>
                        <div class="flex justify-end p-4">
                            <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="E-Module"
                                class="h-52 w-auto object-cover">
                        </div>
                    </div>
                </a>

                <!-- Box 2: Paket Soal -->
                <a href="{{ route('admin.paket-soal') }}">
                    <div class="border rounded-lg shadow-md overflow-hidden bg-white h-96 hover:shadow-lg transition">
                        <div class="border-t-4 border-green-500 p-6">
                            <div class="flex items-center">
                                <i class="fas fa-file-alt fa-lg text-green-500"></i>
                                <h2 class="text-lg font-semibold ml-2">Paket Soal</h2>
                            </div>
                        </div>
                        <div class="flex justify-end p-4">
                            <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Paket Soal"
                                class="h-52 w-auto object-cover">
                        </div>
                    </div>
                </a>

                <!-- Box 3: Assign Paket Soal -->
                <div id="assignPaketSoalBox"
                    class="border rounded-lg shadow-md overflow-hidden bg-white h-96 hover:shadow-lg transition relative group cursor-pointer">
                    <!-- Konten Utama (Ikon & Teks) -->
                    <div class="border-t-4 border-yellow-500 p-6 relative z-10">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt fa-lg text-yellow-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Assign Paket Soal</h2>
                        </div>
                    </div>
                    <!-- Gambar -->
                    <div class="flex justify-end p-4 relative z-10">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Assign Paket Soal"
                            class="h-52 w-auto object-cover">
                    </div>

                    <!-- Sub-Menu (disembunyikan secara default) -->
                    <div id="assignPaketSoalMenu"
                        class="absolute inset-0 bg-gray-900 bg-opacity-70  flex-col items-center justify-center opacity-0 transition-opacity duration-300 z-20 hidden">
                        <a href="{{ route('admin.assign-soal.index') }}"><button
                                class="bg-yellow-500 text-white px-4 py-2 rounded-lg mb-2 hover:bg-yellow-600 transition">Menu
                                Assign Paket Soal</button></a>
                        <a href="{{ route('admin.test-kelas.index') }}"><button
                                class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">Menu
                                Test Kelas</button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const box = document.getElementById('assignPaketSoalBox');
                const menu = document.getElementById('assignPaketSoalMenu');

                box.addEventListener('click', function() {
                    if (menu.classList.contains('hidden')) {
                        // Tampilkan menu
                        menu.classList.remove('hidden');
                        menu.classList.add('flex');
                        setTimeout(() => {
                            menu.classList.add('opacity-100'); // Tambahkan opacity agar smooth
                            menu.classList.remove('opacity-0');
                        }, 10);
                    } else {
                        // Sembunyikan menu
                        menu.classList.add('opacity-0');
                        menu.classList.remove('opacity-100');
                        setTimeout(() => {
                            menu.classList.add('hidden');
                        }, 300);
                    }
                });
            });
        </script>
    @endpush
@endsection
