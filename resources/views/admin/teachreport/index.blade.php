@extends('layouts.admin')

@section('title', 'Teaching Report')

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
                    <h1 class="text-2xl font-bold mb-2 text-black">Teaching Report ✨</h1>
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl py-4 mx-auto sm:px-6 lg:px-8">
            <!-- Responsive grid for boxes: full width on desktop, 2 boxes on tablets, 1 on mobile -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Box 1: Teaching Report KBM -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white h-96">
                    <div class="border-t-4 border-blue-500 p-6">
                        <div class="flex items-center">
                            <i class="fas fa-chart-bar fa-lg text-blue-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Teaching Report KBM</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Teach Report"
                            class="h-52 w-auto object-cover">
                    </div>
                </div>

                <!-- Box 2: Teaching Report Fee -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white h-96">
                    <div class="border-t-4 border-green-500 p-6">
                        <div class="flex items-center">
                            <i class="fas fa-file-alt fa-lg text-green-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Teaching Report Fee</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Teaching Report"
                            class="h-52 w-auto object-cover">
                    </div>
                </div>

                <!-- Box 3: Teaching Report Schedule -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white h-96">
                    <div class="border-t-4 border-yellow-500 p-6">
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt fa-lg text-yellow-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Teaching Report Rating Guru</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Schedule"
                            class="h-52 w-auto object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
@endsection
