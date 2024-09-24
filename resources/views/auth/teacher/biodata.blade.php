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
                            Personal Information
                            <i id="iconFire" class="fas fa-fire text-orange-500"></i>
                        </h1>
                    </div>

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession

                    <x-validation-errors class="mb-4" />

                    <form id="multiStepForm" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Form 1 -->
                        <div id="form1" class="form-step">
                            <div class="mb-4">
                                <x-label for="name" value="{{ __('Fullname') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <!-- Additional fields for form 1 -->
                            <div class="mb-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required />
                            </div>

                            <div class="mb-4">
                                <x-label for="city_of_birth" value="{{ __('City of Birth') }}" />
                                <x-input id="city_of_birth" class="block mt-1 w-full" type="text"
                                    name="city_of_birth" :value="old('city_of_birth')" required />
                            </div>

                            <div class="mb-4">
                                <x-label for="gender" value="{{ __('Gender') }}" />
                                <div class="flex items-center">
                                    <x-input id="male" type="radio" name="gender" value="male"
                                        class="mr-2" />
                                    <x-label for="male" value="{{ __('Male') }}" />
                                    <x-input id="female" type="radio" name="gender" value="female"
                                        class="ml-4 mr-2" />
                                    <x-label for="female" value="{{ __('Female') }}" />
                                </div>
                            </div>

                            <div class="mb-4">
                                <x-label for="religion" value="{{ __('Religion') }}" />
                                <x-select id="religion" name="religion">
                                    <option value="islam">{{ __('Islam') }}</option>
                                    <option value="christian">{{ __('Christian') }}</option>
                                    <!-- Add more options as needed -->
                                </x-select>
                            </div>

                            <div class="mb-4">
                                <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
                                <x-input id="date_of_birth" class="block mt-1 w-full" type="date"
                                    name="date_of_birth" :value="old('date_of_birth')" required />
                            </div>

                            <div class="mb-4">
                                <x-label for="phone" value="{{ __('Phone Number') }}" />
                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                    :value="old('phone')" required />
                            </div>

                            <div class="mb-4">
                                <x-label for="status" value="{{ __('Status') }}" />
                                <x-input id="status" class="block mt-1 w-full" type="text" name="status"
                                    :value="old('status')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="achievements" value="{{ __('Achievements') }}" />
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
                            <div class="mb-4">
                                <x-label for="province" value="{{ __('Province') }}" />
                                <x-input id="province" class="block mt-1 w-full" type="text" name="province"
                                    :value="old('province')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="city" value="{{ __('City') }}" />
                                <x-input id="city" class="block mt-1 w-full" type="text" name="city"
                                    :value="old('city')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="district" value="{{ __('District') }}" />
                                <x-input id="district" class="block mt-1 w-full" type="text" name="district"
                                    :value="old('district')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="village" value="{{ __('Village') }}" />
                                <x-input id="village" class="block mt-1 w-full" type="text" name="village"
                                    :value="old('village')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="postal_code" value="{{ __('Postal Code') }}" />
                                <x-input id="postal_code" class="block mt-1 w-full" type="text"
                                    name="postal_code" :value="old('postal_code')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="address_details" value="{{ __('Address Details') }}" />
                                <x-textarea id="address_details"
                                    name="address_details">{{ old('address_details') }}</x-textarea>
                            </div>

                            <div class="mb-4">
                                <x-label for="domicile_address" value="{{ __('Domicile Address') }}" />
                                <x-input id="domicile_address" class="block mt-1 w-full" type="text"
                                    name="domicile_address" :value="old('domicile_address')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="address_coordinates" value="{{ __('Address Coordinates') }}" />
                                <x-input id="address_coordinates" class="block mt-1 w-full" type="text"
                                    name="address_coordinates" :value="old('address_coordinates')" />
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
                            <div class="mb-4">
                                <x-label for="education_level" value="{{ __('Level of Education') }}" />
                                <x-input id="education_level" class="block mt-1 w-full" type="text"
                                    name="education_level" :value="old('education_level')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="university" value="{{ __('University') }}" />
                                <x-input id="university" class="block mt-1 w-full" type="text" name="university"
                                    :value="old('university')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="photo" value="{{ __('Photo') }}" />
                                <x-input id="photo" class="block border border-gray-300 mt-1 w-full"
                                    type="file" name="photo" />
                            </div>

                            <div class="mb-4">
                                <x-label for="major" value="{{ __('Major') }}" />
                                <x-input id="major" class="block mt-1 w-full" type="text" name="major"
                                    :value="old('major')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="subject" value="{{ __('Subject') }}" />
                                <x-input id="subject" class="block mt-1 w-full" type="text" name="subject"
                                    :value="old('subject')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="ktp" value="{{ __('KTP') }}" />
                                <x-input id="ktp" class="block border border-gray-300 mt-1 w-full"
                                    type="file" name="ktp" />
                            </div>

                            <div class="mb-4">
                                <x-label for="cv" value="{{ __('CV') }}" />
                                <x-input id="cv" class="block border border-gray-300 mt-1 w-full"
                                    type="file" name="cv" />
                            </div>

                            <div class="mb-4">
                                <x-label for="teaching_level" value="{{ __('Teaching Level') }}" />
                                <x-input id="teaching_level" class="block mt-1 w-full" type="text"
                                    name="teaching_level" :value="old('teaching_level')" />
                            </div>

                            <div class="mb-4">
                                <x-label for="teacher_requirements" value="{{ __('Teacher Requirements') }}" />
                                <x-input id="teacher_requirements" class="block mt-1 w-full" type="text"
                                    name="teacher_requirements" :value="old('teacher_requirements')" />
                            </div>

                            <!-- Buttons to navigate between forms -->
                            <div class="flex justify-between mt-4">
                                <button type="button" id="backForm3"
                                    class="bg-gray-500 text-white py-2 px-4 rounded">
                                    {{ __('Back') }}
                                </button>
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
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
    <div id="imagePreviewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 justify-center items-center hidden">
        <div class="bg-white w-8/12 p-4 rounded-lg shadow-lg relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex">
                <div class="w-8/12">
                    <img id="previewImage" src="#" alt="Image Preview" class="w-full h-full object-cover" />
                </div>
                <div class="w-4/12 flex flex-col items-center justify-center">
                    <p>Example Image</p>
                    <img src="{{ asset('frontend/images/logo/eduline.png') }}" alt="Example"
                        class="w-full h-auto mt-2" />
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const formSteps = document.querySelectorAll('.form-step');
            let currentStep = 0;

            function showStep(step) {
                formSteps.forEach((form, index) => {
                    form.classList.toggle('hidden', index !== step);
                });
            }

            document.getElementById('nextForm1').addEventListener('click', () => {
                currentStep = 1;
                showStep(currentStep);
            });

            document.getElementById('backForm2').addEventListener('click', () => {
                currentStep = 0;
                showStep(currentStep);
            });

            document.getElementById('nextForm2').addEventListener('click', () => {
                currentStep = 2;
                showStep(currentStep);
            });

            document.getElementById('backForm3').addEventListener('click', () => {
                currentStep = 1;
                showStep(currentStep);
            });

            // Modal functionality
            const modal = document.getElementById('imagePreviewModal');
            const previewImage = document.getElementById('previewImage');
            const closeModal = document.getElementById('closeModal');

            // Only add event listener to the photo input
            const photoInput = document.getElementById('photo');

            photoInput.addEventListener('change', (event) => {
                if (event.target.files[0] && event.target.files[0].type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewImage.src = e.target.result;
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            });

            closeModal.addEventListener('click', () => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            });
        });
    </script>
</x-login-admin-layout>
