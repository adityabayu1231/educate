@section('title', 'Educate - Assesment')
<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('user.ec') }}"><button class="font-bold text-blue-500">&larr; back</button></a>
        </div>
        <!-- Page Title -->
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-2xl font-semibold">Assesment ✨</p>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <!-- Target Card 1 -->
                <div class="border p-4 rounded-lg shadow-md bg-white">
                    <!-- Initial (Top) -->
                    <div class="text-left">
                        <div
                            class="bg-red-500 text-white w-12 h-12 flex items-center justify-center rounded-full font-bold text-lg">
                            A
                        </div>
                    </div>
                    <!-- Title -->
                    <h2 class="text-left text-lg font-semibold mt-2">Academic Assesment</h2>
                    <!-- Description -->
                    <p class="text-justify text-gray-500 text-sm mb-2">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Modi, illo iste. Neque error assumenda voluptatum odit aperiam officiis.
                    </p>
                    <!-- Date and Time -->
                    <div class="border-t pt-2 mt-4">
                        <!-- Date -->
                        <p class="text-left text-gray-400 text-xs mb-1">Monday, 16-August-2023</p>
                        <div class="flex justify-between">
                            <!-- Time -->
                            <p class="text-gray-400 text-xs">07:50 -> 09:00 </p>
                            <!-- View Link -->
                            <a href="{{ route('user.jadwalsiswa') }}" class="text-blue-500 font-semibold text-sm">View
                                -></a>
                        </div>
                    </div>
                </div>

                <!-- Target Card 2 -->
                <div class="border p-4 rounded-lg shadow-md bg-white">
                    <!-- Initial (Top) -->
                    <div class="text-left">
                        <div
                            class="bg-green-500 text-white w-12 h-12 flex items-center justify-center rounded-full font-bold text-lg">
                            P
                        </div>
                    </div>
                    <!-- Title -->
                    <h2 class="text-left text-lg font-semibold mt-2">Psychological Assesment</h2>
                    <!-- Description -->
                    <p class="text-justify text-gray-500 text-sm mb-2">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Quasi commodi odit sed iusto non aspernatur eaque.
                    </p>
                    <!-- Date and Time -->
                    <div class="border-t pt-2 mt-4">
                        <!-- Date -->
                        <p class="text-left text-gray-400 text-xs mb-1">Tuesday, 17-August-2023</p>
                        <div class="flex justify-between">
                            <!-- Time -->
                            <p class="text-gray-400 text-xs">09:00 -> 17:00</p>
                            <!-- View Link -->
                            <a href="#" class="text-blue-500 font-semibold text-sm">View -></a>
                        </div>
                    </div>
                </div>

                <!-- Target Card 3 -->
                <div class="border p-4 rounded-lg shadow-md bg-white">
                    <!-- Initial (Top) -->
                    <div class="text-left">
                        <div
                            class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full font-bold text-lg">
                            P
                        </div>
                    </div>
                    <!-- Title -->
                    <h2 class="text-left text-lg font-semibold mt-2">Physical Assesment</h2>
                    <!-- Description -->
                    <p class="text-justify text-gray-500 text-sm mb-2">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Sed nostrum quis excepturi similique.</p>
                    <!-- Date and Time -->
                    <div class="border-t pt-2 mt-4">
                        <!-- Date -->
                        <p class="text-left text-gray-400 text-xs mb-1">Wednesday, 18-August-2023</p>
                        <div class="flex justify-between">
                            <!-- Time -->
                            <p class="text-gray-400 text-xs">07:00 -> 17:00</p>
                            <!-- View Link -->
                            <a href="#" class="text-blue-500 font-semibold text-sm">View -></a>
                        </div>
                    </div>
                </div>

                <!-- Target Card 4 -->
                <div class="border p-4 rounded-lg shadow-md bg-white">
                    <!-- Initial (Top) -->
                    <div class="text-left">
                        <div
                            class="bg-red-500 text-white w-12 h-12 flex items-center justify-center rounded-full font-bold text-lg">
                            H
                        </div>
                    </div>
                    <!-- Title -->
                    <h2 class="text-left text-lg font-semibold mt-2">Health Assesment</h2>
                    <!-- Description -->
                    <p class="text-justify text-gray-500 text-sm mb-2">Lorem ipsum dolor, sit amet consectetur
                        adipisicing
                        elit. Inventore aliquam aperiam, laborum aliquid consectetur rem.</p>
                    <!-- Date and Time -->
                    <div class="border-t pt-2 mt-4">
                        <!-- Date -->
                        <p class="text-left text-gray-400 text-xs mb-1">Thursday, 19-August-2023</p>
                        <div class="flex justify-between">
                            <!-- Time -->
                            <p class="text-gray-400 text-xs">07:50 - 12:00</p>
                            <!-- View Link -->
                            <a href="#" class="text-blue-500 font-semibold text-sm">View -></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
