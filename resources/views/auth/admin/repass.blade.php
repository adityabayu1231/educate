<x-guest-layout>
    <div class="relative">
        <img src="{{ asset('frontend/images/background/school.jpg') }}" class="w-full h-64 object-cover"
            alt="Background Image">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-80"></div>

        <!-- Gambar kedua dan form -->
        <div class="absolute inset-x-0 top-16 flex justify-center">
            <div class="relative w-full sm:max-w-md bg-white">
                <!-- Gambar kedua -->
                <div class="relative h-48 bg-cover bg-center w-full border border-gray-300"
                    style="background-image: url('{{ asset('frontend/images/background/school.jpg') }}');">
                    <!-- Lingkaran untuk logo di garis bawah gambar kedua -->
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
                        <div class="w-24 h-24 bg-white shadow-md rounded-full flex justify-center items-center z-20">
                            <img src="{{ asset('frontend/images/logo/eduline.png') }}" class="h-16" alt="Logo" />
                        </div>
                    </div>
                </div>

                <!-- Card untuk form -->
                <div class="bg-white shadow-2xl rounded-lg mt-12 p-6 mb-7">
                    <div class="text-center mb-4">
                        <h1 id="formTitle" class="text-2xl font-bold text-gray-700">
                            Reset Your Password
                            <i id="iconFire" class="fas fa-fire text-orange-500"></i>
                        </h1>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="block">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="email" />
                        </div>

                        <div class="relative mt-4">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('admin.index') }}"
                                    class="text-black bg-white border border-gray-300 hover:bg-gray-400 hover:text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">{{ __('Back') }}</a>

                                <x-button>
                                    {{ __('Email Password Reset Link') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
