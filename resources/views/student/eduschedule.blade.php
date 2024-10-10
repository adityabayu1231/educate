@section('title', 'Educate - My Schedule')
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-2xl font-semibold">Assesment 📋</p>

            <div class="mt-4">
                <table class="min-w-full">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="py-3 px-4 text-left font-semibold">No</th>
                            <th class="py-3 px-4 text-left font-semibold">Tanggal</th>
                            <th class="py-3 px-4 text-left font-semibold">Mata Pelajaran</th>
                            <th class="py-3 px-4 text-left font-semibold">Waktu</th>
                            <th class="py-3 px-4 text-left font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-yellow-100">
                            <td class="py-2 px-4 border-b">1</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-orange-500 text-white py-1 px-2 rounded">Start</button>
                            </td>
                        </tr>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">2</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-orange-500 text-white py-1 px-2 rounded">Start</button>
                            </td>
                        </tr>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-red-100">
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-orange-500 text-white py-1 px-2 rounded">Start</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-2xl font-semibold mt-8">Tryout 📋</p>

            <div class="mt-4">
                <table class="min-w-full">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="py-3 px-4 text-left font-semibold">No</th>
                            <th class="py-3 px-4 text-left font-semibold">Tanggal</th>
                            <th class="py-3 px-4 text-left font-semibold">Mata Pelajaran</th>
                            <th class="py-3 px-4 text-left font-semibold">Waktu</th>
                            <th class="py-3 px-4 text-left font-semibold">Validations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-yellow-100">
                            <td class="py-2 px-4 border-b">1</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-orange-500 text-white py-1 px-2 rounded">Start</button>
                            </td>
                        </tr>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">2</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-orange-500 text-white py-1 px-2 rounded">Start</button>
                            </td>
                        </tr>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-red-100">
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-orange-500 text-white py-1 px-2 rounded">Start</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-2xl font-semibold mt-8">KBM 📋</p>

            <div class="mt-4">
                <table class="min-w-full">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="py-3 px-4 text-left font-semibold">No</th>
                            <th class="py-3 px-4 text-left font-semibold">Nama Guru</th>
                            <th class="py-3 px-4 text-left font-semibold">Tanggal</th>
                            <th class="py-3 px-4 text-left font-semibold">Mata Pelajaran</th>
                            <th class="py-3 px-4 text-left font-semibold">Waktu</th>
                            <th class="py-3 px-4 text-left font-semibold">Validations</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-yellow-100">
                            <td class="py-2 px-4 border-b">1</td>
                            <td class="py-2 px-4 border-b">Ahmad</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-green-500 text-white py-1 px-2 rounded">Accept</button>
                                <button class="bg-red-500 text-white py-1 px-2 rounded">Revise</button>
                            </td>
                        </tr>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-green-100">
                            <td class="py-2 px-4 border-b">2</td>
                            <td class="py-2 px-4 border-b">Ahmad</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-green-500 text-white py-1 px-2 rounded">Accept</button>
                                <button class="bg-red-500 text-white py-1 px-2 rounded">Revise</button>
                            </td>
                        </tr>
                        <tr class="bg-transparent">
                            <td colspan="6" class="h-4"></td> <!-- Spacing row -->
                        </tr>
                        <tr class="bg-red-100">
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">Ahmad</td>
                            <td class="py-2 px-4 border-b">4 Januari 2023</td>
                            <td class="py-2 px-4 border-b">TKJ</td>
                            <td class="py-2 px-4 border-b">08:00-09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-green-500 text-white py-1 px-2 rounded">Accept</button>
                                <button class="bg-red-500 text-white py-1 px-2 rounded">Revise</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
