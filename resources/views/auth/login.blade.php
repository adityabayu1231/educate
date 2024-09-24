@section('title', 'Login')
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
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-700 flex items-center">
                            Welcome Back!
                            <img src="{{ asset('frontend/images/logo/sparkle.png') }}" alt="icon"
                                class="w-9 h-9 ml-1">
                        </h2>
                        <p class="text-gray-500 text-start">Enter your credentials to access your account</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email"
                                class="block w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="email" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password"
                                class="block w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="flex items-center justify-between mb-6">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ms-4">
                                {{ __('Log in') }}
                            </x-button>
                        </div>

                        <!-- Continue with Google Button -->
                        <div class="flex items-center mb-6">
                            <button
                                class="w-full flex items-center py-2 px-4 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md">
                                <img src="{{ asset('frontend/images/logo/search.png') }}" alt="icon"
                                    class="w-9 h-9 mr-3">
                                <span class="flex-1 text-center">Continue with Google</span>
                            </button>
                        </div>

                        <!-- Sign Up Link -->
                        <div class="text-center text-sm text-gray-500">
                            <p>Don't you have an account? <a href="{{ route('register') }}"
                                    class="text-indigo-600 hover:text-indigo-900">Sign Up</a></p>
                        </div>
                    </form>
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
