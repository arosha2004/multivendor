<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }} – emall</title>
    <meta name="description" content="{{ Str::limit($product->description, 160) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background: #f5f5f5; }

        /* ---- Thumbnail strip ---- */
        .thumb-strip { scrollbar-width: thin; scrollbar-color: #d1d5db transparent; }
        .thumb-strip::-webkit-scrollbar { height: 4px; }
        .thumb-strip::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 2px; }

        .thumb-btn {
            transition: all .18s ease;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background: #fff;
            flex-shrink: 0;
            width: 110px;
            height: 110px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
        }
        .thumb-btn:hover  { border-color: #9ca3af; box-shadow: 0 2px 8px rgba(0,0,0,.12); }
        .thumb-btn.active { border-color: #243BB9; box-shadow: 0 0 0 3px rgba(36,59,185,.12); }
        .thumb-btn img    { max-width: 90%; max-height: 90%; object-fit: contain; transition: transform .3s ease; }
        .thumb-btn:hover img { transform: scale(1.06); }

        /* ---- Main image ---- */
        #main-image { transition: opacity .22s ease; }
        #main-image-wrap {
            position: relative;
            width: 100%;
            min-height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            cursor: zoom-in;
            background: #fff;
        }
        #main-image-wrap img { transition: transform .4s ease; max-height: 480px; max-width: 100%; object-fit: contain; }
        #main-image-wrap:hover img { transform: scale(1.05); }

        /* Delivery badge */
        .badge-supermall {
            background: linear-gradient(135deg, #243BB9 0%, #3B52D4 100%);
            color: white; font-weight: 800; font-size: 11px;
            letter-spacing: .06em; padding: 3px 8px; border-radius: 4px;
        }
        .badge-express {
            background: #F59E0B; color: #000; font-weight: 800;
            font-size: 11px; padding: 3px 8px; border-radius: 4px;
        }

        /* Add to cart button */
        .btn-cart { background: #243BB9; transition: background .2s, transform .1s; }
        .btn-cart:hover  { background: #1C2D9A; }
        .btn-cart:active { transform: scale(.98); }

        /* Vendor card */
        .vendor-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 10px; }

        /* Breadcrumb link */
        .breadcrumb-link { color: #243BB9; font-size: 13px; }
        .breadcrumb-link:hover { text-decoration: underline; }

        /* Description prose */
        .description-body { line-height: 1.75; color: #374151; font-size: 14px; white-space: pre-wrap; }
    </style>
</head>
<body>

    {{-- ======== YELLOW NAVBAR ======== --}}
    <div class="bg-[#FEE000] py-4 px-4 sm:px-6 flex items-center justify-between shadow-sm" style="background-color:#FEE000;">
        <div class="flex items-center space-x-6 shrink-0">
            <a href="{{ route('dashboard') }}" class="text-3xl font-extrabold tracking-tighter text-black lowercase leading-none">emall</a>
            <div class="hidden md:flex items-center text-sm font-semibold text-gray-900 cursor-pointer">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Other • LK
                <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
        </div>

        {{-- Search --}}
        <div class="flex-1 max-w-4xl mx-4 lg:mx-8">
            <div class="w-full bg-white rounded-full flex items-center px-5 py-2.5 shadow-sm border border-transparent">
                <svg class="h-5 w-5 text-slate-900 mr-3 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="What are you looking for?" class="w-full bg-transparent border-none focus:ring-0 focus:outline-none p-0 text-gray-900 placeholder-[#5A738E] text-[15px] font-normal">
            </div>
        </div>

        {{-- Right Nav --}}
        <div class="hidden lg:flex items-center space-x-6 text-sm font-bold text-black shrink-0">
            @guest
                <a href="{{ route('login') }}" class="flex items-center space-x-1 hover:text-gray-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Log in</span>
                </a>
            @else
                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-1 hover:text-gray-700 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="truncate max-w-[150px]">{{ Auth::user()->name }}</span>
                </a>
            @endguest
            <a href="{{ route('orders.index') }}" class="flex items-center space-x-1 border-l border-black/10 pl-6 hover:text-gray-700 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg> 
                <span>Orders</span>
            </a>
            <div class="flex items-center space-x-1 border-l border-black/10 pl-6 cursor-pointer hover:text-gray-700 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span>Cart</span>
            </div>
            @auth
            <form method="POST" action="{{ route('logout') }}" class="inline border-l border-black/10 pl-6">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800 font-bold transition">Log out</button>
            </form>
            @endauth
        </div>
    </div>

    {{-- ======== CATEGORY BAR ======== --}}
    <div class="bg-white border-b border-gray-200 overflow-x-auto whitespace-nowrap px-6 flex items-center space-x-6 text-sm font-semibold text-gray-800 py-3">
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Electronics</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Beauty & Fragrance</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Home & Kitchen</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Grocery</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Men's Fashion</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Women's Fashion</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Baby</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Toys</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Kids' Fashion</a>
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition">Sports & Outdoors</a>
    </div>

    {{-- ======== MAIN CONTENT ======== --}}
    <div class="max-w-[1280px] mx-auto px-4 py-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center space-x-1.5 text-xs text-gray-500 mb-5">
            <a href="{{ route('dashboard') }}" class="breadcrumb-link">Home</a>
            <span>/</span>
            <a href="{{ route('dashboard') }}" class="breadcrumb-link">{{ $product->category }}</a>
            <span>/</span>
            <span class="text-gray-700 font-medium truncate max-w-[300px]">{{ $product->title }}</span>
        </nav>

        {{-- Product Layout: 3 columns --}}
        <div class="flex flex-col lg:flex-row gap-6">

            {{-- ===== LEFT: Image Gallery ===== --}}
            @php
                $allImages = array_merge([$product->image_path], $product->images ?? []);
            @endphp
            <div class="lg:w-[460px] shrink-0">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm sticky top-4" style="padding: 24px 24px 20px;">

                    {{-- Wishlist + Best Seller overlay --}}
                    <div class="relative">

                        {{-- Main image area --}}
                        <div id="main-image-wrap" class="rounded-xl mb-5">
                            <img id="main-image"
                                 src="{{ asset('storage/' . $product->image_path) }}"
                                 alt="{{ $product->title }}">

                            {{-- Wishlist Button (top-right overlay) --}}
                            <button id="wishlist-btn" onclick="toggleWishlist(this)"
                                class="absolute top-3 right-3 bg-white border border-gray-200 rounded-full p-2.5 shadow-md hover:border-red-400 transition-all z-10">
                                <svg id="wishlist-icon" class="w-5 h-5" fill="none" stroke="#9ca3af" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>

                            @if($product->is_best_seller)
                            <div class="absolute top-3 left-3 bg-[#0E7153] text-white text-[10px] font-bold px-2.5 py-1 rounded-md uppercase shadow z-10">
                                Best Seller
                            </div>
                            @endif
                        </div>

                        {{-- Thumbnail strip --}}
                        <div class="thumb-strip flex items-center gap-3 overflow-x-auto pb-1">
                            @foreach($allImages as $idx => $img)
                            <button onclick="switchImage(this, '{{ asset('storage/' . $img) }}')"
                                    class="thumb-btn {{ $idx === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $img) }}" alt="View {{ $idx + 1 }}">
                            </button>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            {{-- ===== MIDDLE: Product Info ===== --}}
            <div class="flex-1 min-w-0">
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">

                    {{-- Category & Title --}}
                    <div class="flex items-center space-x-1 text-sm font-semibold text-[#243BB9] mb-2">
                        <span>{{ $product->category }}</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                    <h1 class="text-[22px] font-bold text-gray-900 leading-snug mb-3">{{ $product->title }}</h1>

                    {{-- Rating --}}
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="text-lg font-bold text-[#1FA628]">{{ $product->rating }}</span>
                        <div class="flex items-center space-x-0.5">
                            @php $fullStars = floor($product->rating); $halfStar = ($product->rating - $fullStars) >= 0.5; @endphp
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $fullStars)
                                    <svg class="w-4 h-4 text-[#1FA628] fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @elseif($halfStar && $i == $fullStars + 1)
                                    <svg class="w-4 h-4 text-[#1FA628]" viewBox="0 0 20 20">
                                        <defs><linearGradient id="half{{ $product->id }}"><stop offset="50%" stop-color="#1FA628"/><stop offset="50%" stop-color="#D1D5DB"/></linearGradient></defs>
                                        <path fill="url(#half{{ $product->id }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endif
                            @endfor
                        </div>
                        <a href="#reviews" class="text-sm text-[#243BB9] hover:underline font-medium">
                            {{ $product->reviews_count > 1000 ? round($product->reviews_count/1000, 1).'K' : $product->reviews_count }} Ratings
                        </a>
                    </div>

                    {{-- Price --}}
                    <div class="flex items-baseline space-x-3 mb-1">
                        <span class="text-sm font-semibold text-gray-500">AED</span>
                        <span class="text-4xl font-extrabold text-gray-900">{{ number_format($product->price, 2) }}</span>
                        @if($product->original_price && $product->original_price > $product->price)
                            @php $disc = round((($product->original_price - $product->price) / $product->original_price) * 100); @endphp
                            <span class="text-base text-gray-400 line-through">AED {{ number_format($product->original_price, 2) }}</span>
                            <span class="text-base font-bold text-[#E62E2E]">{{ $disc }}% Off</span>
                            <span class="flex items-center text-xs font-bold text-[#E62E2E] bg-red-50 px-2 py-0.5 rounded-full border border-red-200">
                                🔥 Selling out fast
                            </span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-400 mb-5">Inclusive of VAT</p>

                    {{-- Dynamic Features --}}
                    @if(!empty($product->features) && is_array($product->features))
                        <div class="mb-5 space-y-4 border-t border-gray-100 pt-5">
                            @foreach($product->features as $fIndex => $feature)
                                <div>
                                    <h3 class="text-[11px] font-bold uppercase tracking-wider text-gray-500 mb-2.5 flex items-center">
                                        {{ $feature['name'] }}
                                        @if(strtoupper($feature['name']) === 'VERSION')
                                            <svg class="w-3.5 h-3.5 ml-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        @endif
                                    </h3>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($feature['options'] as $oIndex => $option)
                                            <button type="button" 
                                                    onclick="selectFeatureOption(this, 'feature-{{ $fIndex }}')"
                                                    class="feature-option feature-{{ $fIndex }} px-4 py-2 border {{ $oIndex === 0 ? 'border-gray-900 border-[1.5px]' : 'border-gray-200' }} rounded-lg text-sm font-semibold text-gray-800 hover:border-gray-400 transition bg-white focus:outline-none">
                                                {{ $option }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Delivery --}}
                    <div class="border border-gray-100 rounded-lg p-4 mb-5 bg-gray-50">
                        <p class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-3">Delivery Information</p>
                        <div class="flex items-center space-x-3 mb-3">
                            <span class="badge-supermall">⚡ SUPERMALL</span>
                            <span class="text-sm font-semibold">GET IN <span class="text-[#243BB9] font-black">39 MINS</span></span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-500 mt-2 border-t border-gray-200 pt-3">
                            <span class="text-gray-400 text-xs">or</span>
                        </div>
                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center space-x-3">
                                <span class="badge-express">express</span>
                                <span class="text-sm font-medium text-gray-700">Get it by <strong>Tomorrow</strong></span>
                            </div>
                            <span class="text-sm font-semibold text-gray-800">AED {{ number_format($product->price, 2) }} ↗</span>
                        </div>
                    </div>

                    {{-- Description --}}
                    @if($product->description)
                    <div class="mb-6">
                        <h2 class="text-sm font-bold uppercase tracking-wider text-gray-500 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-1.5 text-[#243BB9]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Product Description
                        </h2>
                        <div class="description-body bg-gray-50 rounded-lg p-4 border border-gray-100 text-gray-700">{{ $product->description }}</div>
                    </div>
                    @endif

                    {{-- Trust Badges --}}
                    <div class="flex flex-wrap gap-3 mb-5">
                        <div class="flex items-center space-x-1.5 text-xs text-gray-600 bg-gray-50 px-3 py-2 rounded-lg border border-gray-100">
                            <svg class="w-4 h-4 text-[#1FA628]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <span>Secure Payments</span>
                        </div>
                        <div class="flex items-center space-x-1.5 text-xs text-gray-600 bg-gray-50 px-3 py-2 rounded-lg border border-gray-100">
                            <svg class="w-4 h-4 text-[#243BB9]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            <span>Easy Returns</span>
                        </div>
                        <div class="flex items-center space-x-1.5 text-xs text-gray-600 bg-gray-50 px-3 py-2 rounded-lg border border-gray-100">
                            <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                            <span>1 Year Warranty</span>
                        </div>
                    </div>

                </div>
            </div>

            {{-- ===== RIGHT: Vendor + Actions ===== --}}
            <div class="lg:w-[280px] shrink-0 space-y-4">

                {{-- Vendor Card --}}
                <div class="vendor-card p-4">
                    @if($product->vendor)
                    <a href="{{ route('vendor.store', $product->vendor->id) }}" class="flex items-center space-x-3 mb-3 hover:bg-gray-50 rounded-lg p-1 -m-1 transition cursor-pointer">
                    @else
                    <div class="flex items-center space-x-3 mb-3">
                    @endif
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center text-white font-black text-lg shadow">
                            {{ strtoupper(substr($product->vendor->name ?? 'V', 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Sold by</p>
                            <p class="text-sm font-bold text-[#243BB9]">{{ $product->vendor->name ?? 'Marketplace Seller' }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    @if($product->vendor)
                    </a>
                    @else
                    </div>
                    @endif
                    <div class="flex items-center space-x-1 mb-3">
                        <svg class="w-4 h-4 text-[#1FA628] fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <span class="text-sm font-bold text-gray-800">4.9</span>
                        <span class="text-xs text-gray-500">87% Positive</span>
                    </div>
                    <div class="text-xs space-y-1.5 border-t border-gray-100 pt-3">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Item as shown</span>
                            <span class="font-semibold text-gray-800">90%</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Partner since</span>
                            <span class="font-semibold text-gray-800">{{ $product->created_at->format('Y') }}</span>
                        </div>
                    </div>
                    <p class="text-xs text-[#1FA628] font-semibold mt-2">Great recent rating</p>
                    <button class="mt-3 w-full text-xs border border-gray-200 rounded-md py-1.5 text-gray-700 hover:bg-gray-50 transition flex items-center justify-center font-medium">
                        More offers from other sellers
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>

                {{-- Add to Cart + Buy Now --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 space-y-3">
                    <div class="flex items-center justify-between text-sm mb-1">
                        <span class="text-gray-500">In Stock</span>
                        <span class="text-[#1FA628] font-semibold flex items-center">
                            <span class="w-2 h-2 rounded-full bg-[#1FA628] inline-block mr-1"></span> Available
                        </span>
                    </div>

                    {{-- Quantity selector --}}
                    <div class="flex items-center space-x-3">
                        <span class="text-sm text-gray-600 font-medium">Qty:</span>
                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                            <button onclick="changeQty(-1)" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 transition font-bold text-lg leading-none">−</button>
                            <span id="qty-display" class="w-10 text-center text-sm font-semibold">1</span>
                            <button onclick="changeQty(1)" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-100 transition font-bold text-lg leading-none">+</button>
                        </div>
                    </div>

                    <button class="btn-cart w-full text-white font-bold py-3 rounded-xl text-sm tracking-wide shadow-md">
                        🛒 ADD TO CART
                    </button>
                    <button class="w-full border-2 border-[#243BB9] text-[#243BB9] font-bold py-3 rounded-xl text-sm hover:bg-blue-50 transition">
                        ⚡ BUY NOW
                    </button>
                </div>

                {{-- Guarantees --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 space-y-2.5">
                    <div class="flex items-center space-x-2.5 text-xs text-gray-700">
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>1 year warranty</span>
                    </div>
                    <div class="flex items-center space-x-2.5 text-xs text-gray-700">
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        <span>Easy and Hassle Free Returns</span>
                    </div>
                    <div class="flex items-center space-x-2.5 text-xs text-gray-700">
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <span>Secure Payments</span>
                    </div>
                </div>

                {{-- Back button --}}
                <a href="{{ route('dashboard') }}"
                   class="block w-full text-center text-sm font-semibold text-gray-600 border border-gray-200 rounded-xl py-2.5 hover:bg-gray-50 transition">
                    ← Back to Products
                </a>
            </div>
        </div>

        {{-- ======== ADDITIONAL IMAGES (Full width gallery) ======== --}}
        @if(!empty($product->images) && count($product->images) > 0)
        <div class="mt-8 bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-[#243BB9]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                More Product Images
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                @foreach($product->images as $img)
                <div class="aspect-square rounded-lg border border-gray-100 overflow-hidden bg-gray-50 flex items-center justify-center cursor-pointer hover:shadow-md hover:border-[#243BB9] transition-all duration-200 group"
                     onclick="scrollToMainAndSwitch('{{ asset('storage/' . $img) }}')">
                    <img src="{{ asset('storage/' . $img) }}" alt="Product image" class="max-w-full max-h-full object-contain p-2 group-hover:scale-105 transition-transform duration-300">
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- ======== REVIEWS PLACEHOLDER ======== --}}
        <div id="reviews" class="mt-8 bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-[#1FA628]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                Ratings & Reviews
                <span class="ml-2 text-sm font-normal text-gray-400">({{ $product->reviews_count > 1000 ? round($product->reviews_count/1000, 1).'K' : $product->reviews_count }} ratings)</span>
            </h2>
            <div class="flex items-center space-x-6">
                <div class="text-center">
                    <div class="text-5xl font-black text-gray-900">{{ $product->rating }}</div>
                    <div class="flex justify-center mt-1 space-x-0.5">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= floor($product->rating) ? 'text-[#1FA628]' : 'text-gray-200' }} fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-xs text-gray-400 mt-1">out of 5</p>
                </div>
                <div class="flex-1 space-y-1.5">
                    @foreach([5,4,3,2,1] as $star)
                    @php $pct = $star === 5 ? 68 : ($star === 4 ? 20 : ($star === 3 ? 7 : ($star === 2 ? 3 : 2))); @endphp
                    <div class="flex items-center space-x-2 text-xs">
                        <span class="w-4 text-right text-gray-600 font-medium">{{ $star }}</span>
                        <svg class="w-3 h-3 text-[#1FA628] fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <div class="flex-1 bg-gray-100 rounded-full h-2">
                            <div class="bg-[#1FA628] h-2 rounded-full" style="width:{{ $pct }}%"></div>
                        </div>
                        <span class="w-8 text-gray-500">{{ $pct }}%</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>{{-- end max-w --}}

    <div class="h-12"></div>

    <script>
        // Switch main image on thumbnail click
        function switchImage(btn, src) {
            const img = document.getElementById('main-image');
            img.style.opacity = '0';
            setTimeout(() => {
                img.src = src;
                img.style.opacity = '1';
            }, 200);
            document.querySelectorAll('.thumb-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        }

        // Scroll to top and switch image (from bottom gallery)
        function scrollToMainAndSwitch(src) {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            setTimeout(() => {
                const img = document.getElementById('main-image');
                img.style.opacity = '0';
                setTimeout(() => {
                    img.src = src;
                    img.style.opacity = '1';
                }, 200);
            }, 400);
        }

        // Quantity controls
        let qty = 1;
        function changeQty(delta) {
            qty = Math.max(1, qty + delta);
            document.getElementById('qty-display').textContent = qty;
        }

        // Wishlist toggle
        function toggleWishlist(btn) {
            const icon = document.getElementById('wishlist-icon');
            const isActive = icon.style.fill === 'rgb(239, 68, 68)';
            icon.style.fill = isActive ? 'none' : 'rgb(239, 68, 68)';
            icon.style.stroke = isActive ? 'currentColor' : 'rgb(239, 68, 68)';
            btn.classList.toggle('border-red-400', !isActive);
        }

        // Feature selection logic
        function selectFeatureOption(btn, groupClass) {
            document.querySelectorAll('.' + groupClass).forEach(el => {
                el.classList.remove('border-gray-900', 'border-[1.5px]');
                el.classList.add('border-gray-200');
            });
            btn.classList.remove('border-gray-200');
            btn.classList.add('border-gray-900', 'border-[1.5px]');
        }
    </script>
</body>
</html>
