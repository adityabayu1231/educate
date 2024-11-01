@section('title', 'Educate - Assessment')
<x-app-layout>
    <div class="py-4">
        <div class="flex min-h-screen bg-gray-100 p-8 flex-wrap">
            <!-- Back Button and Table Section -->
            <div class="w-full lg:w-2/3 mb-6 lg:mb-0">
                <div class="mb-6">
                    <a href="{{ route('user.asmn') }}">
                        <button class="font-bold text-blue-500">&larr; back</button>
                    </a>
                </div>

                <!-- Table with Horizontal Scroll -->
                <div class="overflow-x-auto rounded-lg bg-white shadow-md">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600">NO</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600 whitespace-nowrap">Nama Siswa
                                </th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600 whitespace-nowrap">Nama Test
                                    Kelas</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600 whitespace-nowrap">Nama Paket
                                    Soal</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600 whitespace-nowrap">Tanggal
                                    Mulai</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600 whitespace-nowrap">Tanggal
                                    Berakhir</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ikutTests as $index => $ikutTest)
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-gray-700">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                        {{ $ikutTest->student->user->fullname ?? 'Data Tidak Tersedia' }}</td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                        {{ $ikutTest->testKelas->nama_test ?? 'Data Tidak Tersedia' }}</td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                        {{ $ikutTest->paketSoalNames ?? 'Data Tidak Tersedia' }}</td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                        {{ $ikutTest->testKelas->mulai_test ?? 'Data Tidak Tersedia' }}</td>
                                    <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                        {{ $ikutTest->testKelas->selesai_test ?? 'Data Tidak Tersedia' }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('user.soal', ['id' => $ikutTest->id]) }}">
                                            <button
                                                class="rounded-md bg-orange-500 px-4 py-2 text-white hover:bg-orange-600">Start
                                                Ujian Assessment</button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-4 text-center text-gray-500">Data ujian belum
                                        tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Section with Logo (Hidden on Mobile) -->
            <div class="w-full lg:w-1/3 flex items-center justify-center lg:flex" id="logoSection">
                <div class="text-center">
                    <img src="{{ asset('frontend/images/logo/eduline.png') }}" alt="Latihan Soal Logo"
                        class="mx-auto w-48" />
                    <p class="text-xl font-bold text-blue-500">LATIHAN SOAL</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to show or hide the logo section based on screen size
        function toggleLogoSection() {
            const logoSection = document.getElementById('logoSection');
            if (window.innerWidth >= 1024) {
                logoSection.style.display = 'flex'; // Show for desktop
            } else {
                logoSection.style.display = 'none'; // Hide for mobile/tablet
            }
        }

        // Initial check on page load
        toggleLogoSection();

        // Check on window resize
        window.addEventListener('resize', toggleLogoSection);
    </script>
</x-app-layout>
