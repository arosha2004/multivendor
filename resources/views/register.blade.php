<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Noon Partners</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen relative flex flex-col justify-center items-center font-sans">
    
    <!-- Background -->
    <div class="fixed inset-0 z-[-1]">
        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=2070&auto=format&fit=crop" alt="Background" class="w-full h-full object-cover">
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Registration Card -->
    <div class="z-10 w-full max-w-[440px] px-4">
        <div class="bg-white text-gray-900 rounded-[20px] p-8 md:p-10 shadow-2xl relative">
            
            <!-- Logo Section -->
            <div class="flex flex-col items-center justify-center mb-8">
                <!-- Group icon -->
                <svg class="w-8 h-8 text-gray-700 mb-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <div class="text-[28px] font-black tracking-tight leading-none text-black">noon</div>
                <div class="text-sm font-medium text-gray-600 mt-1">partners</div>
            </div>

            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-[22px] font-bold text-black mb-1">Sign up today</h1>
                <p class="text-[13px] text-gray-500 font-medium">to get started with noon</p>
            </div>

            <!-- Form -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-[13px]" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-[13px] font-bold text-black mb-1.5">Your name</label>
                    <input type="text" id="name" name="name" 
                        class="w-full bg-gray-50/50 border border-gray-200 text-black rounded-lg px-3.5 py-2.5 text-[14px] focus:outline-none focus:border-gray-400 focus:bg-white transition-colors placeholder:text-gray-400" 
                        placeholder="Enter your name" required>
                </div>

                <div>
                    <label for="email" class="block text-[13px] font-bold text-black mb-1.5">Email address</label>
                    <input type="email" id="email" name="email" 
                        class="w-full bg-gray-50/50 border border-gray-200 text-black rounded-lg px-3.5 py-2.5 text-[14px] focus:outline-none focus:border-gray-400 focus:bg-white transition-colors placeholder:text-gray-400" 
                        placeholder="Enter your email address" required>
                </div>

                <!-- reCAPTCHA Placeholder -->
                <div class="pt-2 pb-2 flex justify-center">
                    <div class="flex items-center justify-between border border-gray-300 bg-[#f9f9f9] rounded-[3px] p-2 w-[300px] max-w-full shadow-sm">
                        <div class="flex items-center gap-3 pl-1">
                            <input type="checkbox" class="w-7 h-7 border-2 border-gray-300 rounded-sm cursor-pointer bg-white accent-blue-600">
                            <span class="text-[13px] text-gray-700 font-medium">I'm not a robot</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" class="w-8 h-8 opacity-80">
                            <div class="text-[8px] text-gray-500 mt-1 flex flex-col items-center leading-none space-y-1">
                                <span>reCAPTCHA</span>
                                <div class="space-x-0.5">
                                    <a href="#" class="hover:underline">Privacy</a> <span class="text-[6px]">-</span> <a href="#" class="hover:underline">Terms</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-black font-semibold py-3.5 px-4 rounded-full transition-colors flex items-center justify-center gap-2 text-[15px]">
                        Continue <span class="font-normal">&rarr;</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-[13px] text-black font-medium">
                    Already have an account? 
                    <a href="/login" class="font-bold hover:underline">Log in</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Footer Links -->
    <div class="absolute bottom-6 w-full px-8 flex justify-between items-center z-10 text-white text-[13px] font-medium">
        <button class="flex items-center gap-1 hover:text-gray-300 transition-colors">
            English 
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
        <a href="#" class="hover:text-gray-300 transition-colors">Help</a>
    </div>

</body>
</html>
