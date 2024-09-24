@section('title', 'Lengkapi Biodata')
<x-guest-layout>
    <div class="relative min-h-screen flex">
        <!-- Left side: Login form -->
        <div class="w-full md:w-1/2 flex flex-col bg-white p-6 relative">
            <div class="flex-1 flex flex-col justify-center">
                <div class="max-w-sm w-full mx-auto">
                    <x-validation-errors class="mb-4" />
                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession
                    <div class="min-h-screen flex flex-col items-center justify-center p-4">
                        <!-- Step indicator with connecting line -->
                        <div class="relative flex items-center w-full max-w-md mb-8">
                            <!-- Gray base line -->
                            <div class="absolute top-1/2 w-full h-1 bg-gray-300 transform -translate-y-1/2"></div>
                            <!-- Progress line -->
                            <div id="progress-bar" class="absolute top-1/2 h-1 bg-blue-500 transform -translate-y-1/2"
                                style="width: 0%;"></div>

                            <!-- Step indicators -->
                            <div class="relative z-10 flex justify-between w-full">
                                <!-- Step 1 -->
                                <div class="flex items-center justify-center">
                                    <div id="step1"
                                        class="w-10 h-10 border-2 rounded-full flex items-center justify-center text-white bg-blue-500">
                                        1</div>
                                </div>
                                <!-- Step 2 -->
                                <div class="flex items-center justify-center">
                                    <div id="step2"
                                        class="w-10 h-10 border-2 rounded-full flex items-center justify-center text-gray-500 bg-white">
                                        2</div>
                                </div>
                                <!-- Step 3 -->
                                <div class="flex items-center justify-center">
                                    <div id="step3"
                                        class="w-10 h-10 border-2 rounded-full flex items-center justify-center text-gray-500 bg-white">
                                        3</div>
                                </div>
                                <!-- Step 4 -->
                                <div class="flex items-center justify-center">
                                    <div id="step4"
                                        class="w-10 h-10 border-2 rounded-full flex items-center justify-center text-gray-500 bg-white">
                                        4</div>
                                </div>
                                <!-- Step 5 -->
                                <div class="flex items-center justify-center">
                                    <div id="step5"
                                        class="w-10 h-10 border-2 rounded-full flex items-center justify-center text-gray-500 bg-white">
                                        5</div>
                                </div>
                            </div>
                        </div>

                        <!-- Form container -->
                        <form id="multi-step-form" class="w-full max-w-md">
                            <!-- Step 1: Select your brand -->
                            <div id="form-step-1" class="space-y-4">
                                <h2 class="text-xl font-semibold">Select Your Brand ✨</h2>
                                <div class="grid grid-cols-2 gap-4">
                                    <label
                                        class="brand-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors"
                                        onclick="selectBrand(this)">
                                        <input type="radio" name="brand" value="Educate" class="hidden">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                            <i class="fas fa-graduation-cap text-blue-500 text-2xl"></i>
                                        </div>
                                        <span class="font-medium">Educate</span>
                                        <p class="text-gray-500 text-sm">Premium education platform.</p>
                                    </label>
                                    <label
                                        class="brand-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors"
                                        onclick="selectBrand(this)">
                                        <input type="radio" name="brand" value="Bintang Bangsa" class="hidden">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                            <i class="fas fa-star text-yellow-500 text-2xl"></i>
                                        </div>
                                        <span class="font-medium">Bintang Bangsa</span>
                                        <p class="text-gray-500 text-sm">Top choice for many students.</p>
                                    </label>
                                    <label
                                        class="brand-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors col-span-2"
                                        onclick="selectBrand(this)">
                                        <input type="radio" name="brand" value="Sukses CPNS" class="hidden">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                            <i class="fas fa-briefcase text-green-500 text-2xl"></i>
                                        </div>
                                        <span class="font-medium">Sukses CPNS</span>
                                        <p class="text-gray-500 text-sm">Specialized in CPNS preparation.</p>
                                    </label>
                                </div>
                            </div>

                            <!-- Step 2: Select your program -->
                            <div id="form-step-2" class="hidden space-y-4">
                                <h2 class="text-xl font-semibold">Select Your Program ✨</h2>
                                <div class="grid grid-cols-2 gap-4">
                                    <label
                                        class="program-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors"
                                        onclick="selectProgram(this)">
                                        <input type="radio" name="program" value="Program 1" class="hidden">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                            <i class="fas fa-book text-blue-500 text-2xl"></i>
                                        </div>
                                        <span class="font-medium">Program 1</span>
                                        <p class="text-gray-500 text-sm">Introduction to basic concepts.</p>
                                    </label>
                                    <label
                                        class="program-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors"
                                        onclick="selectProgram(this)">
                                        <input type="radio" name="program" value="Program 2" class="hidden">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                            <i class="fas fa-laptop text-yellow-500 text-2xl"></i>
                                        </div>
                                        <span class="font-medium">Program 2</span>
                                        <p class="text-gray-500 text-sm">Advanced techniques and tools.</p>
                                    </label>
                                    <label
                                        class="program-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors col-span-2"
                                        onclick="selectProgram(this)">
                                        <input type="radio" name="program" value="Program 3" class="hidden">
                                        <div
                                            class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                            <i class="fas fa-cogs text-green-500 text-2xl"></i>
                                        </div>
                                        <span class="font-medium">Program 3</span>
                                        <p class="text-gray-500 text-sm">Expert level with practical skills.</p>
                                    </label>
                                </div>
                            </div>

                            <!-- Step 3: Personal Information Form -->
                            <div id="form-step-3" class="hidden space-y-4">
                                <h2 class="text-xl font-semibold mb-4">Personal Information ✨</h2>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <input type="text" name="fullname"
                                                class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                placeholder="Fullname" required />
                                            <i class="fas fa-user absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative">
                                            <select name="subprogram"
                                                class="form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                required>
                                                <option value="" disabled selected>Select Subprogram</option>
                                                <option value="Subprogram 1">Subprogram 1</option>
                                                <option value="Subprogram 2">Subprogram 2</option>
                                            </select>
                                            <i class="fas fa-list-alt absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <select name="birth_city"
                                                class="form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                required>
                                                <option value="" disabled selected>Select City of Birth</option>
                                                <option value="City 1">City 1</option>
                                                <option value="City 2">City 2</option>
                                            </select>
                                            <i class="fas fa-city absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative">
                                            <input type="date" name="date_of_birth"
                                                class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                placeholder="Date of Birth" required />
                                            <i class="fas fa-calendar-alt absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <select name="agama"
                                                class="form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                required>
                                                <option value="" disabled selected>Select Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                            <i class="fas fa-mosque absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative flex items-center space-x-4">
                                            <div class="flex items-center">
                                                <input type="radio" id="male" name="gender" value="Male"
                                                    class="mr-2" required>
                                                <label for="male" class="text-gray-700">Male</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" id="female" name="gender" value="Female"
                                                    class="mr-2" required>
                                                <label for="female" class="text-gray-700">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <select name="provinsi"
                                                class="form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                required>
                                                <option value="" disabled selected>Select Provinsi</option>
                                                <option value="Provinsi 1">Provinsi 1</option>
                                                <option value="Provinsi 2">Provinsi 2</option>
                                            </select>
                                            <i class="fas fa-map-marker-alt absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative">
                                            <select name="city"
                                                class="form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                required>
                                                <option value="" disabled selected>Select City</option>
                                                <option value="City 1">City 1</option>
                                                <option value="City 2">City 2</option>
                                            </select>
                                            <i class="fas fa-building absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <select name="kecamatan"
                                                class="form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                required>
                                                <option value="" disabled selected>Select Kecamatan</option>
                                                <option value="Kecamatan 1">Kecamatan 1</option>
                                                <option value="Kecamatan 2">Kecamatan 2</option>
                                            </select>
                                            <i class="fas fa-location-arrow absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative">
                                            <select name="kelurahan"
                                                class="form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                required>
                                                <option value="" disabled selected>Select Kelurahan</option>
                                                <option value="Kelurahan 1">Kelurahan 1</option>
                                                <option value="Kelurahan 2">Kelurahan 2</option>
                                            </select>
                                            <i class="fas fa-home absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="postal_code"
                                            class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                            placeholder="Postal Code" required />
                                        <i class="fas fa-mail-bulk absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="relative">
                                        <textarea name="address_detail" class="form-textarea rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                            placeholder="Detail Address" required></textarea>
                                        <i class="fas fa-address-card absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <input type="text" name="previous_school"
                                                class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                placeholder="Previous School" required />
                                            <i class="fas fa-school absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative">
                                            <input type="text" name="grade"
                                                class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                                placeholder="Grade" required />
                                            <i class="fas fa-graduation-cap absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="instagram"
                                            class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                            placeholder="Instagram Username" required />
                                        <i class="fab fa-instagram absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="hobby"
                                            class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                            placeholder="Hobby" required />
                                        <i class="fas fa-basketball-ball absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="relative">
                                        <label for="ktp_document"
                                            class="block mb-2 text-sm font-medium text-gray-900">Upload Your
                                            Photo</label>
                                        <input type="file" name="your_photo"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full"
                                            required />
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="address_coordinate"
                                            class="form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full"
                                            placeholder="Address Coordinate" required />
                                        <i class="fas fa-map-marker-alt absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Parent Information -->
                            <div id="form-step-4" class="hidden space-y-4">
                                <h2 class="text-xl font-semibold">Parent Information</h2>

                                <div class="space-y-4">
                                    <!-- Father Information -->
                                    <div>
                                        <label for="father_name" class="block text-sm font-medium text-gray-700">Nama
                                            Ayah</label>
                                        <input type="text" id="father_name" required name="father_name"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label for="father_job"
                                            class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                                        <input type="text" id="father_job" name="father_job" required
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label for="father_email"
                                            class="block text-sm font-medium text-gray-700">Email Ayah</label>
                                        <input type="email" id="father_email" name="father_email" required
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label for="father_phone" class="block text-sm font-medium text-gray-700">No
                                            Telepon Ayah</label>
                                        <input type="tel" id="father_phone" name="father_phone" required
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <!-- Mother Information -->
                                    <div>
                                        <label for="mother_name" class="block text-sm font-medium text-gray-700">Nama
                                            Bunda</label>
                                        <input type="text" id="mother_name" name="mother_name" required
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label for="mother_job"
                                            class="block text-sm font-medium text-gray-700">Pekerjaan Bunda</label>
                                        <input type="text" id="mother_job" name="mother_job" required
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label for="mother_email"
                                            class="block text-sm font-medium text-gray-700">Email Bunda</label>
                                        <input type="email" id="mother_email" name="mother_email" required
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label for="mother_phone" class="block text-sm font-medium text-gray-700">No
                                            Telepon Bunda</label>
                                        <input type="tel" id="mother_phone" name="mother_phone" required
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: Final Step -->
                            <div id="form-step-5" class="hidden text-center space-y-4">
                                <!-- Icon Checkmark -->
                                <div class="flex justify-center items-center mb-4">
                                    <div class="relative w-16 h-16 flex items-center justify-center">
                                        <!-- Circle Background -->
                                        <div class="absolute inset-0 bg-blue-100 rounded-full"></div>
                                        <!-- Checkmark Icon -->
                                        <i class="fas fa-check text-blue-800 text-3xl relative z-10"></i>
                                    </div>
                                </div>

                                <!-- Text and Button -->
                                <div class="flex flex-col items-center">
                                    <h2 class="text-2xl font-semibold mb-2">Selamat Bergabung! 🎉</h2>
                                    <p class="mb-4">Terima kasih telah melengkapi formulir ini.</p>
                                    <button type="submit" id="goToDashboardBtn"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg flex items-center justify-center">
                                        Go to Dashboard
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button type="button" id="prevBtn"
                                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hidden">Back</button>
                                <button type="button" id="nextBtn"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg">Next</button>
                            </div>
                        </form>
                    </div>

                    <script>
                        let currentStep = 1;
                        const stepCount = 5;
                        const progressBar = document.getElementById('progress-bar');
                        const stepIndicators = [
                            document.getElementById('step1'),
                            document.getElementById('step2'),
                            document.getElementById('step3'),
                            document.getElementById('step4'),
                            document.getElementById('step5')
                        ];

                        function updateProgress() {
                            const progressPercentage = ((currentStep - 1) / (stepCount - 1)) * 100;
                            progressBar.style.width = `${progressPercentage}%`;

                            stepIndicators.forEach((step, index) => {
                                if (index < currentStep) {
                                    step.classList.add('bg-blue-500', 'text-white');
                                    step.classList.remove('text-gray-500', 'bg-white');
                                } else {
                                    step.classList.add('text-gray-500', 'bg-white');
                                    step.classList.remove('bg-blue-500', 'text-white');
                                }
                            });

                            // Show/Hide form steps
                            document.querySelectorAll('[id^="form-step-"]').forEach(step => {
                                if (step.id === `form-step-${currentStep}`) {
                                    step.classList.remove('hidden');
                                } else {
                                    step.classList.add('hidden');
                                }
                            });

                            // Update buttons
                            document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
                            const nextBtn = document.getElementById('nextBtn');
                            if (currentStep === stepCount) {
                                nextBtn.classList.add('hidden');
                            } else {
                                nextBtn.classList.remove('hidden');
                                nextBtn.textContent = 'Next';
                            }
                        }

                        function selectBrand(label) {
                            // Remove selected class from all brand select boxes
                            document.querySelectorAll('.brand-select-box').forEach(box => {
                                box.classList.remove('bg-blue-500', 'text-white');
                                box.classList.add('text-gray-500', 'bg-white');
                            });

                            // Add selected class to the clicked brand box
                            label.classList.add('bg-blue-500', 'text-white');
                            label.classList.remove('text-gray-500', 'bg-white');
                        }

                        function selectProgram(label) {
                            // Remove selected class from all program select boxes
                            document.querySelectorAll('.program-select-box').forEach(box => {
                                box.classList.remove('bg-blue-500', 'text-white');
                                box.classList.add('text-gray-500', 'bg-white');
                            });

                            // Add selected class to the clicked program box
                            label.classList.add('bg-blue-500', 'text-white');
                            label.classList.remove('text-gray-500', 'bg-white');
                        }

                        document.getElementById('nextBtn').addEventListener('click', () => {
                            if (currentStep < stepCount) {
                                currentStep++;
                                updateProgress();
                            }
                        });

                        document.getElementById('prevBtn').addEventListener('click', () => {
                            if (currentStep > 1) {
                                currentStep--;
                                updateProgress();
                            }
                        });

                        // Keyboard navigation
                        document.addEventListener('keydown', (event) => {
                            if (event.key === 'ArrowRight') {
                                // Pressing Right Arrow or Enter for Next
                                if (currentStep < stepCount) {
                                    currentStep++;
                                    updateProgress();
                                }
                            } else if (event.key === 'ArrowLeft') {
                                // Pressing Left Arrow for Back
                                if (currentStep > 1) {
                                    currentStep--;
                                    updateProgress();
                                }
                            } else if (event.key === 'Enter' && currentStep === stepCount) {
                                // Enter key on the last step
                                document.getElementById('nextBtn').click(); // or submit the form if needed
                            }
                        });

                        // Fungsi konfirmasi sebelum pengiriman
                        function confirmGoToDashboard() {
                            return confirm("Apakah Anda yakin telah mengisi semua data dengan benar?");
                        }

                        // Handle Go to Dashboard button confirmation
                        document.addEventListener('DOMContentLoaded', function() {
                            const goToDashboardBtn = document.getElementById('goToDashboardBtn');

                            if (goToDashboardBtn) {
                                goToDashboardBtn.addEventListener('click', (event) => {
                                    if (!confirmGoToDashboard()) {
                                        event.preventDefault(); // Stop form submission if user selects "No"
                                    }
                                });
                            }
                        });

                        // Initialize
                        updateProgress();
                    </script>
                </div>
            </div>
        </div>

        <!-- Icon Pesawat di tengah garis perbatasan -->
        <img src="{{ asset('frontend/images/logo/pesawat.png') }}" alt="icon"
            class="absolute top-1/4 transform -translate-y-1/2 left-1/2 -translate-x-1/2 w-48 h-48 hidden lg:block">

        <!-- Right side: Image -->
        <div class="hidden md:block w-1/2">
            <img src="https://plus.unsplash.com/premium_photo-1664303228186-a61e7dc91597?q=80&w=1892&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Login Image" class="w-full h-full object-cover">
        </div>
    </div>
</x-guest-layout>
