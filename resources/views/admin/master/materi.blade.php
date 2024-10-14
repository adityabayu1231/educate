@extends('layouts.admin')

@section('title', 'Manage Materi')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-9xl mx-auto">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Materi ✨</h1>
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center mb-6">
            <button id="createBrandBtn"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Brand
            </button>
        </div>

        @if ($brands->isEmpty())
            <p class="text-center text-gray-500">Not Found</p>
        @else
            <div class="w-full">
                <h1 class="text-2xl font-bold mb-4">Program</h1>

                <!-- Setiap card dalam satu baris -->
                <div class="space-y-2"> <!-- Mengurangi space antara card -->
                    @foreach ($brands as $brand)
                        <div class="bg-white p-4 rounded-lg shadow flex items-center w-full">
                            <div class="bg-gray-200 text-white p-2 rounded-full"> <!-- Mengurangi padding lingkaran -->
                                @if ($brand->icon_brand)
                                    <img src="{{ Storage::url($brand->icon_brand) }}" alt="Brand Icon"
                                        class="h-8 w-8 object-cover rounded-full"> <!-- Mengurangi ukuran ikon -->
                                @else
                                    <span class="text-lg font-bold">B</span> <!-- Mengurangi ukuran huruf -->
                                @endif
                            </div>
                            <div class="ml-3"> <!-- Mengurangi margin kiri -->
                                <h2 class="text-lg font-semibold">{{ $brand->name_brand }}</h2>
                                <!-- Mengurangi ukuran judul -->
                                <p class="text-gray-500 text-sm">Lorem ipsum dolor sit amet</p>
                                <!-- Mengurangi ukuran teks -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="py-4">
                {{ $brands->links() }}
            </div>
        @endif
    </div>
@endsection
