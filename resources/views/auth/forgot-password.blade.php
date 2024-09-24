@section('title', 'Register')
<x-guest-layout>
    <div class="relative min-h-screen flex">
        <div class="w-full md:w-1/2 flex flex-col bg-white p-8">
            <div class="flex-1 flex flex-col justify-center">
                <div class="max-w-sm w-full mx-auto">
                    <x-validation-errors class="mb-4" />

                    <div class="mb-6 text-start">
                        <h2 class="text-2xl font-bold text-gray-700">Reset Your Password</h2>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Email field -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <x-input id="email"
                                class="mt-1 block w-full rounded-md border border-gray-400 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="email" />
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-6 flex justify-end">
                            <a href="{{ route('login') }}"
                                class="mr-3 rounded-md border border-gray-400 bg-white px-6 py-2 font-bold text-blue-600 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Back') }}</a>
                            <button
                                class="rounded-md bg-indigo-600 px-4 py-2 font-bold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Send
                                Reset Link</button>
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
