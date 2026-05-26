<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans flex flex-col items-center justify-center min-h-screen bg-gray-100 text-gray-900 relative">
    @if (Route::has('login'))
        <div class="absolute top-0 right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="text-center">
        <h1 class="text-5xl font-bold mb-4">Laravel</h1>
        <p class="text-lg text-gray-600">A clean starting point.</p>
        <div class="mt-8">
            <a href="{{ route('login') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded hover:bg-indigo-700 transition">Go to Login Portal</a>
        </div>
    </div>
</body>
</html>
