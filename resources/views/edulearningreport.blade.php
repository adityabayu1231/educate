@section('title', 'Dashboard - Learning Report')

<x-app-layout>
    <div class="py-4">
        <!-- Bagian Judul Utama -->
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-2xl font-semibold">Learning Report ✨</p>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Membagi layar menjadi 12 kolom: 8 kolom untuk kotak, 4 kolom untuk gambar di layar besar -->
            <div class="grid grid-cols-12 gap-4">

                <!-- Kolom Kiri untuk Kotak (span 8 pada desktop, span 12 pada tablet/ponsel) -->
                <div class="col-span-12 lg:col-span-8 flex flex-row space-x-4">
                    <!-- Box 1: My Score -->
                    <div class="flex-1 border rounded-lg shadow-md overflow-hidden bg-white h-96">
                        <div class="border-t-4 border-blue-500 p-6">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar fa-lg text-blue-500"></i>
                                <h2 class="text-lg font-semibold ml-2">My Score</h2>
                            </div>
                        </div>
                        <div class="flex justify-end p-4">
                            <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="My Score"
                                class="h-52 w-auto object-cover">
                        </div>
                    </div>

                    <!-- Box 2: My Report -->
                    <div class="flex-1 border rounded-lg shadow-md overflow-hidden bg-white h-96">
                        <div class="border-t-4 border-green-500 p-6">
                            <div class="flex items-center">
                                <i class="fas fa-file-alt fa-lg text-green-500"></i>
                                <h2 class="text-lg font-semibold ml-2">My Report</h2>
                            </div>
                        </div>
                        <div class="flex justify-end p-4">
                            <img src="{{ asset('frontend/images/ilustrasi/sample.jpg') }}" alt="My Report"
                                class="h-52 w-auto object-cover">
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan untuk Gambar (span 4 pada desktop, hidden pada tablet/ponsel) -->
                {{-- <div class="col-span-4 hidden lg:flex justify-center items-start lg:h-[calc(100vh-4rem)]">
                    <!-- 4rem adalah tinggi navbar -->
                    <!-- hidden di mode ponsel & tablet -->
                    <img src="https://plus.unsplash.com/premium_photo-1664303228186-a61e7dc91597?q=80&w=1892&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Sample Image" class="w-full h-full object-cover">
                    <!-- Menggunakan object-cover untuk full cover gambar -->
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
