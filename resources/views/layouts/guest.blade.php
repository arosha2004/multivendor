<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'emall') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#FCFBF4] min-h-screen">
        <div class="min-h-screen flex flex-col md:flex-row">
            <!-- Left Side: Banner (Visible on medium screens and up) -->
            <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-[#FEE000] via-[#FCD116] to-[#F5C300] p-12 flex-col justify-between items-start text-black relative overflow-hidden">
                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-white opacity-10 rounded-full blur-xl"></div>
                <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-96 h-96 bg-black opacity-5 rounded-full blur-2xl"></div>

                <!-- Logo -->
                <div class="z-10">
                    <a href="/" class="text-4xl font-black tracking-tighter lowercase text-black hover:opacity-80 transition flex items-center space-x-2">
                        <x-application-logo class="w-10 h-10 stroke-black text-transparent" />
                        <span>emall</span>
                    </a>
                </div>

                <!-- Feature list / Hero text -->
                <div class="my-auto z-10 max-w-lg space-y-6">
                    <h1 class="text-4xl lg:text-5xl font-black leading-tight tracking-tight text-gray-950">
                        Join the next generation of online shopping.
                    </h1>
                    <p class="text-md font-semibold text-gray-900 leading-relaxed">
                        Discover a seamless experience designed for both buyers and sellers. Connect with trusted vendors, explore handpicked collections, and enjoy ultra-fast checkout.
                    </p>
                    <div class="pt-6 space-y-4 text-sm font-bold text-gray-900">
                        <div class="flex items-center space-x-3 bg-white bg-opacity-35 p-3.5 rounded-xl border border-white border-opacity-30 backdrop-blur-sm">
                            <span class="text-lg">📦</span>
                            <span>Direct access to verified local and global sellers</span>
                        </div>
                        <div class="flex items-center space-x-3 bg-white bg-opacity-35 p-3.5 rounded-xl border border-white border-opacity-30 backdrop-blur-sm">
                            <span class="text-lg">⚡</span>
                            <span>Secure checkout and instant tracking with emall One</span>
                        </div>
                        <div class="flex items-center space-x-3 bg-white bg-opacity-35 p-3.5 rounded-xl border border-white border-opacity-30 backdrop-blur-sm">
                            <span class="text-lg">💼</span>
                            <span>Powerful vendor tools to run and scale your business</span>
                        </div>
                    </div>
                </div>

                <!-- Footer text -->
                <div class="z-10 text-xs font-bold text-gray-800">
                    &copy; {{ date('Y') }} emall. All rights reserved.
                </div>
            </div>

            <!-- Right Side: Auth Form Container -->
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-6 sm:p-12 min-h-screen bg-[#FCFBF4]">
                <!-- Mobile Logo (Visible on mobile/tablet) -->
                <div class="md:hidden mb-8">
                    <a href="/" class="text-4xl font-black tracking-tighter lowercase text-black hover:opacity-85 transition flex items-center space-x-2">
                        <x-application-logo class="w-10 h-10 stroke-black text-transparent" />
                        <span>emall</span>
                    </a>
                </div>

                <!-- Form Card wrapper -->
                <div class="w-full max-w-[440px] bg-white p-8 md:p-10 rounded-2xl border border-gray-200 shadow-sm">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
