@extends('layouts.admin')

@section('title', 'Manage Mata Pelajaran')

@section('content')
    <div class="container mx-auto p-4">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <!-- Background Image as Cover -->
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <!-- Content: Welcome Message and Button -->
            <div class="relative flex justify-between w-full">
                <!-- Left Section: Welcome Message -->
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Mata Pelajaran ✨</h1>
                    <!-- Mengurangi ukuran teks -->
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p> <!-- Mengurangi ukuran teks -->
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="relative bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
                <div class="absolute bottom-0 left-0 h-1 bg-green-600 animate-shrink"></div>
            </div>
        @endif

        <!-- Create New Mata Pelajaran Button -->
        <div class="flex justify-end">
            <button id="openCreateModal" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">
                <i class="fas fa-plus mr-2"></i> Tambah Mata Pelajaran
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Is Active</th>
                        <th class="py-3 px-6 text-left">Nama Mata Pelajaran</th>
                        <th class="py-3 px-6 text-left">Kode Kelas</th>
                        <th class="py-3 px-6 text-left">Kode Mata Pelajaran</th>
                        <th class="py-3 px-6 text-left">Cover</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @if ($subjects->isEmpty())
                        <tr>
                            <td colspan="7" class="py-3 px-6 text-center text-gray-500">No Data Found</td>
                        </tr>
                    @else
                        @foreach ($subjects as $index => $subject)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 text-left">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer toggle-active"
                                            data-id="{{ $subject->id }}" {{ $subject->is_active ? 'checked' : '' }}>
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </td>
                                <td class="py-3 px-6 text-left">{{ $subject->nama_mapel }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->kdkelas }}</td>
                                <td class="py-3 px-6 text-left">{{ $subject->kdmapel }}</td>
                                <td class="py-3 px-6 text-left">
                                    @if ($subject->cover)
                                        <img src="{{ asset('storage/' . $subject->cover) }}" alt="Cover Image"
                                            class="w-24 h-auto rounded">
                                    @else
                                        <span class="text-gray-500 italic">No Image</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <button class="flex items-center text-blue-500 hover:text-blue-700  btn-edit"
                                        data-id="{{ $subject->id }}" data-kdkelas="{{ $subject->kdkelas }}"
                                        data-kdmapel="{{ $subject->kdmapel }}" data-nama="{{ $subject->nama_mapel }}"
                                        data-cover="{{ $subject->cover }}" data-is-active="{{ $subject->is_active }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.mapel.destroy', $subject->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center text-red-500 hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to delete this subject?');">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="py-3">
            {{ $subjects->links() }}
        </div>

        <!-- Create Subject Modal -->
        <div id="createModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-plus-circle mr-2 text-blue-500"></i> Create Mata Pelajaran
                </h2>
                <form id="createForm" method="POST" action="{{ route('admin.mapel.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="create_nama_mapel" class="block text-gray-700 text-sm">Nama Mata Pelajaran</label>
                        <input type="text" id="create_nama_mapel" name="nama_mapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="create_kdkelas" class="block text-gray-700 text-sm">Kode Kelas</label>
                        <input type="text" id="create_kdkelas" name="kdkelas"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required readonly>
                    </div>
                    <div class="mb-4">
                        <label for="create_kdmapel" class="block text-gray-700 text-sm">Kode Mata Pelajaran</label>
                        <input type="text" id="create_kdmapel" name="kdmapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required readonly>
                    </div>
                    <div class="mb-4">
                        <label for="create_cover" class="block text-gray-700 text-sm">Cover</label>
                        <input type="file" id="create_cover" name="cover"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-base focus:ring-blue-500 focus:border-blue-500">
                        <img id="createImagePreview" class="mt-2 hidden w-24 h-24 rounded shadow-lg">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm">Is Active</label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="create_is_active" name="is_active" value="1"
                                class="sr-only peer" onchange="this.value = this.checked ? '1' : '0'">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                        </label>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-save"></i> Save
                        </button>
                        <button type="button" id="closeCreateModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Subject Modal -->
        <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 z-50 p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-md mx-auto relative overflow-y-auto max-h-[90vh] shadow-lg">
                <h2 class="text-xl font-semibold mb-4 flex items-center">
                    <i class="fas fa-edit mr-2 text-yellow-500"></i> Edit Mata Pelajaran
                </h2>
                <form id="editForm" method="POST" action="{{ route('admin.mapel.update', ['mapel' => ':id']) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-4">
                        <label for="edit_nama_mapel" class="block text-gray-700 text-sm">Nama Mata Pelajaran</label>
                        <input type="text" id="edit_nama_mapel" name="nama_mapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="edit_kdkelas" class="block text-gray-700 text-sm">Kode Kelas</label>
                        <input type="text" id="edit_kdkelas" name="kdkelas"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required readonly>
                    </div>

                    <div class="mb-4">
                        <label for="edit_kdmapel" class="block text-gray-700 text-sm">Kode Mata Pelajaran</label>
                        <input type="text" id="edit_kdmapel" name="kdmapel"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm" required readonly>
                    </div>

                    <div class="mb-4">
                        <label for="edit_cover" class="block text-gray-700 text-sm">Cover</label>
                        <input type="file" id="edit_cover" name="cover"
                            class="mt-1 block w-full border border-gray-300 p-2 rounded text-sm">
                        <img id="editImagePreview" class="mt-2 hidden w-24 h-24 rounded shadow-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm">Is Active</label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="edit_is_active" name="is_active" value="1"
                                class="sr-only peer" onchange="this.value = this.checked ? '1' : '0'">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                        </label>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <button type="button" id="closeEditModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle opening and closing of create modal
                const openCreateModal = document.getElementById('openCreateModal');
                const closeCreateModal = document.getElementById('closeCreateModal');
                const createModal = document.getElementById('createModal');

                openCreateModal.addEventListener('click', () => {
                    createModal.classList.remove('hidden');
                    createModal.classList.add('flex');
                });

                closeCreateModal.addEventListener('click', () => {
                    createModal.classList.remove('flex');
                    createModal.classList.add('hidden');
                });

                // Generate Kode Kelas and Kode Mata Pelajaran on Nama Mata Pelajaran change
                const createNamaMapel = document.getElementById('create_nama_mapel');
                const createKdkelas = document.getElementById('create_kdkelas');
                const createKdmapel = document.getElementById('create_kdmapel');
                createNamaMapel.addEventListener('input', function() {
                    const namaMapel = this.value.trim();
                    const mapping = {
                        "Pengetahuan dan Pemahaman Umum": "PPU",
                        "Pengetahuan Kuantitatif": "PK",
                        "Teknik Komputer Jaringan": "TKJ",
                        "Teknologi Informasi - Teknik Komputer dan Jaringan": "TI-TKJ",
                        "TPA-Analitik": "TPA-A",
                        "Matematika": "MTK",
                        "Biologi": "BIO",
                        "Bahasa Indonesia": "BINDO",
                        "Bahasa Inggris": "BING",
                        "Penalaran Umum": "PU",
                        "Pemahaman Bacaan dan Menulis": "PBM",
                        "Tes Intelegensi Umum": "TIU",
                        "Tes Wawasan Kebangsaan": "TWK",
                        "Tes Karakteristik Pribadi": "TKP",
                        "Fisika": "FIS",
                        "Geografi": "GEO",
                        "Sosiologi": "SOS",
                        "Ekonomi": "EKO",
                        "Sejarah": "SEJ",
                        "SKB": "SKB",
                        "IPA": "IPA",
                        "Bahasa Arab": "ARB",
                        "Tes Potensi Dasar": "TPD",
                        "Mandarin": "MDR",
                        "ICT": "ICTSD",
                        "Pendidikan Agama Islam": "PAI",
                        "UOI": "UOI",
                        "TOEFL": "TOEFL",
                        "Pengetahuan Umum": "PNGUM",
                        "Calistung": "CLS",
                        "Bahasa Jepang": "JPN",
                        "GMST": "GMST",
                        "UKDI": "UKDI",
                        "TPA": "TPA",
                        "Ilmu Hukum": "HKM",
                        "Basic Math": "BM",
                        "TIU STAN": "TIUSTAN",
                        "Latihan Soal": "LS",
                        "UKMPDD": "UKM",
                        "Bahasa Korea": "KR",
                        "Seleksi Kompetisi Bidang": "SKB",
                        "Manajerial Sosiokultural": "MANSOS-CPNS",
                        "Menggambar": "GBR",
                        "Manajerial": "MNG",
                        "Sosiokultural": "SK",
                        "Komputer": "KMP",
                        "Akuntansi": "AKN",
                        "Profesional": "PRF",
                        "Psikotest": "PSI",
                        "Seleksi Kompetensi Manajerial": "SKM",
                        "Seleksi Kompetensi Sosial Kultural": "SKSK",
                        "Seleksi Kompetensi Wawancara": "SKW",
                        "Seleksi Kompetensi Teknis": "SKT",
                        "Mengaji": "MGJ",
                        "Penalaran Kognitif": "PKG",
                        "Penalaran Matematika": "PLM",
                        "Literasi Bahasa Indonesia": "LBI",
                        "Literasi Bahasa Inggris": "LBE",
                        "Coaching": "COA",
                        "Jasmani": "JSM",
                        "TPA Verbal": "TPA-V",
                        "Psikologi Kepribadian": "PSB",
                        "Psikologi Kecerdasan": "PSC",
                        "Psikologi Kecermatan": "PSA",
                        "Pauli / Kraeplin": "PKR",
                        "Logic dan Quantitative": "LNQ",
                        "Mental Ideologi": "MI",
                        "Manajerial Sosiokultural dan Wawancara": "MANSOSWAN",
                        "Penalaran Numerik": "PN",
                        "Solfegio": "SB",
                        "Vokal": "SBV",
                        "Gitar": "SBG",
                        "IELTS": "IELTS",
                    };

                    // Get the code based on the input value
                    const kodeKelas = mapping[namaMapel] || generateKodeKelas(namaMapel);
                    createKdkelas.value = kodeKelas; // Set Kode Kelas
                    createKdmapel.value = kodeKelas; // Set Kode Mata Pelajaran
                });

                // Function to generate code for subjects not in mapping
                function generateKodeKelas(namaMapel) {
                    const excludedWords = ['dan', 'atau'];
                    const words = namaMapel.split(' ');
                    let kode = '';

                    if (words.length === 1) {
                        // If only one word, take the first three letters
                        kode = words[0].substring(0, 3).toUpperCase();
                    } else {
                        // For multiple words, take the first letter of each word excluding excludedWords
                        kode = words
                            .filter(word => !excludedWords.includes(word.toLowerCase()))
                            .map(word => word.charAt(0).toUpperCase())
                            .join('');
                    }

                    return kode;
                }

                // Handle opening and closing of edit modal
                const editModal = document.getElementById('editModal');
                const closeEditModal = document.getElementById('closeEditModal');
                const editForm = document.getElementById('editForm');

                closeEditModal.addEventListener('click', () => {
                    editModal.classList.remove('flex');
                    editModal.classList.add('hidden');
                });

                // Handle edit button click
                document.querySelectorAll('.btn-edit').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;
                        const kdkelas = this.dataset.kdkelas.toLowerCase();
                        const kdmapel = this.dataset.kdmapel.toLowerCase();
                        const nama_mapel = this.dataset.nama;
                        const cover = this.dataset.cover;
                        const isActive = this.dataset.isActive;

                        document.getElementById('edit_id').value = id;
                        document.getElementById('edit_kdkelas').value = kdkelas;
                        document.getElementById('edit_kdmapel').value = kdmapel;
                        document.getElementById('edit_nama_mapel').value = nama_mapel;
                        document.getElementById('edit_is_active').checked = isActive ===
                            '1'; // Check if is_active is 1

                        if (cover) {
                            const editImagePreview = document.getElementById('editImagePreview');
                            editImagePreview.src = `/storage/${cover}`;
                            editImagePreview.classList.remove('hidden');
                        } else {
                            document.getElementById('editImagePreview').classList.add('hidden');
                        }

                        editForm.action = editForm.action.replace(':id', id);
                        editModal.classList.remove('hidden');
                        editModal.classList.add('flex');
                    });
                });
            });
            // Handle toggle for is_active
            document.querySelectorAll('.toggle-active').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const subjectId = this.getAttribute('data-id'); // Ambil ID subject
                    const isActive = this.checked ? 1 : 0; // Set is_active value

                    fetch(`/admin/master/mapel/${subjectId}/toggle-active`, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                is_active: isActive
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Status updated successfully');
                            } else {
                                console.error('Error updating status:', data.error);
                                alert('Failed to update status.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Something went wrong!');
                        });
                });
            });
        </script>
    @endpush
@endsection
