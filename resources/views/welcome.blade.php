<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediPulse | Clinic Appointments</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-br from-teal-50 to-indigo-100 text-gray-800 font-sans">
    <div class="flex items-center justify-center min-h-screen px-6">
        <div class="bg-white rounded-2xl shadow-2xl p-10 w-full max-w-lg space-y-10 transform transition duration-500 hover:shadow-3xl"
             x-data="{ showLogin: true }">
             
            <!-- Branding with Logo -->
            <div class="text-center space-y-5">
                <!-- Logo Image -->
                <img src="{{ asset('logo.jpg') }}" alt="MediPulse Logo" class="mx-auto h-20 w-auto">

                <h1 class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-indigo-600 drop-shadow-lg">
                    MediPulse
                </h1>
                <p class="text-lg text-gray-500">Your Smart Clinic Appointment System</p>
                <p class="text-base text-gray-600 max-w-md mx-auto">
                    Another day, another patient na namn mga goys
                </p>
            </div>

            <!-- Sliding Forms Container -->
            <div class="relative w-full overflow-hidden h-16">
                <!-- Login Button -->
                <div x-show="showLogin"
                     x-transition:enter="transform transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-x-full scale-90"
                     x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                     x-transition:leave="transform transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                     x-transition:leave-end="opacity-0 -translate-x-full scale-90"
                     class="absolute w-full">
                    <a href="{{ route('login') }}">
                        <button class="w-full py-4 bg-teal-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-teal-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-teal-300">
                            Login
                        </button>
                    </a>
                </div>

                <!-- Register Button -->
                <div x-show="!showLogin"
                     x-transition:enter="transform transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 -translate-x-full scale-90"
                     x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                     x-transition:leave="transform transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-x-full scale-90"
                     class="absolute w-full">
                    <a href="{{ route('register') }}">
                        <button class="w-full py-4 bg-indigo-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                            Register
                        </button>
                    </a>
                </div>
            </div>

            <!-- Toggle Button -->
            <div class="text-center mt-6">
                <button @click="showLogin = !showLogin" class="text-teal-600 hover:underline focus:outline-none text-lg font-medium">
                    <span x-text="showLogin ? 'Don\'t have an account? Register' : 'Already have an account? Login'"></span>
                </button>
            </div>
        </div>
    </div>
</body>
</html>
