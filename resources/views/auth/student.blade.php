<!-- Full-screen layout with form on the left and image on the right -->
<div class="relative min-h-screen flex">
    <!-- Left side: Login form -->
    <div class="w-full md:w-1/2 flex flex-col bg-white">
        <!-- Navbar with logo -->
        <nav class="bg-white shadow-md p-4">
            <div class="flex items-center">
                <img src="https://unsplash.com/favicon.ico" alt="Logo" class="h-8">
            </div>
        </nav>

        <!-- Login form -->
        <div class="flex-1 flex items-center justify-center pt-16"> <!-- pt-16 to offset the navbar height -->
            <div class="max-w-sm w-full">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-700">Login</h2>
                    <p class="text-gray-500">Enter your credentials to access your account</p>
                </div>

                <!-- Email field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email"
                        class="block w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        type="email" required autofocus autocomplete="username" />
                </div>

                <!-- Password field -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password"
                        class="block w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        type="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600">Remember Me</span>
                    </label>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-900">Forgot your password?</a>
                </div>

                <!-- Submit Button -->
                <button
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-bold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Log in
                </button>
            </div>
        </div>
    </div>

    <!-- Right side: Image -->
    <div class="hidden md:block w-1/2">
        <img src="https://plus.unsplash.com/premium_photo-1664303228186-a61e7dc91597?q=80&w=1892&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Login Image" class="w-full h-full object-cover">
    </div>
</div>
