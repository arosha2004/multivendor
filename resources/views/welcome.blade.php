<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans flex items-center justify-center min-h-screen bg-gray-100 text-gray-900">
    <div class="text-center">
        <h1 class="text-5xl font-bold mb-4">Laravel</h1>
        <p class="text-lg text-gray-600">A clean starting point.</p>
    </div>
</body>
</html>
