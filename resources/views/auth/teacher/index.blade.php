@section('title', 'Login/Register')
<x-login-admin-layout>
    <!-- Banner dengan gambar pertama -->
    <div class="relative">
        <img src="{{ asset('frontend/images/background/techclass.jpg') }}" class="w-full h-64 object-cover"
            alt="Background Image">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-80"></div>

        <!-- Gambar kedua dan form -->
        <div class="absolute inset-x-0 top-16 flex justify-center">
            <div class="relative w-full sm:max-w-md bg-white">
                <!-- Gambar kedua -->
                <div class="relative h-48 bg-cover bg-center w-full border border-gray-300"
                    style="background-image: url('{{ asset('frontend/images/background/techclass.jpg') }}');">
                    <!-- Lingkaran untuk logo di garis bawah gambar kedua -->
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
                        <div
                            class="w-24 h-24 bg-white border border-gray-300 shadow-md rounded-full flex justify-center items-center z-20">
                            <img src="{{ asset('frontend/images/logo/eduline.png') }}" class="h-16" alt="Logo" />
                        </div>
                    </div>
                </div>

                <!-- Card untuk form -->
                <div class="bg-white shadow-2xl rounded-lg mt-12 p-6 mb-7">
                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession
                    <!-- Teks di bawah logo -->
                    <div class="text-center mb-4">
                        <h1 id="formTitle" class="text-2xl font-bold text-gray-700">
                            Create Your Account
                            <i id="iconFire" class="fas fa-fire text-orange-500"></i>
                        </h1>
                        <p id="formDescription" class="text-sm text-gray-500">Lorem ipsum dolor sit amet Register</p>
                    </div>

                    <!-- Tombol Login/Register -->
                    <div class="flex justify-center mb-4">
                        <div class="bg-gray-100 rounded-lg flex shadow-lg w-full max-w-xs">
                            <button id="registerBtn"
                                class="flex-auto px-4 py-2 bg-white text-black border border-gray-300 rounded-l-lg shadow-md">Register</button>
                            <button id="loginBtn"
                                class="flex-auto px-4 py-2 bg-gray-200 text-black border border-gray-300 rounded-r-lg">Login</button>
                        </div>
                    </div>

                    <!-- Form Login -->
                    <div id="loginForm" class="hidden">
                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div>
                                <div class="flex items-center">
                                    <x-label for="email" value="{{ __('Email') }}" class="mr-1" />
                                    <span class="text-red-500">*</span>
                                </div>
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <div class="flex items-center">
                                    <x-label for="password" value="{{ __('Password') }}" />
                                    <span class="text-red-500">*</span>
                                </div>
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
                                        href="{{ route('teacher.passupt') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </div>
                            </div>

                            <x-button class="w-full mt-20">
                                {{ __('Log in') }}
                            </x-button>
                        </form>
                    </div>

                    <!-- Form Register -->
                    <div id="registerForm">
                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <div class="flex items-center">
                                    <x-label for="name" value="{{ __('Fullname') }}" />
                                    <span class="text-red-500">*</span>
                                </div>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <div class="flex items-center">
                                    <x-label for="phone" value="{{ __('Phone Number') }}" />
                                    <span class="text-red-500">*</span>
                                </div>
                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                    :value="old('phone')" required autofocus autocomplete="phone" />
                            </div>

                            <div class="mt-4">
                                <div class="flex items-center">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <span class="text-red-500">*</span>
                                </div>
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <div class="flex items-center">
                                    <x-label for="password" value="{{ __('Password') }}" />
                                    <span class="text-red-500">*</span>
                                </div>
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />
                            </div>

                            <x-button class="w-full text-center mt-12">
                                {{ __('Register') }}
                            </x-button>
                        </form>
                    </div>

                    <script>
                        // Jalankan klik tombol Register ketika halaman dimuat
                        document.getElementById('registerBtn').click();

                        document.getElementById('loginBtn').addEventListener('click', function() {
                            // Tampilkan form login dan sembunyikan form register
                            document.getElementById('loginForm').classList.remove('hidden');
                            document.getElementById('registerForm').classList.add('hidden');

                            // Setel gaya untuk tombol Login (aktif)
                            this.classList.add('bg-white', 'text-black', 'shadow-md');
                            this.classList.remove('bg-gray-200', 'shadow-inner');

                            // Setel gaya untuk tombol Register (tidak aktif)
                            document.getElementById('registerBtn').classList.remove('bg-white', 'text-black', 'shadow-md');
                            document.getElementById('registerBtn').classList.add('bg-gray-200', 'shadow-inner');

                            // Ubah judul form dan deskripsi
                            document.getElementById('formTitle').innerHTML =
                                'Welcome Back <i id="iconFire" class="fas fa-fire text-orange-500"></i>';
                            document.getElementById('formDescription').innerText = 'Lorem ipsum dolor sit amet Login';
                        });

                        document.getElementById('registerBtn').addEventListener('click', function() {
                            // Tampilkan form register dan sembunyikan form login
                            document.getElementById('loginForm').classList.add('hidden');
                            document.getElementById('registerForm').classList.remove('hidden');

                            // Setel gaya untuk tombol Register (aktif)
                            this.classList.add('bg-white', 'text-black', 'shadow-md');
                            this.classList.remove('bg-gray-200', 'shadow-inner');

                            // Setel gaya untuk tombol Login (tidak aktif)
                            document.getElementById('loginBtn').classList.remove('bg-white', 'text-black', 'shadow-md');
                            document.getElementById('loginBtn').classList.add('bg-gray-200', 'shadow-inner');

                            // Ubah judul form dan deskripsi
                            document.getElementById('formTitle').innerHTML =
                                'Create Your Account <i id="iconFire" class="fas fa-fire text-orange-500"></i>';
                            document.getElementById('formDescription').innerText = 'Lorem ipsum dolor sit amet Register';
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-login-admin-layout>
