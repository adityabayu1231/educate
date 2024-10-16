<x-login-admin-layout>
    <div class="relative">
        <!-- Background Image -->
        <img src="{{ asset('frontend/images/background/techclass.jpg') }}" class="w-full h-64 object-cover"
            alt="Background Image">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-80"></div>

        <!-- Form Container -->
        <div class="absolute inset-x-0 top-16 flex justify-center">
            <div class="relative w-full sm:max-w-md bg-white">
                <!-- Logo -->
                <div class="relative h-48 bg-cover bg-center w-full border border-gray-300"
                    style="background-image: url('{{ asset('frontend/images/background/techclass.jpg') }}');">
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
                        <div
                            class="w-24 h-24 bg-white border border-gray-300 shadow-md rounded-full flex justify-center items-center z-20">
                            <img src="{{ asset('frontend/images/logo/eduline.png') }}" class="h-16" alt="Logo" />
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white shadow-2xl rounded-lg mt-12 p-6 mb-7">
                    <div class="text-center mb-4">
                        <h1 id="formTitle" class="text-2xl font-bold text-gray-700">
                            Informasi Pribadi
                            <i id="iconFire" class="fas fa-fire text-orange-500"></i>
                        </h1>
                    </div>

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession

                    <x-validation-errors class="mb-4" />

                    <form id="multiStepForm" method="POST" action="{{ route('teacher.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Form 1 -->
                        <div id="form1" class="form-step">
                            <!-- Nama Lengkap -->
                            <div class="mb-4">
                                <x-label for="name" value="{{ __('Nama Lengkap') }}" />
                                <x-input id="name"
                                    class="block mt-1 w-full bg-gray-200 text-gray-600 required-field" type="text"
                                    name="name" value="{{ Auth::user()->fullname }}" required readonly />
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email"
                                    class="block mt-1 w-full bg-gray-200 text-gray-600 required-field" type="email"
                                    name="email" value="{{ Auth::user()->email }}" required readonly />
                            </div>

                            <!-- Nomor Handphone -->
                            <div class="mb-4">
                                <x-label for="phone" value="{{ __('Nomor Handphone') }}" />
                                <x-input id="phone"
                                    class="block mt-1 w-full bg-gray-200 text-gray-600 required-field" type="text"
                                    name="phone" value="{{ Auth::user()->phone_number }}" required readonly />
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="mb-4">
                                <x-label for="city_of_birth" value="{{ __('Tempat Lahir') }}" />
                                <x-input id="city_of_birth"
                                    class="block mt-1 w-full required-field focus:ring-2 focus:ring-blue-500"
                                    type="text" name="city_of_birth" :value="old('city_of_birth')" required />
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="mb-4">
                                <x-label for="date_of_birth" value="{{ __('Tanggal Lahir') }}" />
                                <x-input id="date_of_birth" class="block mt-1 w-full required-field" type="date"
                                    name="date_of_birth" :value="old('date_of_birth')" required />
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="mb-4">
                                <x-label for="gender" value="{{ __('Jenis Kelamin') }}" />
                                <div class="flex items-center">
                                    <x-input id="male" type="radio" name="gender" value="male"
                                        class="mr-2 required-field" />
                                    <x-label for="male" value="{{ __('Pria') }}" />
                                    <x-input id="female" type="radio" name="gender" value="female"
                                        class="ml-4 mr-2 required-field" />
                                    <x-label for="female" value="{{ __('Wanita') }}" />
                                </div>
                            </div>

                            <!-- Agama -->
                            <div class="mb-4">
                                <x-label for="religion" value="{{ __('Agama') }}" />
                                <x-select id="religion" name="religion" class="required-field">
                                    <option value="islam">{{ __('Islam') }}</option>
                                    <option value="kristen">{{ __('Kristen') }}</option>
                                    <option value="hindu">{{ __('Hindu') }}</option>
                                    <option value="buddha">{{ __('Buddha') }}</option>
                                    <option value="konghucu">{{ __('Konghucu') }}</option>
                                </x-select>
                            </div>

                            <!-- Prestasi -->
                            <div class="mb-4">
                                <x-label for="achievements" value="{{ __('Prestasi') }}" />
                                <x-input id="achievements" class="block mt-1 w-full" type="text"
                                    name="achievements" :value="old('achievements')" />
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="button" id="nextForm1"
                                    class="bg-blue-500 text-white py-2 px-4 rounded">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div>

                        <!-- Form 2 -->
                        <div id="form2" class="form-step hidden">
                            <!-- Provinsi -->
                            <div class="mb-4">
                                <x-label for="province" value="{{ __('Provinsi') }}" />
                                <select name="province" id="province"
                                    class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 required-field">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                </select>
                            </div>

                            <!-- Kota/Kabupaten -->
                            <div class="mb-4">
                                <x-label for="city" value="{{ __('Kota/Kabupaten') }}" />
                                <select name="city" id="city"
                                    class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 required-field"
                                    disabled>
                                    <option value="" disabled selected>Pilih Kota</option>
                                </select>
                            </div>

                            <!-- Kecamatan -->
                            <div class="mb-4">
                                <x-label for="district" value="{{ __('Kecamatan') }}" />
                                <select name="district" id="district"
                                    class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 required-field"
                                    disabled>
                                    <option value="" disabled selected>Pilih Kecamatan</option>
                                </select>
                            </div>

                            <!-- Kelurahan -->
                            <div class="mb-4">
                                <x-label for="village" value="{{ __('Kelurahan') }}" />
                                <select name="village" id="village"
                                    class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 required-field"
                                    disabled>
                                    <option value="" disabled selected>Pilih Kelurahan</option>
                                </select>
                            </div>

                            <!-- Kode Pos -->
                            <div class="mb-4">
                                <x-label for="postal_code" value="{{ __('Kode Pos') }}" />
                                <x-input id="postal_code"
                                    class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 required-field"
                                    type="text" name="postal_code" :value="old('postal_code')" />
                            </div>

                            <!-- Alamat Lengkap -->
                            <div class="mb-4">
                                <x-label for="address_details" value="{{ __('Alamat Lengkap') }}" />
                                <x-textarea id="address_details" name="address_details"
                                    class="required-field p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">{{ old('address_details') }}</x-textarea>
                            </div>

                            <div class="flex justify-between mt-4">
                                <button type="button" id="backForm2"
                                    class="bg-gray-500 text-white py-2 px-4 rounded">
                                    {{ __('Back') }}
                                </button>
                                <button type="button" id="nextForm2"
                                    class="bg-blue-500 text-white py-2 px-4 rounded">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div>

                        <!-- Form 3 -->
                        <div id="form3" class="form-step hidden">
                            <!-- Universitas -->
                            <div class="mb-4">
                                <x-label for="university" value="{{ __('Universitas') }}" />
                                <x-input id="university" class="block mt-1 w-full required-field" type="text"
                                    name="university" :value="old('university')" />
                            </div>

                            <!-- Gelar -->
                            <div class="mb-4">
                                <x-label for="degree" value="{{ __('Gelar') }}" />
                                <x-input id="degree" class="block mt-1 w-full required-field" type="text"
                                    name="degree" :value="old('degree')" />
                            </div>

                            <!-- Jurusan -->
                            <div class="mb-4">
                                <x-label for="major" value="{{ __('Jurusan') }}" />
                                <x-input id="major" class="block mt-1 w-full required-field" type="text"
                                    name="major" :value="old('major')" />
                            </div>

                            <!-- Jenjang Mengajar -->
                            <div class="mb-4">
                                <x-label for="teaching_level" value="{{ __('Jenjang Mengajar') }}" />
                                <x-input id="teaching_level" class="block mt-1 w-full required-field" type="text"
                                    name="teaching_level" :value="old('teaching_level')" />
                            </div>

                            <!-- Foto -->
                            <div class="mb-4">
                                <x-label for="photo" value="{{ __('Foto') }}" />
                                <x-input id="photo" class="block mt-1 w-full" type="file" name="photo"
                                    accept="image/*" onchange="previewImage(event)" />
                            </div>

                            <!-- KTP -->
                            <div class="mb-4">
                                <x-label for="ktp" value="{{ __('KTP') }}" />
                                <x-input id="ktp" class="block mt-1 w-full" type="file" name="ktp"
                                    accept=".pdf,.doc,.docx,image/*" />
                            </div>

                            <!-- CV -->
                            <div class="mb-4">
                                <x-label for="cv" value="{{ __('CV') }}" />
                                <x-input id="cv" class="block mt-1 w-full" type="file" name="cv"
                                    accept=".pdf,.doc,.docx,image/*" />
                            </div>

                            <!-- Bank -->
                            <div class="mb-4">
                                <x-label for="bank" value="{{ __('Bank') }}" />
                                <x-input id="bank" class="block mt-1 w-full required-field" type="text"
                                    name="bank" :value="old('bank')" />
                            </div>

                            <!-- Nomor Rekening -->
                            <div class="mb-4">
                                <x-label for="account_number" value="{{ __('Nomor Rekening') }}" />
                                <x-input id="account_number" class="block mt-1 w-full required-field" type="text"
                                    name="account_number" :value="old('account_number')" />
                            </div>

                            <!-- Rekening Atas Nama -->
                            <div class="mb-4">
                                <x-label for="account_name" value="{{ __('Rekening Atas Nama') }}" />
                                <x-input id="account_name" class="block mt-1 w-full required-field" type="text"
                                    name="account_name" :value="old('account_name')" />
                            </div>

                            <!-- ID Mata Pelajaran -->
                            <div class="mb-4">
                                <x-label for="subject_ids" value="{{ __('ID Mata Pelajaran') }}" />
                                <div class="relative">
                                    <button type="button" id="selectAll"
                                        class="absolute top-0 right-0 mt-1 mr-2 bg-blue-500 text-white px-3 py-1 rounded">
                                        Select All
                                    </button>
                                    <div class="overflow-y-auto max-h-60 border border-gray-300 rounded-lg shadow-lg">
                                        @foreach ($subjects as $subject)
                                            <label class="flex items-center p-2 hover:bg-gray-100 cursor-pointer">
                                                <input type="checkbox" name="subject_ids[]"
                                                    value="{{ $subject->id }}" class="mr-2"
                                                    {{ is_array(old('subject_ids')) && in_array($subject->id, old('subject_ids')) ? 'checked' : '' }}>
                                                {{ $subject->nama_mapel }}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-4">
                                <x-label for="notes" value="{{ __('Keterangan') }}" />
                                <x-textarea id="notes" name="notes"
                                    class="required-field p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">{{ old('notes') }}</x-textarea>
                            </div>

                            <div class="flex justify-between mt-4">
                                <button type="button" id="backForm3"
                                    class="bg-gray-500 text-white py-2 px-4 rounded">
                                    {{ __('Back') }}
                                </button>
                                <button type="button"
                                    onclick="if(confirm('Are you sure you want to submit the form?')) { document.getElementById('multiStepForm').submit(); }"
                                    class="bg-blue-500 text-white py-2 px-4 rounded">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for image preview -->
    <div id="imagePreviewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50  justify-center items-center hidden">
        <div class="bg-white w-11/12 sm:w-8/12 md:w-6/12 lg:w-3/12 p-4 rounded-lg shadow-lg relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex flex-col items-center">
                <img id="previewImage" src="#" alt="Image Preview" class="w-36 h-36 object-cover mb-2" />
                <!-- Gambar preview lebih kecil -->
                <p class="text-center">Example Image</p>
                <img src="{{ asset('frontend/images/logo/eduline.png') }}" alt="Example"
                    class="w-24 h-auto mt-2" /> <!-- Ukuran gambar contoh lebih kecil -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function checkRequiredFields(step) {
                let requiredFields = step.querySelectorAll('.required-field');
                for (let field of requiredFields) {
                    if (field.type !== "radio" && !field.value) {
                        return false;
                    }
                    if (field.type === "radio" && !step.querySelector('input[name="' + field.name + '"]:checked')) {
                        return false;
                    }
                }
                return true;
            }

            document.getElementById('nextForm1').addEventListener('click', function() {
                if (checkRequiredFields(document.getElementById('form1'))) {
                    document.getElementById('form1').classList.add('hidden');
                    document.getElementById('form2').classList.remove('hidden');
                } else {
                    alert('Please fill in all required fields.');
                }
            });

            document.getElementById('nextForm2').addEventListener('click', function() {
                if (checkRequiredFields(document.getElementById('form2'))) {
                    document.getElementById('form2').classList.add('hidden');
                    document.getElementById('form3').classList.remove('hidden');
                } else {
                    alert('Please fill in all required fields.');
                }
            });

            // Event listener untuk tombol back pada form 2
            document.getElementById('backForm2').addEventListener('click', function() {
                document.getElementById('form2').classList.add('hidden');
                document.getElementById('form1').classList.remove('hidden');
            });

            // Event listener untuk tombol back pada form 3
            document.getElementById('backForm3').addEventListener('click', function() {
                document.getElementById('form3').classList.add('hidden');
                document.getElementById('form2').classList.remove('hidden');
            });
        });

        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('previewImage');
                    previewImage.src = e.target.result;

                    // Menampilkan modal
                    const modal = document.getElementById('imagePreviewModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                };
                reader.readAsDataURL(file);
            }
        }

        // Event listener untuk tombol close modal
        document.getElementById('closeModal').addEventListener('click', function() {
            const modal = document.getElementById('imagePreviewModal');
            modal.classList.add('hidden');
        });
        // Toggle Select All
        document.getElementById('selectAll').addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent form submission when clicking the button
            const checkboxes = document.querySelectorAll('input[name="subject_ids[]"]');
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);

            checkboxes.forEach(checkbox => {
                checkbox.checked = !allChecked;
            });
        });
    </script>
    <script src="{{ asset('js/wilayah2.js') }}"></script>
</x-login-admin-layout>
