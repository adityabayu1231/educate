@section('title', 'Login/Register')

<x-login-admin-layout>
    <!-- Banner dengan gambar pertama -->
    <div class="relative">
        <img src="{{ asset('frontend/images/background/school.jpg') }}" class="w-full h-64 object-cover"
            alt="Background Image">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-80"></div>

        <!-- Gambar kedua dan form -->
        <div class="absolute inset-x-0 top-16 flex justify-center">
            <div class="relative w-full sm:max-w-md bg-white mb-5">
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
                <div class="bg-white rounded-lg mt-12 p-6 mb-7">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Teks di bawah logo -->
                    <div class="text-center mb-4">
                        <h1 id="formTitle" class="text-2xl font-bold text-gray-700">
                            Login to Your Account
                            <i id="iconFire" class="fas fa-fire text-orange-500"></i>
                        </h1>
                        <p id="formDescription" class="text-sm text-gray-500">Please log in to access your account</p>
                    </div>

                    <!-- Form Login -->
                    <div id="loginForm">
                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <div>
                                <label for="email" class="block text-gray-700">
                                    {{ __('Email') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <label for="password" class="block text-gray-700">
                                    {{ __('Password') }}
                                    <span class="text-red-500">*</span>
                                </label>
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />
                            </div>

                            <div class="block mt-4">
                                <div class="flex items-center justify-between">
                                    <label for="remember_me" class="flex items-center">
                                        <x-checkbox id="remember_me" name="remember" />
                                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>

                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('admin.repass') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </div>
                            </div>

                            <x-button class="w-full mt-6">
                                {{ __('Log in') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-login-admin-layout>
