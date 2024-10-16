@section('title', 'Lengkapi Biodata')
<x-guest-layout>
    <div class="relative min-h-screen flex">
        <!-- Left side: Login form -->
        <div class="w-full md:w-1/2 flex flex-col bg-white p-6 relative">
            <div class="flex flex-col justify-center">
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
                        <form id="multi-step-form" class="w-full max-w-md" action="{{ route('students.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 1: Select your brand -->
                            <div id="form-step-1" class="space-y-4">
                                <h2 class="text-xl font-semibold">Select Your Brand ✨</h2>
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($brands as $brand)
                                        <label
                                            class="brand-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors"
                                            onclick="selectBrand(this)">
                                            <input type="radio" name="brand_id" value="{{ $brand->id }}"
                                                class="hidden">
                                            <div
                                                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                                <img src="{{ asset('storage/' . $brand->icon_brand) }}"
                                                    alt="{{ $brand->name_brand }} Icon" class="w-8 h-8">
                                                <!-- Ganti <i> dengan <img> -->
                                            </div>
                                            <span class="font-medium">{{ $brand->name_brand }}</span>
                                            <!-- Nama merek -->
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Step 2: Select your program -->
                            <div id="form-step-2" class="hidden space-y-4">
                                <h2 class="text-xl font-semibold">Select Your Program ✨</h2>
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($programs as $program)
                                        <label
                                            class="program-select-box flex flex-col items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500 transition-colors"
                                            onclick="selectProgram(this)">
                                            <input type="radio" name="program_id" value="{{ $program->id }}"
                                                class="hidden"> <!-- Ubah value di sini -->
                                            <div
                                                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                                <img src="{{ asset('storage/' . $program->cover_image) }}"
                                                    alt="{{ $program->name_program }} Image" class="w-8 h-8">
                                                <!-- Ganti <i> dengan <img> -->
                                            </div>
                                            <span class="text-xs font-bold">{{ $program->name_program }}</span>
                                            <!-- Nama program -->
                                            <p class="text-xs text-center">{{ $program->description }}.</p>
                                            <!-- Deskripsi program -->
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Step 3: Personal Information Form -->
                            <div id="form-step-3" class="hidden space-y-4">
                                <h2 class="text-xl font-semibold mb-4">Personal Information ✨</h2>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <input type="text" name="fullname"
                                                class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm bg-gray-100 cursor-not-allowed"
                                                value="{{ auth()->user()->fullname }}" readonly />
                                            <i class="fas fa-user absolute top-3 left-3 text-gray-500"></i>
                                        </div>

                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <div class="relative">
                                            <select name="subprogram"
                                                class="required-field form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                                required>
                                                <option value="" disabled selected>Select Subprogram</option>
                                            </select>
                                            <i class="fas fa-list-alt absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <input type="text" name="birth_city" id="cityInput"
                                                placeholder="Enter City of Birth"
                                                class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                                required>
                                            <i class="fas fa-city absolute top-3 left-3 text-gray-500"></i>
                                        </div>

                                        <div class="relative">
                                            <input type="date" name="date_of_birth"
                                                class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                                placeholder="Date of Birth" required />
                                            <i class="fas fa-calendar-alt absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <select name="agama"
                                                class="required-field form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                                required>
                                                <option value="" disabled selected>Select Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                            <i class="fas fa-mosque absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative flex items-center space-x-4 text-sm">
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
                                                class="required-field form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm"
                                                required>
                                                <option value="" disabled selected>Select Provinsi</option>
                                                <!-- Provinsi options akan dimasukkan di sini -->
                                            </select>
                                            <i class="fas fa-map-marker-alt absolute top-3 left-3 text-gray-500"></i>
                                        </div>

                                        <div class="relative">
                                            <select name="city"
                                                class="required-field form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm"
                                                disabled required>
                                                <option value="" disabled selected>Select City</option>
                                            </select>
                                            <i class="fas fa-building absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <select name="kecamatan"
                                                class="required-field form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm"
                                                disabled required>
                                                <option value="" disabled selected>Select Kecamatan</option>
                                            </select>
                                            <i class="fas fa-location-arrow absolute top-3 left-3 text-gray-500"></i>
                                        </div>

                                        <div class="relative">
                                            <select name="kelurahan"
                                                class="required-field form-select rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm"
                                                disabled required>
                                                <option value="" disabled selected>Select Kelurahan</option>
                                            </select>
                                            <i class="fas fa-home absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <input type="text" name="postal_code"
                                            class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                            placeholder="Postal Code" required />
                                        <i class="fas fa-mail-bulk absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="relative">
                                        <textarea name="address_detail"
                                            class="required-field form-textarea rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                            placeholder="Detail Address" required></textarea>
                                        <i class="fas fa-address-card absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="relative">
                                            <input type="text" name="previous_school"
                                                class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                                placeholder="Previous School" required />
                                            <i class="fas fa-school absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                        <div class="relative">
                                            <input type="text" name="grade"
                                                class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                                placeholder="Grade" required />
                                            <i class="fas fa-graduation-cap absolute top-3 left-3 text-gray-500"></i>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="instagram"
                                            class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                            placeholder="Instagram Username" required />
                                        <i class="fab fa-instagram absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="hobby"
                                            class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                            placeholder="Hobby" required />
                                        <i class="fas fa-basketball-ball absolute top-3 left-3 text-gray-500"></i>
                                    </div>
                                    <div class="relative">
                                        <label for="ktp_document"
                                            class="block mb-2 text-sm font-medium text-gray-900">Upload Your
                                            Photo</label>
                                        <input type="file" name="your_photo"
                                            class="required-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full"
                                            required />
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="address_coordinate"
                                            class="required-field form-input rounded-lg pl-10 pr-3 py-2 border border-gray-300 w-full text-sm placeholder:text-sm"
                                            placeholder="Address Coordinate (Optional)" />
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
                                        <label class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                                        <input type="text" name="father_name" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                                        <input type="text" name="father_occupation" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Email Ayah</label>
                                        <input type="email" name="father_email" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">No Telepon Ayah</label>
                                        <input type="tel" name="father_phone" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <!-- Mother Information -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nama Bunda</label>
                                        <input type="text" name="mother_name" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Pekerjaan Bunda</label>
                                        <input type="text" name="mother_occupation" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Email Bunda</label>
                                        <input type="email" name="mother_email" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">No Telepon Bunda</label>
                                        <input type="tel" name="mother_phone" required
                                            class="required-form mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" />
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: Final Step -->
                            <div id="form-step-5" class="hidden text-center space-y-6">
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
                                    <h2 class="text-2xl font-semibold mb-2">Selamat Bergabung! ✨</h2>
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

                    <script src="{{ asset('js/form-navigation.js') }}"></script>
                    <script src="{{ asset('js/wilayah.js') }}"></script>
                    <script src="{{ asset('js/filteruserbio.js') }}"></script>
                </div>
            </div>
        </div>

        <!-- Icon Pesawat di tengah garis perbatasan -->
        <img src="{{ asset('frontend/images/logo/pesawat.png') }}" alt="icon"
            class="absolute top-1/3 transform -translate-y-1/2 left-1/2 -translate-x-1/2 w-48 h-48 hidden lg:block">

        <!-- Right side: Image -->
        <div class="hidden md:block w-1/2">
            <img src="https://plus.unsplash.com/premium_photo-1664303228186-a61e7dc91597?q=80&w=1892&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Login Image" class="w-full h-full object-cover">
        </div>
    </div>
</x-guest-layout>
