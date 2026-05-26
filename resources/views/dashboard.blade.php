<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Noon Partners</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen bg-gray-50 text-gray-900 font-sans">
    
    <nav class="bg-white border-b border-gray-200 py-4 px-6 md:px-12 flex justify-between items-center">
        <div class="flex items-center">
            <!-- Logo -->
            <div class="noon-yellow font-black text-2xl tracking-tighter flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round"><path d="M12 21a9 9 0 1 1 6.36-2.64"></path><circle cx="18" cy="6" r="2" fill="currentColor" stroke="none"></circle></svg>
                noon
            </div>
            <div class="text-sm font-medium text-gray-600 ml-2 mt-1">partners</div>
        </div>
        <div>
            <span class="text-sm font-medium mr-4">Welcome, {{ auth()->user()->name }}</span>
            <a href="#" class="text-sm text-gray-600 hover:text-black">Logout</a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-12 px-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
            <p class="text-gray-600">Your account has been successfully created. You can now start managing your store and scaling your business.</p>
        </div>
    </div>

</body>
</html>
