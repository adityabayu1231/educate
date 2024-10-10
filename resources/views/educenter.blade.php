@section('title', 'Educate - Edu Center')
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-2xl font-semibold">Edu Center 📚</p>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <!-- Box 1: Assessment -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white">
                    <div class="border-t-4 border-blue-500 p-4">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle fa-lg text-blue-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Assessment</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Assessment"
                            class="h-32 w-auto object-cover"> <!-- Gambar di bawah judul -->
                    </div>
                </div>

                <!-- Box 2: Drilling Soal -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white">
                    <div class="border-t-4 border-green-500 p-4">
                        <div class="flex items-center">
                            <i class="fas fa-pencil-alt fa-lg text-green-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Drilling Soal</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Drilling Soal"
                            class="h-32 w-auto object-cover"> <!-- Gambar di bawah judul -->
                    </div>
                </div>

                <!-- Box 3: E-Modul -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white">
                    <div class="border-t-4 border-yellow-500 p-4">
                        <div class="flex items-center">
                            <i class="fas fa-book fa-lg text-yellow-500"></i>
                            <h2 class="text-lg font-semibold ml-2">E-Modul</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="E-Modul"
                            class="h-32 w-auto object-cover"> <!-- Gambar di bawah judul -->
                    </div>
                </div>

                <!-- Box 4: Tryout -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white">
                    <div class="border-t-4 border-red-500 p-4">
                        <div class="flex items-center">
                            <i class="fas fa-clipboard-check fa-lg text-red-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Tryout</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="Tryout"
                            class="h-32 w-auto object-cover"> <!-- Gambar di bawah judul -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
