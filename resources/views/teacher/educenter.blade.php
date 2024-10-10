@section('title', 'Educate - Edu Center')
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-2xl font-semibold">Edu Center 📚</p>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <!-- Box 1: Assessment -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white min-h-[350px]"> <!-- Tambah min-h -->
                    <div class="border-t-4 border-blue-500 p-4">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle fa-lg text-blue-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Bank Soal</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-6"> <!-- Ubah padding jadi p-6 -->
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="banksoal"
                            class="h-40 w-auto object-cover"> <!-- Ubah tinggi gambar -->
                    </div>
                </div>

                <!-- Box 2: Drilling Soal -->
                <div class="border rounded-lg shadow-md overflow-hidden bg-white min-h-[350px]"> <!-- Tambah min-h -->
                    <div class="border-t-4 border-green-500 p-4">
                        <div class="flex items-center">
                            <i class="fas fa-pencil-alt fa-lg text-green-500"></i>
                            <h2 class="text-lg font-semibold ml-2">Silabus</h2>
                        </div>
                    </div>
                    <div class="flex justify-end p-6"> <!-- Ubah padding jadi p-6 -->
                        <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="silabus"
                            class="h-40 w-auto object-cover"> <!-- Ubah tinggi gambar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
