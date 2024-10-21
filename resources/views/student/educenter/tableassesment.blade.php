@section('title', 'Educate - Assesment')
<x-app-layout>
    <div class="py-4">
        <div class="flex min-h-screen bg-gray-100 p-8">
            <!-- Back Button -->
            <div class="w-2/3">
                <div class="mb-6">
                    <button class="font-bold text-blue-500">&larr; back</button>
                </div>

                <!-- Table -->
                <div class="rounded-lg bg-white shadow-md">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600">NO</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600">MATA PELAJARAN</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600">TANGGAL MULAI</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-600">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="border-t">
                                <td class="px-4 py-2 text-gray-700">1</td>
                                <td class="px-4 py-2 text-gray-700">Matematika</td>
                                <td class="px-4 py-2 text-gray-700">16-08-2023</td>
                                <td class="px-4 py-2">
                                    <button
                                        class="rounded-md bg-orange-500 px-4 py-2 text-white hover:bg-orange-600">Start</button>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="border-t">
                                <td class="px-4 py-2 text-gray-700">2</td>
                                <td class="px-4 py-2 text-gray-700">Bahasa Indonesia</td>
                                <td class="px-4 py-2 text-gray-700">16-08-2023</td>
                                <td class="px-4 py-2">
                                    <button
                                        class="rounded-md bg-orange-500 px-4 py-2 text-white hover:bg-orange-600">Start</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Section with Logo -->
            <div class="flex w-1/3 items-center justify-center">
                <div class="text-center">
                    <!-- Replace with image -->
                    <img src="{{ asset('frontend/images/logo/eduline.png') }}" alt="Latihan Soal Logo"
                        class="mx-auto w-48" />
                    <p class="text-xl font-bold text-blue-500">LATIHAN SOAL</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
