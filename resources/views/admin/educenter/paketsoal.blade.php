@extends('layouts.admin')

@section('title', 'Manage Paket Soal')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-7xl mx-auto">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>
            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Paket Soal ✨</h1>
                    <p class="text-md text-gray-100">Daftar Paket Soal</p>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div
                class="mb-4 max-w-md p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-r-lg shadow-lg transition transform hover:-translate-y-1 hover:shadow-2xl duration-300 ease-in-out">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <div class="flex items-center mb-6">
            <a href="{{ route('admin.edu-center') }}" class="hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">
                <i class="fa-solid fa-arrow-left-long"></i> Back
            </a>
            <div class="flex-grow"></div>
            <a href="{{ route('admin.addpaket') }}">
                <button id="createDataBtn"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Paket
                </button>
            </a>
        </div>

        <!-- Wrapper untuk tabel dengan overflow -->
        <div class="overflow-x-auto">
            <table id="data-table" class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-800 uppercase text-xs leading-tight">
                        <th>
                            <span class="flex items-center">
                                No
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Nama Paket
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Mata Pelajaran
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Durasi
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Penilaian
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Urutan
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Video Pembahasan
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center whitespace-nowrap">
                                Video Free
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @if ($pakets->isEmpty())
                        <tr>
                            <td colspan="9" class="py-4 px-4 text-center text-gray-500">
                                Tidak ada data paket soal yang tersedia.
                            </td>
                        </tr>
                    @else
                        @foreach ($pakets as $index => $paket)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-2 px-4 text-center">
                                    {{ $index + 1 + ($pakets->currentPage() - 1) * $pakets->perPage() }}
                                </td>
                                <td class="py-2 px-4 text-left whitespace-nowrap">{{ $paket->nama_paket_soal }}</td>
                                <td class="py-2 px-4 text-left">{{ $paket->subject->nama_mapel ?? 'Tidak ada mapel' }}</td>
                                <td class="py-2 px-4 text-left">{{ $paket->durasi }} menit</td>
                                <td class="py-2 px-4 text-left">{{ $paket->penilaian }}</td>
                                <td class="py-2 px-4 text-left">{{ $paket->urutan }}</td>
                                <td class="py-2 px-4 text-left">
                                    @if ($paket->video_pembahasan)
                                        <iframe width="200" height="100"
                                            src="https://www.youtube.com/embed/{{ substr($paket->video_pembahasan, strrpos($paket->video_pembahasan, '/') + 1) }}"
                                            frameborder="0" allowfullscreen>
                                        </iframe>
                                    @else
                                        Tidak ada video
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-left">
                                    @if ($paket->video_pembahasan_free)
                                        <iframe width="200" height="100"
                                            src="https://www.youtube.com/embed/{{ substr($paket->video_pembahasan_free, strrpos($paket->video_pembahasan_free, '/') + 1) }}"
                                            frameborder="0" allowfullscreen>
                                        </iframe>
                                    @else
                                        Tidak ada video
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-right">
                                    <div class="flex flex-col space-y-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.paket.soals.index', $paket->id) }}">
                                                <button
                                                    class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded-md w-24">Add
                                                    Soal</button>
                                            </a>

                                            <button
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md w-24 editPaketBtn"
                                                data-id="{{ $paket->id }}" data-nama="{{ $paket->nama_paket_soal }}"
                                                data-durasi="{{ $paket->durasi }}"
                                                data-penilaian="{{ $paket->penilaian }}"
                                                data-urutan="{{ $paket->urutan }}"
                                                data-video="{{ $paket->video_pembahasan }}"
                                                data-video-free="{{ $paket->video_pembahasan_free }}"
                                                data-subject-id="{{ $paket->mapel_id }}">Lihat/Edit</button>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button
                                                class="bg-purple-500 hover:bg-purple-600 text-white px-2 py-1 rounded-md w-24">Bank
                                                Soal</button>
                                            <form action="{{ route('admin.paket-soal.destroy', $paket->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md w-24"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus paket soal ini?');">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Modal untuk Edit Paket Soal -->
        <div id="editModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-11/12 max-w-lg p-6 overflow-auto max-h-[80vh]">
                <h2 class="text-xl font-bold mb-4">Edit Paket Soal</h2>
                <form id="editPaketForm" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" id="editPaketId" name="id">

                    <!-- Nama Paket -->
                    <div class="mb-4">
                        <label for="editNamaPaket" class="block text-sm text-gray-700">Nama Paket</label>
                        <input type="text" id="editNamaPaket" name="nama_paket_soal"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <!-- Mapel (Subject) -->
                    <div class="mb-4">
                        <label for="editSubjectId" class="block text-sm text-gray-700">Mapel</label>
                        <select id="editSubjectId" name="mapel_id" class="w-full p-2 border border-gray-300 rounded"
                            required>
                            @foreach ($mapel as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Durasi -->
                    <div class="mb-4">
                        <label for="editDurasi" class="block text-sm text-gray-700">Durasi (menit)</label>
                        <input type="number" id="editDurasi" name="durasi"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <!-- Penilaian -->
                    <div class="mb-4">
                        <label for="editPenilaian" class="block text-sm text-gray-700">Penilaian</label>
                        <input type="text" id="editPenilaian" name="penilaian"
                            class="w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <!-- Urutan -->
                    <div class="mb-4">
                        <label for="editUrutan" class="block text-sm text-gray-700">Urutan</label>
                        <input type="number" id="editUrutan" name="urutan"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Video Pembahasan -->
                    <div class="mb-4">
                        <label for="editVideoPembahasan" class="block text-sm text-gray-700">Video Pembahasan</label>
                        <input type="url" id="editVideoPembahasan" name="video_pembahasan"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Video Pembahasan Free -->
                    <div class="mb-4">
                        <label for="editVideoPembahasanFree" class="block text-sm text-gray-700">Video Pembahasan
                            Free</label>
                        <input type="url" id="editVideoPembahasanFree" name="video_pembahasan_free"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Tombol submit -->
                    <div class="flex justify-end">
                        <button type="button" id="closeModalBtn"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2">Batal</button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $pakets->links() }}
    </div>

    <script>
        // Tombol Edit Paket Soal
        document.querySelectorAll('.editPaketBtn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const durasi = this.getAttribute('data-durasi');
                const penilaian = this.getAttribute('data-penilaian');
                const urutan = this.getAttribute('data-urutan');
                const video = this.getAttribute('data-video');
                const videoFree = this.getAttribute('data-video-free');
                const mapelId = this.getAttribute('data-subject-id');

                // Isi nilai ke form
                document.getElementById('editPaketId').value = id;
                document.getElementById('editNamaPaket').value = nama;
                document.getElementById('editDurasi').value = durasi;
                document.getElementById('editPenilaian').value = penilaian;
                document.getElementById('editUrutan').value = urutan;
                document.getElementById('editVideoPembahasan').value = video;
                document.getElementById('editVideoPembahasanFree').value = videoFree;

                // Set selected mapel_id
                const selectMapel = document.getElementById('editSubjectId');
                selectMapel.value = mapelId;

                // Set form action URL dynamically
                document.getElementById('editPaketForm').action =
                    `/admin/edu-center/paket-soal/update/${id}`;

                // Tampilkan modal
                document.getElementById('editModal').classList.remove('hidden');
                document.getElementById('editModal').classList.add('flex');
            });
        });

        // Tombol Tutup Modal
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        });
    </script>
@endsection
