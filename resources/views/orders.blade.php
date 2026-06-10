<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Orders | emall account</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts and styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #F7F8FA;
            color: #383e50;
        }
        
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Micro-animations */
        .sidebar-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-item:hover {
            transform: translateX(4px);
        }
        .sidebar-item-active {
            border-left: 4px solid #FEE000;
            background-color: #FFFDF0;
            font-weight: 600;
        }

        /* Custom glow & shadow details */
        .premium-card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.02);
            transition: box-shadow 0.25s ease, transform 0.25s ease;
        }
        .premium-card:hover {
            box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.05), 0 2px 4px 0 rgba(0, 0, 0, 0.02);
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col">

    {{-- ======== TOP YELLOW HEADER ======== --}}
    <div class="bg-[#FEE000] w-full sticky top-0 z-50 shadow-sm border-b border-yellow-400">
        <div class="max-w-[1400px] mx-auto px-3 sm:px-6 lg:px-8 flex items-center justify-between py-2.5 sm:py-3">
            
            <!-- Logo Section -->
            <div class="flex items-center space-x-2 shrink-0">
                <a href="{{ route('dashboard') }}" class="text-2xl sm:text-3xl font-extrabold tracking-tighter text-black lowercase leading-none hover:opacity-85 transition">emall</a>
                <span class="hidden sm:block text-sm font-semibold text-gray-800 tracking-wide lowercase mt-1.5 opacity-90">account</span>
            </div>

            <!-- Search Bar (hidden on mobile) -->
            <div class="hidden md:block flex-1 max-w-[650px] mx-6">
                <div class="w-full bg-white rounded-full flex items-center px-4 py-2 border border-transparent shadow-sm focus-within:ring-2 focus-within:ring-yellow-400 transition">
                    <svg class="h-5 w-5 text-gray-400 mr-2.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1110.5 2.5a7.5 7.5 0 0110.602 10.602z"></path>
                    </svg>
                    <input type="text" placeholder="What are you looking for?" class="w-full bg-transparent border-none focus:ring-0 focus:outline-none p-0 text-gray-900 placeholder-gray-400 text-sm font-normal" style="border: none !important; outline: none !important; box-shadow: none !important;">
                </div>
            </div>

            <!-- Right Navigation -->
            <div class="flex items-center space-x-3 sm:space-x-5 text-sm font-semibold text-gray-950 shrink-0">
                <!-- Language switcher (hidden on mobile) -->
                <button class="hidden sm:flex hover:text-gray-700 transition items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
                    </svg>
                    <span>العربية</span>
                </button>

                <!-- Profile Dropdown (hidden on mobile) -->
                <div class="hidden sm:flex relative cursor-pointer group items-center space-x-1 py-1.5">
                    <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Hi, {{ strtok($user->name, ' ') }}</span>
                    <svg class="w-3.5 h-3.5 opacity-70" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                    
                    <!-- Hover Dropdown menu -->
                    <div class="absolute right-0 top-full mt-1 bg-white border border-gray-100 rounded-xl shadow-lg py-2 w-48 hidden group-hover:block transition-all z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">My Profile</a>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Buyer Dashboard</a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-650 hover:bg-red-50">Sign out</button>
                        </form>
                    </div>
                </div>

                <!-- Cart -->
                <a href="{{ route('cart.index') }}" class="flex items-center space-x-1.5 hover:text-gray-700 transition relative">
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg> 
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="absolute -top-1.5 -right-2 bg-red-500 text-white text-[9px] font-bold px-1 py-0.5 rounded-full leading-none min-w-[14px] text-center border border-white">
                                {{ array_reduce(session('cart'), function($carry, $item) { return $carry + $item['quantity']; }, 0) }}
                            </span>
                        @endif
                    </div>
                    <span class="hidden sm:block">Cart</span>
                </a>

                <!-- Mobile hamburger -->
                <button class="sm:hidden p-1 rounded-lg hover:bg-yellow-400 transition" onclick="document.getElementById('orders-mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

        </div>
        <!-- Mobile menu dropdown -->
        <div id="orders-mobile-menu" class="hidden sm:hidden bg-[#FEE000] border-t border-yellow-400 px-4 py-3 space-y-1">
            <a href="{{ route('profile.edit') }}" class="flex items-center px-3 py-2.5 rounded-lg bg-black/5 text-sm font-bold text-gray-900">My Profile</a>
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 rounded-lg bg-black/5 text-sm font-bold text-gray-900">Home</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center px-3 py-2.5 rounded-lg bg-black/5 text-sm font-bold text-red-700 text-left">Sign out</button>
            </form>
        </div>
    </div>

    {{-- ======== MAIN CONTAINER ======== --}}
    <main class="flex-grow max-w-[1400px] w-full mx-auto px-3 sm:px-6 lg:px-8 py-5 sm:py-8">
        
        <!-- Dev simulator utility widget for review -->
        <div class="mb-4 sm:mb-6 bg-[#ebf3fe] border border-blue-200 rounded-xl p-3 sm:p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-sm">
            <div class="flex items-center space-x-3">
                <span class="bg-blue-600 text-white text-xs font-bold px-2 py-0.5 rounded-full uppercase">Simulator</span>
                <p class="text-sm font-semibold text-blue-900">Choose which state to test:</p>
            </div>
            <div class="flex items-center flex-wrap gap-2">
                <button onclick="switchView('empty')" id="btn-view-empty" class="px-3 py-1.5 text-xs font-bold rounded-lg border border-blue-600 bg-blue-600 text-white shadow-sm transition">
                    Empty Orders State
                </button>
                <button onclick="switchView('populated')" id="btn-view-populated" class="px-3 py-1.5 text-xs font-bold rounded-lg border border-blue-600 bg-white text-blue-600 hover:bg-blue-50 transition">
                    Populated Orders List
                </button>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 items-start">
            
            {{-- ================= SIDEBAR (LEFT) ================= --}}
            <aside class="w-full lg:w-[320px] space-y-6 shrink-0">
                
                <!-- PROFILE BOX -->
                <div class="bg-white rounded-2xl p-5 border border-gray-200/80 premium-card">
                    <h3 class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-0.5">Welcome back</h3>
                    <h2 class="text-lg font-bold text-gray-905 flex items-center space-x-1">
                        <span>Hala!</span>
                        <span class="text-gray-500 font-medium text-sm truncate max-w-[190px]" title="{{ $user->email }}">{{ $user->email }}</span>
                    </h2>
                    
                    <!-- Progress Bar -->
                    <div class="mt-4 pt-3 border-t border-gray-100">
                        <div class="flex justify-between items-center text-xs font-bold mb-1.5">
                            <span class="text-gray-500">Profile Completion</span>
                            <span class="bg-[#FEE000] text-gray-900 px-2 py-0.5 rounded-md text-[10px]">20%</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-[#FEE000] h-full rounded-full" style="width: 20%"></div>
                        </div>
                    </div>

                    <!-- Promo Card: Noon One Subscription -->
                    <div class="mt-5 border border-amber-200 rounded-xl p-3.5 bg-gradient-to-r from-amber-50/70 to-yellow-50/50 flex items-center justify-between cursor-pointer hover:shadow-sm transition group">
                        <div class="space-y-1">
                            <div class="flex items-center space-x-1 text-xs">
                                <span class="text-gray-500 font-semibold">Try</span>
                                <span class="font-bold text-black tracking-tight text-sm">emall</span>
                                <span class="bg-[#F57C00] text-white text-[9px] font-black italic px-1.5 py-0.5 rounded-full leading-none">one</span>
                            </div>
                            <p class="text-[11px] text-gray-500 font-medium">Free delivery, exclusive deals, & more!</p>
                        </div>
                        <svg class="w-4 h-4 text-amber-600 transition group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>

                <!-- NAVIGATION LINKS -->
                <nav class="bg-white rounded-2xl border border-gray-200/80 overflow-hidden premium-card">
                    
                    <!-- Group 1 -->
                    <div class="py-2 border-b border-gray-100">
                        <a href="{{ route('orders.index') }}" class="sidebar-item sidebar-item-active flex items-center px-5 py-3 text-sm text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                            </svg>
                            <span>Orders</span>
                        </a>
                        
                        <a href="#" class="sidebar-item flex items-center px-5 py-3 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                            </svg>
                            <span>Returns</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-3 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.559c1.17.744 2.825.465 3.65-.623.824-1.089.476-2.585-.774-3.336L10.35 12.18c-1.25-.75-1.602-2.247-.775-3.336.825-1.088 2.48-1.367 3.65-.623l.879.56M12 2a10 10 0 100 20 10 10 0 000-20z" />
                            </svg>
                            <span>emall Credits</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-3 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                            <span>Wishlist</span>
                        </a>
                    </div>

                    <!-- Group 2: MY ACCOUNT -->
                    <div class="py-2 border-b border-gray-100">
                        <div class="px-5 py-1.5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">My Account</div>
                        
                        <a href="{{ route('profile.edit') }}" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <span>Profile</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            <span>Addresses</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-5.25-12h18A2.25 2.25 0 0 1 22 7.5v9a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 16.5v-9a2.25 2.25 0 0 1 2.25-2.25z" />
                            </svg>
                            <span>Payments</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.249-8.25-3.286z" />
                            </svg>
                            <span>Warranty Claims</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.25-9h16.5" />
                            </svg>
                            <span>Gift Cards</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                            </svg>
                            <span>Digital Cards</span>
                        </a>
                    </div>

                    <!-- Group 3: OTHERS -->
                    <div class="py-2 border-b border-gray-100">
                        <div class="px-5 py-1.5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Others</div>
                        
                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                            </svg>
                            <span>Notifications</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <span>Security Settings</span>
                        </a>

                        <a href="#" class="sidebar-item flex items-center px-5 py-2.5 text-sm text-gray-600 hover:text-gray-900 space-x-3.5">
                            <svg class="w-5 h-5 text-gray-400 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5zM13.5 19.375h.75m-.75-3h.75m3 3h.75m-.75-3h.75m-3-1.5h.75m-3 0h.75m3 0h.75m-3-3h.75m3-3h.75m-7.5 1.5v.008h-.008v-.008h.008zm0 3v.008h-.008v-.008h.008zm3-3v.008h-.008v-.008h.008zm0 3v.008h-.008v-.008h.008zm10.5-3v.008h-.008v-.008h.008zm-3-3v.008h-.008v-.008h.008zm3 3v.008h-.008v-.008h.008z" />
                            </svg>
                            <span>QR Code</span>
                        </a>
                    </div>

                    <!-- Sign out -->
                    <div class="py-2 bg-gray-50/50 hover:bg-red-50/40 transition">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="sidebar-item w-full flex items-center px-5 py-3 text-sm text-gray-700 hover:text-red-700 space-x-3.5">
                                <svg class="w-5 h-5 text-gray-400 hover:text-red-500 fill-none stroke-currentColor stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                </svg>
                                <span class="font-medium">Sign out</span>
                            </button>
                        </form>
                    </div>

                </nav>
            </aside>

            {{-- ================= ORDERS CONTENT AREA (RIGHT) ================= --}}
            <section class="flex-1 w-full space-y-6">
                
                <!-- TOP HEADER BAR -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Orders</h1>
                    
                    <!-- Search + Filter Bar -->
                    <div class="flex items-center gap-3">
                        <!-- Find Items Search Box -->
                        <div class="bg-white rounded-lg border border-gray-200/90 shadow-sm flex items-center px-3 py-1.5 focus-within:ring-2 focus-within:ring-yellow-400 transition w-full sm:w-60">
                            <svg class="h-4 w-4 text-gray-400 mr-2 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1110.5 2.5a7.5 7.5 0 0110.602 10.602z"></path>
                            </svg>
                            <input type="text" id="order-search-input" onkeyup="filterOrders()" placeholder="Find Items" class="w-full bg-transparent border-none focus:ring-0 focus:outline-none p-0 text-xs font-medium text-gray-700 placeholder-gray-400">
                        </div>

                        <!-- Range Dropdown -->
                        <select id="order-filter-range" onchange="filterOrders()" class="bg-white rounded-lg border border-gray-200/90 shadow-sm px-3 py-1.5 text-xs font-semibold text-gray-700 focus:ring-2 focus:ring-yellow-400 outline-none cursor-pointer">
                            <option value="3">Last 3 months</option>
                            <option value="6">Last 6 months</option>
                            <option value="12">Last year</option>
                            <option value="all">All times</option>
                        </select>
                    </div>
                </div>

                {{-- DYNAMIC ORDERS VIEWS CONTAINER --}}
                <div class="space-y-4">
                    
                    {{-- 1. EMPTY ORDERS STATE --}}
                    <div id="view-empty-state" class="bg-white rounded-2xl border border-gray-200/80 p-16 text-center shadow-sm flex flex-col justify-center items-center">
                        <!-- Custom high-fidelity vector representation -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-48 h-48 mx-auto mb-6 text-gray-300" viewBox="0 0 200 200" fill="none">
                            <!-- Open box in background -->
                            <path d="M120 40h30l20 25v15M135 40v40" stroke="#E5E7EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            
                            <!-- Surface line -->
                            <path d="M40 140h120" stroke="#D1D5DB" stroke-width="2" stroke-dasharray="4 4" stroke-linecap="round"/>
                            
                            <!-- Shopping bag body -->
                            <rect x="65" y="65" width="70" height="75" rx="8" stroke="#9CA3AF" stroke-width="3" fill="#F9FAFB"/>
                            
                            <!-- Shopping bag handles -->
                            <path d="M85 65c0-12 7-20 15-20s15 8 15 20" stroke="#9CA3AF" stroke-width="3" stroke-linecap="round"/>
                            
                            <!-- Sad speech cloud / emoji -->
                            <g transform="translate(45, 30)">
                                <!-- Speech Bubble / Cloud -->
                                <path d="M15 45c-8 0-15-7-15-15s7-15 15-15c1-0 2 0 3 0c2-5 7-9 13-9c8 0 14 6 14 14c0 1 0 2 0 3c5 0 9 4 9 9c0 5-4 9-9 9H15z" fill="#FCD34D" stroke="#F59E0B" stroke-width="2"/>
                                
                                <!-- Sad Face eyes -->
                                <circle cx="20" cy="22" r="1.5" fill="#4B5563"/>
                                <circle cx="32" cy="22" r="1.5" fill="#4B5563"/>
                                
                                <!-- Sad Face mouth (arc) -->
                                <path d="M22 32c1.5-2 4.5-2 6 0" stroke="#4B5563" stroke-width="1.8" stroke-linecap="round"/>
                            </g>
                        </svg>

                        <h2 class="text-xl font-bold text-gray-900 mb-1.5">No items found</h2>
                        <p class="text-sm text-gray-400 max-w-md mx-auto">We couldn't find any items that matched your search in the given time period</p>
                    </div>

                    {{-- 2. POPULATED ORDERS LIST --}}
                    <div id="view-populated-state" class="space-y-5 hidden">
                        @foreach($mockOrders as $order)
                            <div class="bg-white rounded-2xl border border-gray-200/85 overflow-hidden premium-card order-card" data-title="{{ strtolower($order['items'][0]['title']) }}">
                                
                                <!-- Card Header -->
                                <div class="bg-gray-50/70 border-b border-gray-100 px-5 py-3.5 flex flex-wrap items-center justify-between gap-4 text-xs font-semibold text-gray-600">
                                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                                        <div>
                                            <span class="text-gray-400 uppercase text-[10px]">Order Number</span>
                                            <p class="text-sm font-bold text-gray-800">{{ $order['order_number'] }}</p>
                                        </div>
                                        <div>
                                            <span class="text-gray-400 uppercase text-[10px]">Placed On</span>
                                            <p class="text-sm font-bold text-gray-800">{{ $order['placed_at'] }}</p>
                                        </div>
                                        <div>
                                            <span class="text-gray-400 uppercase text-[10px]">Total Value</span>
                                            <p class="text-sm font-black text-gray-900">{{ $order['total'] }}</p>
                                        </div>
                                        <div>
                                            <span class="text-gray-400 uppercase text-[10px]">Payment</span>
                                            <p class="text-sm font-medium text-gray-700">{{ $order['payment_method'] }}</p>
                                        </div>
                                    </div>
                                    <span class="bg-[#eef2ff] text-[#4f46e5] text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">
                                        Verified Purchase
                                    </span>
                                </div>

                                <!-- Card Body -->
                                <div class="p-5">
                                    @foreach($order['items'] as $item)
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                                            
                                            <!-- Product Info -->
                                            <div class="flex items-center space-x-4">
                                                <div class="w-20 h-20 bg-white border border-gray-150 rounded-xl overflow-hidden flex items-center justify-center shrink-0 p-1">
                                                    <img src="{{ $item['image_url'] }}" alt="{{ $item['title'] }}" class="max-h-full max-w-full object-contain">
                                                </div>
                                                <div class="space-y-1">
                                                    @if($order['status'] === 'Delivered')
                                                        <div class="inline-flex items-center text-xs font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded border border-green-200 uppercase">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                                            Delivered
                                                        </div>
                                                    @elseif($order['status'] === 'Processing')
                                                        <div class="inline-flex items-center text-xs font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded border border-blue-200 uppercase">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-1.5"></span>
                                                            Processing
                                                        </div>
                                                    @else
                                                        <div class="inline-flex items-center text-xs font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded border border-amber-200 uppercase">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                                                            Returned
                                                        </div>
                                                    @endif

                                                    <h3 class="text-sm font-bold text-gray-900 line-clamp-1 hover:text-blue-600 transition">
                                                        @if($item['product_id'] !== '#')
                                                            <a href="{{ route('products.show', $item['product_id']) }}">{{ $item['title'] }}</a>
                                                        @else
                                                            <a href="#">{{ $item['title'] }}</a>
                                                        @endif
                                                    </h3>
                                                    <p class="text-xs text-gray-500 font-medium">Quantity: {{ $item['qty'] }} &bull; Price: {{ $item['price'] }}</p>
                                                    
                                                    @if($order['delivery_date'])
                                                        <p class="text-[11px] text-gray-400 font-medium">Arrived at destination on {{ $order['delivery_date'] }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Order Actions -->
                                            <div class="flex flex-wrap sm:flex-col gap-2 w-full sm:w-auto text-center shrink-0">
                                                <button class="bg-[#FEE000] hover:bg-yellow-400 text-gray-900 text-xs font-bold py-2 px-5 rounded-lg transition uppercase tracking-wider w-full sm:w-36">
                                                    Buy it Again
                                                </button>
                                                @if($order['status'] === 'Delivered')
                                                    <button class="border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-bold py-2 px-5 rounded-lg transition uppercase tracking-wider w-full sm:w-36">
                                                        Write a Review
                                                    </button>
                                                @else
                                                    <button class="border border-gray-200 hover:bg-gray-50 text-gray-700 text-xs font-bold py-2 px-5 rounded-lg transition uppercase tracking-wider w-full sm:w-36">
                                                        Track Package
                                                    </button>
                                                @endif
                                            </div>

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>

            </section>

        </div>

    </main>

    {{-- ======== FLOATING HELP CHAT BUTTON ======== --}}
    <div class="fixed bottom-6 right-6 z-50">
        <button class="bg-[#FEE000] text-gray-900 font-bold px-4 py-3 rounded-full flex items-center space-x-2 shadow-lg hover:shadow-xl transition-all hover:scale-105">
            <!-- Icon resembling Noon's Need Help -->
            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
            </svg>
            <span class="text-xs uppercase tracking-wider">Need Help?</span>
        </button>
    </div>

    {{-- ======== CUSTOM SLEEK FOOTER ======== --}}
    <footer class="bg-white border-t border-gray-200 mt-auto py-8">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs font-semibold text-gray-500">
            <div>
                &copy; 2026 emall. All rights reserved.
            </div>
            <div class="flex flex-wrap justify-center gap-x-6 gap-y-2">
                <a href="#" class="hover:text-gray-900 transition">Customer Happiness Center</a>
                <a href="#" class="hover:text-gray-900 transition">Warranty policy</a>
                <a href="#" class="hover:text-gray-900 transition">Return policy</a>
                <a href="#" class="hover:text-gray-900 transition">Terms of use</a>
                <a href="#" class="hover:text-gray-900 transition">Terms of sale</a>
                <a href="#" class="hover:text-gray-900 transition">Privacy policy</a>
            </div>
        </div>
    </footer>

    <script>
        // Switch between empty state simulation and populated list simulation
        function switchView(viewType) {
            const emptyState = document.getElementById('view-empty-state');
            const populatedState = document.getElementById('view-populated-state');
            
            const btnEmpty = document.getElementById('btn-view-empty');
            const btnPopulated = document.getElementById('btn-view-populated');

            if (viewType === 'empty') {
                emptyState.classList.remove('hidden');
                populatedState.classList.add('hidden');

                btnEmpty.className = "px-4 py-1.5 text-xs font-bold rounded-lg border border-blue-600 bg-blue-600 text-white shadow-sm transition";
                btnPopulated.className = "px-4 py-1.5 text-xs font-bold rounded-lg border border-blue-600 bg-white text-blue-600 hover:bg-blue-50 transition";
            } else {
                emptyState.classList.add('hidden');
                populatedState.classList.remove('hidden');

                btnEmpty.className = "px-4 py-1.5 text-xs font-bold rounded-lg border border-blue-600 bg-white text-blue-600 hover:bg-blue-50 transition";
                btnPopulated.className = "px-4 py-1.5 text-xs font-bold rounded-lg border border-blue-600 bg-blue-600 text-white shadow-sm transition";
            }
        }

        // Live filter matching search term
        function filterOrders() {
            const query = document.getElementById('order-search-input').value.toLowerCase().trim();
            const orderCards = document.querySelectorAll('.order-card');
            const emptyState = document.getElementById('view-empty-state');
            const populatedState = document.getElementById('view-populated-state');
            
            // Check if we are currently displaying populated or empty
            const isPopulatedActive = !populatedState.classList.contains('hidden');
            if (!isPopulatedActive && query !== '') {
                // Auto switch to populated if they start searching so they can see filtering
                switchView('populated');
            }

            let visibleCount = 0;
            orderCards.forEach(card => {
                const title = card.getAttribute('data-title');
                if (title.includes(query)) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            // If query doesn't match anything, show the empty state inside the populated container
            if (visibleCount === 0 && query !== '') {
                emptyState.classList.remove('hidden');
                populatedState.classList.add('hidden');
            } else if (visibleCount > 0 && query !== '') {
                emptyState.classList.add('hidden');
                populatedState.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
