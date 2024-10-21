@section('title', 'Educate - Ujian')
<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 sm:p-8">
        <!-- Header Section -->
        <div class="mb-6 flex h-16 items-center justify-between rounded-md bg-white px-4 py-2 shadow-md">
            <div class="flex items-center">
                <button class="font-bold text-gray-500">&larr; Back</button>
            </div>
            <h1 class="text-lg font-bold text-gray-800">Assessment Page - Academic Assessment</h1>
            <div></div>
        </div>

        <!-- Question Numbers and Timer Section -->
        <div class="mb-6 flex flex-col justify-between sm:flex-row">
            <!-- Question Numbers (Scrollable) -->
            <div class="relative mb-4 flex-1 overflow-x-auto rounded-md bg-white p-4 shadow-md sm:mb-0">
                <div class="flex items-center justify-between">
                    <!-- Wrapper for Scrollable Numbers -->
                    <div class="flex w-max space-x-2">
                        <!-- Question Numbers -->
                        <!-- Loop for numbers from 1 to 20 -->
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            1</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            2</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            3</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            4</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            5</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            6</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            7</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            8</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            9</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 text-white">
                            10</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-400 text-white">
                            11</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            12</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            13</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            14</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            15</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            16</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            17</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            18</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            19</div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-300 text-white">
                            20</div>
                    </div>
                </div>
            </div>

            <!-- Timer -->
            <div class="ml-0 w-full rounded-md bg-pink-200 p-4 text-center text-pink-600 shadow-md sm:ml-4 sm:w-48">
                <span>Remaining Time: 01:30:39</span>
            </div>
        </div>

        <!-- Question and Answer Section -->
        <div class="flex flex-col justify-between sm:flex-row">
            <!-- Question Box -->
            <div class="mb-4 mr-0 flex-1 rounded-lg bg-white p-6 shadow-md sm:mb-0 sm:mr-6">
                <p class="mb-4 text-lg font-medium">11. Sebuah Lingkaran memiliki nilai diameter 14cm. Tentukan luas
                    dari lingkaran dibawah!</p>
                <div class="mb-4 flex justify-center">
                    <div class="flex h-40 w-40 items-center justify-center rounded-full border border-gray-300">
                        <p class="text-center">14cm</p>
                    </div>
                </div>
            </div>

            <!-- Answer Options -->
            <div class="flex-1 space-y-4">
                <div class="flex items-center rounded-md bg-white p-4 shadow-md">
                    <div
                        class="mr-4 flex h-10 w-10 items-center justify-center rounded-full bg-purple-200 text-purple-700">
                        A</div>
                    <span>40cm</span>
                </div>
                <div class="flex items-center rounded-md bg-white p-4 shadow-md">
                    <div
                        class="mr-4 flex h-10 w-10 items-center justify-center rounded-full bg-purple-200 text-purple-700">
                        B</div>
                    <span>45cm</span>
                </div>
                <div class="flex items-center rounded-md border border-blue-500 bg-blue-100 p-4 shadow-md">
                    <div class="mr-4 flex h-10 w-10 items-center justify-center rounded-full bg-blue-500 text-white">
                        C</div>
                    <span>44cm</span>
                </div>
                <div class="flex items-center rounded-md bg-white p-4 shadow-md">
                    <div
                        class="mr-4 flex h-10 w-10 items-center justify-center rounded-full bg-purple-200 text-purple-700">
                        D</div>
                    <span>88cm</span>
                </div>
                <div class="flex items-center rounded-md bg-white p-4 shadow-md">
                    <div
                        class="mr-4 flex h-10 w-10 items-center justify-center rounded-full bg-purple-200 text-purple-700">
                        E</div>
                    <span>100cm</span>
                </div>
            </div>
        </div>

        <!-- Bottom Navigation -->
        <div class="mt-6 flex flex-col items-center justify-between sm:flex-row">
            <!-- Mark Question -->
            <button
                class="mb-4 w-full cursor-not-allowed rounded-md bg-gray-300 px-4 py-3 text-gray-700 sm:mb-0 sm:w-[20%]">Mark
                Question</button>

            <!-- Previous and Next Buttons -->
            <div class="flex w-full justify-end space-x-4 sm:w-[60%]">
                <button
                    class="w-full rounded-md bg-yellow-500 px-4 py-3 text-white hover:bg-yellow-600 sm:w-[30%]">&larr;
                    Previous</button>
                <button class="w-full rounded-md bg-orange-500 px-4 py-3 text-white hover:bg-orange-600 sm:w-[30%]">Next
                    &rarr;</button>
            </div>
        </div>
    </div>
</x-app-layout>
