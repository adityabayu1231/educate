@section('title', 'Register')
<x-guest-layout>
    <div class="relative min-h-screen flex">
        <div class="w-full md:w-1/2 flex flex-col bg-white p-8">
            <div class="flex-1 flex flex-col justify-center">
                <div class="max-w-sm w-full mx-auto">
                    <x-validation-errors class="mb-2" />

                    <div class="text-center mb-4">
                        <h2 class="text-4xl font-bold text-gray-700 flex items-center">Create an Account
                            <img src="{{ asset('frontend/images/logo/sparkle.png') }}" alt="icon" class="w-9 h-9 ml-1">
                        </h2>
                        <p class="text-gray-500 text-start">Fill in the details to create your account</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mt-3">
                            <div class="flex items-center">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <span class="text-red-500">*</span>
                            </div>
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input id="role_id" class="block mt-1 w-full" type="hidden" name="role_id"
                                :value="1" required autofocus autocomplete="role_id" />
                        </div>

                        <div class="mt-3">
                            <div class="flex items-center">
                                <x-label for="fullname" value="{{ __('Fullname') }}" />
                                <span class="text-red-500">*</span>
                            </div>
                            <x-input id="fullname" class="block mt-1 w-full" type="text" name="fullname"
                                :value="old('fullname')" required autocomplete="fullname" />
                        </div>

                        <div class="mt-3">
                            <div class="flex items-center">
                                <x-label for="phone_number" value="{{ __('Whatsapp Number') }}" />
                                <span class="text-red-500">*</span>
                            </div>
                            <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                                :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                        </div>

                        <div class="mt-3">
                            <div class="flex items-center">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <span class="text-red-500">*</span>
                            </div>
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <div class="flex items-center justify-end mt-2">
                            <x-button class="ms-4">
                                {{ __('Sign Up') }}
                            </x-button>
                        </div>
                        <div class="flex items-center justify-start">
                            <a class="text-sm text-gray-600 no-underline hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Have an Account?') }} <strong>Sign In Here</strong>
                            </a>
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
                alt="Login Image" class="w-full h-auto max-h-screen object-cover">
        </div>
    </div>
</x-guest-layout>
