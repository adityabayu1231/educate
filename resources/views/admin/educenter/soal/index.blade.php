@extends('layouts.admin')

@section('title', 'Manage Soal')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 py-1 w-full max-w-9xl mx-auto">
        <div class="relative bg-blue-600 h-32 flex items-center justify-between p-4 rounded-lg shadow-lg mb-4">
            <div class="absolute inset-0 bg-cover bg-center opacity-50"
                style="background-image: url('{{ asset('backend/images/illustration/paper.jpg') }}');">
            </div>

            <div class="relative flex justify-between w-full">
                <div class="text-white p-4">
                    <h1 class="text-2xl font-bold mb-2 text-black">Manages Soal ✨</h1>
                    <p class="text-md text-gray-100">Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>

        <div class="flex items-center mb-6">
            <a href="{{ route('admin.paket-soal') }}"
                class="hover:bg-blue-500 hover:text-white text-gray-800 px-4 py-2 rounded-md">
                <i class="fa-solid fa-arrow-left-long"></i> Back
            </a>
            <div class="flex-grow"></div>
            <a href="{{ route('admin.soals.create', ['paket_id' => $paket->id]) }}">
                <button id="createSoalBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Tambah Soal
                </button>
            </a>
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

        <div class="overflow-x-auto">
            <table id="data-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr>
                        <th class="py-2 px-4 text-left whitespace-nowrap">
                            <span class="flex items-center">No
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Soal</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Soal Gambar</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Pilihan A</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Skor A</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Pilihan B</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Skor B</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Pilihan C</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Skor C</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Pilihan D</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Skor D</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Pilihan E</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Skor E</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Jawaban</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Pembahasan</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Gambar Pembahasan</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Bab</th>
                        <th class="py-2 px-4 text-left whitespace-nowrap">Video Penjelasan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($soals->isEmpty())
                        <tr>
                            <td colspan="18" class="py-3 px-4 text-center text-gray-500">Not Found</td>
                        </tr>
                    @else
                        @foreach ($soals as $index => $soal)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                                <td class="py-2 px-4 text-left">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 text-left">{{ Str::limit($soal->soal, 50) }}</td>
                                <td class="py-2 px-4 text-left">
                                    @if ($soal->soal_gambar)
                                        <img src="{{ Storage::url($soal->soal_gambar) }}" alt="Soal Gambar"
                                            class="h-8 w-8 object-cover">
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-left">{{ $soal->pil_a }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->skor_a }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->pil_b }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->skor_b }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->pil_c }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->skor_c }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->pil_d }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->skor_d }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->pil_e }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->skor_e }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->jawaban }}</td>
                                <td class="py-2 px-4 text-left">{{ Str::limit($soal->pembahasan, 50) }}</td>
                                <td class="py-2 px-4 text-left">
                                    @if ($soal->gambar_pembahasan)
                                        <img src="{{ Storage::url($soal->gambar_pembahasan) }}" alt="Gambar Pembahasan"
                                            class="h-8 w-8 object-cover">
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-left">{{ $soal->bab }}</td>
                                <td class="py-2 px-4 text-left">{{ $soal->video_penjelasan }}</td>
                                <td class="py-2 px-4 text-right">
                                    <a href="{{ route('admin.soals.edit', $soal->id) }}"
                                        class="editSoalBtn text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.soals.destroy', $soal) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('Are you sure you want to delete this Soal?');">
                                            <i class="fas fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="py-4">
                {{ $soals->links() }}
            </div>
        </div>

    </div>

    @push('scripts')
        <script></script>
    @endpush
@endsection
