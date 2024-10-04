<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-2xl font-semibold">My Profile ✨</p>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Konten yang berubah berdasarkan role_id -->
                @if (Auth::user()->role_id == 1)
                    <!-- Button Group -->
                    <div class="flex justify-start mb-6" role="group" aria-label="User Data Switch">
                        <button id="switchToUserData"
                            class="px-4 py-2 bg-amber-500 text-white font-semibold rounded-l-lg shadow-md hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            <i class="fas fa-user mr-2"></i> Data User
                        </button>
                        <button id="switchToParentData"
                            class="px-4 py-2 bg-white text-gray-700 font-semibold rounded-r-lg shadow-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            <i class="fas fa-users mr-2"></i> Data Orang Tua
                        </button>
                    </div>
                    <!-- Data Section -->
                    <div id="userDataSection" class="space-y-4">
                        <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture"
                                    class="w-10 h-10 rounded-full mr-2">
                            @else
                                <i class="fas fa-user-circle text-4xl text-amber-500 mr-2"></i>
                            @endif
                            Data Siswa
                        </h2>

                        <!-- Row 1: Full Name, Email, Gender -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" id="fullname" name="fullname"
                                    value="{{ Auth::user()->fullname }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                                    readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                <input type="text" id="gender" name="gender" value="{{ $student->gender }}"
                                    readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Row 2: Date of Birth, Place of Birth, Religion -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of
                                    Birth</label>
                                <input type="date" id="date_of_birth" name="date_of_birth"
                                    value="{{ $student->date_of_birth }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Place of
                                    Birth</label>
                                <input type="text" id="place_of_birth" name="place_of_birth"
                                    value="{{ $student->place_of_birth }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="religion" class="block text-sm font-medium text-gray-700">Religion</label>
                                <input type="text" id="religion" name="religion" value="{{ $student->religion }}"
                                    readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Row 3: Previous School, Major, Address -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="previous_school" class="block text-sm font-medium text-gray-700">Previous
                                    School</label>
                                <input type="text" id="previous_school" name="previous_school"
                                    value="{{ $student->previous_school }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="major" class="block text-sm font-medium text-gray-700">Major</label>
                                <input type="text" id="major" name="major" value="{{ $student->major }}"
                                    readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" id="address" name="address" value="{{ $student->address }}"
                                    readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Row 4: Province, City, District, Village, Postal Code -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="province" class="block text-xs font-medium text-gray-700">Province</label>
                                <input type="text" id="province" name="province" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="city" class="block text-xs font-medium text-gray-700">City</label>
                                <input type="text" id="city" name="city" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="district" class="block text-xs font-medium text-gray-700">District</label>
                                <input type="text" id="district" name="district" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="village" class="block text-xs font-medium text-gray-700">Village</label>
                                <input type="text" id="village" name="village" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="postal_code" class="block text-xs font-medium text-gray-700">Postal
                                    Code</label>
                                <input type="text" id="postal_code" name="postal_code"
                                    value="{{ $student->postal_code }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Button Change / Save -->
                        <div class="text-right">
                            <button id="changeButton"
                                class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600">
                                <i class="fas fa-edit mr-2"></i> Change
                            </button>
                        </div>
                    </div>

                    <!-- Data Orang Tua Section (Initially hidden) -->
                    <div id="parentDataSection" class="space-y-4 hidden">
                        <h2 class="text-2xl font-semibold text-gray-800"><i class="fas fa-user-friends mr-2"></i> Data
                            Orang Tua</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="father_name" class="block text-sm font-medium text-gray-700">Father's
                                    Name</label>
                                <input type="text" id="father_name" name="father_name"
                                    value="{{ $student->father_name }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="mother_name" class="block text-sm font-medium text-gray-700">Mother's
                                    Name</label>
                                <input type="text" id="mother_name" name="mother_name"
                                    value="{{ $student->mother_name }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Row 2: Father's Email, Phone, Occupation -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="father_email" class="block text-sm font-medium text-gray-700">Father's
                                    Email</label>
                                <input type="email" id="father_email" name="father_email"
                                    value="{{ $student->father_email }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="father_phone" class="block text-sm font-medium text-gray-700">Father's
                                    Phone</label>
                                <input type="text" id="father_phone" name="father_phone"
                                    value="{{ $student->father_phone }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="father_occupation"
                                    class="block text-sm font-medium text-gray-700">Father's
                                    Occupation</label>
                                <input type="text" id="father_occupation" name="father_occupation"
                                    value="{{ $student->father_occupation }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Row 3: Mother's Email, Phone, Occupation -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="mother_email" class="block text-sm font-medium text-gray-700">Mother's
                                    Email</label>
                                <input type="email" id="mother_email" name="mother_email"
                                    value="{{ $student->mother_email }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="mother_phone" class="block text-sm font-medium text-gray-700">Mother's
                                    Phone</label>
                                <input type="text" id="mother_phone" name="mother_phone"
                                    value="{{ $student->mother_phone }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="mother_occupation"
                                    class="block text-sm font-medium text-gray-700">Mother's
                                    Occupation</label>
                                <input type="text" id="mother_occupation" name="mother_occupation"
                                    value="{{ $student->mother_occupation }}" readonly
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                        </div>

                        <!-- Button Change / Save -->
                        <div class="text-right">
                            <button id="changeParentButton"
                                class="px-4 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600">
                                <i class="fas fa-edit mr-2"></i> Change
                            </button>
                        </div>
                    </div>
                @elseif (Auth::user()->role_id == 2)
                    <!-- Role ID 2 (misalnya sebagai guru atau peran lain) -->
                    <h1>Saya adalah {{ Auth::user()->fullname }}, sebagai {{ Auth::user()->role->name }}</h1>
                @else
                    <!-- Role selain 1 dan 2 (misalnya Admin) -->
                    <h1>Halo selamat datang kembali admin!</h1>
                @endif
            </div>
        </div>
    </div>

    <!-- JavaScript untuk toggling -->
    <script>
        function toggleInputs(section, editable) {
            const inputs = section.querySelectorAll('input');
            inputs.forEach(input => {
                input.readOnly = !editable;
            });
        }

        document.getElementById('switchToUserData').addEventListener('click', function() {
            document.getElementById('userDataSection').classList.remove('hidden');
            document.getElementById('parentDataSection').classList.add('hidden');
            this.classList.add('bg-amber-500', 'text-white');
            this.classList.remove('bg-white', 'text-gray-700');
            document.getElementById('switchToParentData').classList.add('bg-white', 'text-gray-700');
            document.getElementById('switchToParentData').classList.remove('bg-amber-500', 'text-white');
        });

        document.getElementById('switchToParentData').addEventListener('click', function() {
            document.getElementById('userDataSection').classList.add('hidden');
            document.getElementById('parentDataSection').classList.remove('hidden');
            this.classList.add('bg-amber-500', 'text-white');
            this.classList.remove('bg-white', 'text-gray-700');
            document.getElementById('switchToUserData').classList.add('bg-white', 'text-gray-700');
            document.getElementById('switchToUserData').classList.remove('bg-amber-500', 'text-white');
        });

        document.getElementById('changeButton').addEventListener('click', function() {
            const userDataSection = document.getElementById('userDataSection');
            if (this.innerText === "Change") {
                this.innerText = "Save";
                this.classList.remove('bg-green-500');
                this.classList.add('bg-amber-500');
                toggleInputs(userDataSection, true);
            } else {
                this.innerText = "Change";
                this.classList.remove('bg-amber-500');
                this.classList.add('bg-green-500');
                toggleInputs(userDataSection, false);
                // Simulate saving data here
                alert('Data siswa telah disimpan!');
            }
        });

        document.getElementById('changeParentButton').addEventListener('click', function() {
            const parentDataSection = document.getElementById('parentDataSection');
            if (this.innerText === "Change") {
                this.innerText = "Save";
                this.classList.remove('bg-green-500');
                this.classList.add('bg-amber-500');
                toggleInputs(parentDataSection, true);
            } else {
                this.innerText = "Change";
                this.classList.remove('bg-amber-500');
                this.classList.add('bg-green-500');
                toggleInputs(parentDataSection, false);
                // Simulate saving data here
                alert('Data orang tua telah disimpan!');
            }
        });
        const provinceId = "{{ $student ? $student->province_id : '' }}";
        const cityId = "{{ $student ? $student->city_id : '' }}";
        const districtId = "{{ $student ? $student->district_id : '' }}";
        const villageId = "{{ $student ? $student->village_id : '' }}";
        // Function to fetch data from API
        async function fetchData() {
            try {
                // Fetch Province
                const provinceResponse = await fetch(
                    `https://adityabayu1231.github.io/api-wilayah-indonesia/api/province/${provinceId}.json`);
                const provinceData = await provinceResponse.json();
                document.getElementById('province').value = provinceData.name;

                // Fetch City
                const cityResponse = await fetch(
                    `https://adityabayu1231.github.io/api-wilayah-indonesia/api/regency/${cityId}.json`);
                const cityData = await cityResponse.json();
                document.getElementById('city').value = cityData.name;

                // Fetch District
                const districtResponse = await fetch(
                    `https://adityabayu1231.github.io/api-wilayah-indonesia/api/district/${districtId}.json`);
                const districtData = await districtResponse.json();
                document.getElementById('district').value = districtData.name;

                // Fetch Village
                const villageResponse = await fetch(
                    `https://adityabayu1231.github.io/api-wilayah-indonesia/api/village/${villageId}.json`);
                const villageData = await villageResponse.json();
                document.getElementById('village').value = villageData.name;

            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        // Call the fetchData function
        fetchData();
    </script>
</x-app-layout>
