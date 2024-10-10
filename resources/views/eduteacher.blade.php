@section('title', 'Educate - Teacher Profile')
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold mb-4">Teacher Report 📋</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">Teacher Name</th>
                            <th class="py-2 px-4 border-b">Subject</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Time</th>
                            <th class="py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr class="bg-gray-100 hover:bg-gray-200 text-gray-700">
                            <td class="py-2 px-4 border-b">1</td>
                            <td class="py-2 px-4 border-b">John Doe</td>
                            <td class="py-2 px-4 border-b">Mathematics</td>
                            <td class="py-2 px-4 border-b">4 January 2023</td>
                            <td class="py-2 px-4 border-b">08:00 - 09:00</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-green-500 text-white py-1 px-2 rounded">Details</button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="bg-gray-100 hover:bg-gray-200 text-gray-700">
                            <td class="py-2 px-4 border-b">2</td>
                            <td class="py-2 px-4 border-b">Jane Smith</td>
                            <td class="py-2 px-4 border-b">Science</td>
                            <td class="py-2 px-4 border-b">7 January 2023</td>
                            <td class="py-2 px-4 border-b">09:00 - 10:30</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-green-500 text-white py-1 px-2 rounded">Details</button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="bg-gray-100 hover:bg-gray-200 text-gray-700">
                            <td class="py-2 px-4 border-b">3</td>
                            <td class="py-2 px-4 border-b">Michael Johnson</td>
                            <td class="py-2 px-4 border-b">History</td>
                            <td class="py-2 px-4 border-b">10 January 2023</td>
                            <td class="py-2 px-4 border-b">10:30 - 11:30</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-green-500 text-white py-1 px-2 rounded">Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
