@section('title', 'Daftar Siswa')
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-3xl font-bold text-blue-600">Daftar Siswa 📚</p>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Siswa 1 -->
                <div class="bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105 cursor-pointer"
                    onclick="openModal('Kelvin Platipus', 'Bahasa Indonesia', 'https://via.placeholder.com/150', 'Cibubur', '08123456789', '2005-01-01', 'Islam', 'Kelas 10', 'SMP 1 Cibubur')">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/150" alt="Kelvin Platipus"
                            class="w-16 h-16 rounded-full mr-4 shadow">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Kelvin Platipus</h3>
                            <p class="text-gray-500">Mata Pelajaran: Bahasa Indonesia</p>
                        </div>
                    </div>
                    <button
                        class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">Detail</button>
                </div>

                <!-- Siswa 2 -->
                <div class="bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105 cursor-pointer"
                    onclick="openModal('Siti Aminah', 'Matematika', 'https://via.placeholder.com/150', 'Jakarta', '08198765432', '2005-02-02', 'Kristen', 'Kelas 10', 'SMP 2 Jakarta')">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/150" alt="Siti Aminah"
                            class="w-16 h-16 rounded-full mr-4 shadow">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Siti Aminah</h3>
                            <p class="text-gray-500">Mata Pelajaran: Matematika</p>
                        </div>
                    </div>
                    <button
                        class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">Detail</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Menampilkan Detail Siswa -->
    <div id="student-modal" class="fixed inset-0 z-50 hidden justify-center items-center bg-black bg-opacity-70">
        <div class="bg-white rounded-lg shadow-lg p-10 w-11/12 md:w-3/4 lg:w-1/2">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-800" id="modal-title">Detail Siswa</h2>
                <button class="text-gray-500 text-2xl" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="modal-content">
                <!-- Konten Modal akan diisi dengan JavaScript -->
            </div>
        </div>
    </div>

    <script>
        function openModal(fullname, major, photo, address, phone_number, date_of_birth, religion, student_class,
            previous_school) {
            const modalContent = `
                <div class="flex items-center mb-4">
                    <img src="${photo}" alt="${fullname}" class="w-24 h-24 rounded-full mr-4 shadow">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">${fullname}</h2>
                        <p class="text-gray-600"><strong>Mata Pelajaran:</strong> ${major}</p>
                    </div>
                </div>
                <div class="border-t border-gray-200 mt-4 pt-4">
                    <h3 class="text-lg font-semibold text-gray-700">Biodata Siswa</h3>
                    <p><strong>Alamat:</strong> ${address}</p>
                    <p><strong>No Telepon:</strong> ${phone_number}</p>
                    <p><strong>Tanggal Lahir:</strong> ${date_of_birth}</p>
                    <p><strong>Agama:</strong> ${religion}</p>
                </div>
                <div class="border-t border-gray-200 mt-4 pt-4">
                    <h3 class="text-lg font-semibold text-gray-700">Informasi Kelas</h3>
                    <p><strong>Kelas:</strong> ${student_class}</p>
                    <p><strong>Sekolah Sebelumnya:</strong> ${previous_school}</p>
                </div>
            `;
            document.getElementById('modal-content').innerHTML = modalContent;
            document.getElementById('student-modal').classList.remove('hidden'); // Hapus kelas hidden
            document.getElementById('student-modal').classList.add('flex'); // Tampilkan modal
        }

        function closeModal() {
            document.getElementById('student-modal').classList.add('hidden'); // Tambahkan kelas hidden
            document.getElementById('student-modal').classList.remove('flex'); // Sembunyikan modal
        }
    </script>
</x-app-layout>
