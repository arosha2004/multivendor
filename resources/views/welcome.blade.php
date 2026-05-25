<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moon | Start Selling Today</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans antialiased overflow-x-hidden selection:bg-[var(--color-primary)] selection:text-black">

    <!-- Navigation Bar -->
    <nav class="fixed w-full z-50 transition-all duration-300 py-4 px-6 md:px-12 flex justify-between items-center backdrop-blur-md bg-black/60 border-b border-white/10">
        <div class="flex items-center gap-2">
            <!-- Moon Logo -->
            <div class="text-[var(--color-primary)] font-bold text-3xl tracking-tight flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-8 h-8 mr-1">
                    <path d="M12 3a9 9 0 1 0 9 9c0-.46-.04-.92-.1-1.36a5.389 5.389 0 0 1-4.4 2.26 5.403 5.403 0 0 1-3.14-9.8c-.44-.06-.9-.1-1.36-.1z"/>
                </svg>
                moon
            </div>
        </div>
        <div class="hidden md:flex space-x-8 text-sm font-medium text-gray-300">
            <a href="#" class="hover:text-[var(--color-primary)] transition-colors">Home</a>
            <a href="#" class="hover:text-[var(--color-primary)] transition-colors">Selling Modes</a>
            <a href="#" class="hover:text-[var(--color-primary)] transition-colors">Shipping & Fulfillment</a>
            <a href="#" class="hover:text-[var(--color-primary)] transition-colors">Grow Smarter</a>
        </div>
        <div class="flex items-center space-x-4">
            <button class="text-sm font-medium hover:text-[var(--color-primary)] transition-colors flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                English
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 md:pt-48 md:pb-32 px-6 md:px-12 max-w-7xl mx-auto overflow-hidden">
        <!-- Background Glow -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[var(--color-primary)]/20 rounded-full blur-[120px] -z-10"></div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6 z-10">
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight">
                    Start selling on <br> <span class="text-[var(--color-primary)]">moon</span> today!
                </h1>
                <p class="text-xl text-gray-400 max-w-md">
                    Join the region's fastest-growing e-commerce platform and take your business to the next level.
                </p>
                <button class="bg-[var(--color-primary)] hover:bg-[var(--color-primary-dark)] text-black font-bold py-3 px-8 rounded-full transition-transform hover:scale-105 active:scale-95 flex items-center gap-2 mt-4 shadow-[0_0_20px_rgba(255,234,0,0.3)]">
                    Start Selling Now
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
            <div class="relative z-10 flex justify-end">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-black/50 border border-white/10 group">
                    <img src="{{ asset('images/hero_seller.png') }}" alt="Successful Seller" class="w-full max-w-lg object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Join Us? -->
    <section class="py-20 px-6 md:px-12 max-w-7xl mx-auto border-t border-white/5">
        <h2 class="text-3xl font-bold mb-10 text-center md:text-left">Why Join Us?</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-[var(--color-brand-gray)] rounded-xl p-8 border border-white/5 hover:border-[var(--color-primary)]/50 transition-colors group">
                <div class="w-12 h-12 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-[var(--color-primary)]">Reach Millions</h3>
                <p class="text-sm text-gray-400">Unlock access to a massive customer base across the region and grow your brand visibility exponentially.</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-[var(--color-brand-gray)] rounded-xl p-8 border border-white/5 hover:border-[var(--color-primary)]/50 transition-colors group relative overflow-hidden">
                <img src="{{ asset('images/warehouse_delivery.png') }}" alt="Delivery" class="absolute inset-0 w-full h-full object-cover opacity-20 mix-blend-overlay group-hover:opacity-40 transition-opacity">
                <div class="relative z-10">
                    <div class="w-12 h-12 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-[var(--color-primary)]">Fast, Flexible Delivery</h3>
                    <p class="text-sm text-gray-400">Rely on our state-of-the-art logistics network to deliver your products swiftly and reliably to your customers.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-[var(--color-brand-gray)] rounded-xl p-8 border border-white/5 hover:border-[var(--color-primary)]/50 transition-colors group">
                <div class="w-12 h-12 rounded-full bg-[var(--color-primary)]/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-[var(--color-primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-[var(--color-primary)]">Grow Fast, Earn More</h3>
                <p class="text-sm text-gray-400">Benefit from our competitive fees, transparent payout structures, and dedicated seller support to maximize your profits.</p>
            </div>
        </div>
    </section>

    <!-- Getting Started -->
    <section class="py-20 px-6 md:px-12 max-w-7xl mx-auto border-t border-white/5">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-[var(--color-primary)] font-bold mb-2">Getting Started</h2>
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Ready to start selling?</h3>
                <p class="text-gray-400 mb-8">It's quick and easy — here's what you'll need.</p>
                
                <!-- Checklist -->
                <div class="bg-[var(--color-brand-gray)] rounded-xl p-8 border border-white/10">
                    <h4 class="font-bold text-lg mb-6">Seller Setup Checklist:</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-sm text-gray-300">
                            <svg class="w-5 h-5 text-[var(--color-primary)] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Email address and phone number
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-300">
                            <svg class="w-5 h-5 text-[var(--color-primary)] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Commercial Registration or Trade License
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-300">
                            <svg class="w-5 h-5 text-[var(--color-primary)] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Bank details / ID / Passport / Visa details
                        </li>
                    </ul>
                    <button class="mt-8 bg-transparent border-2 border-[var(--color-primary)] text-[var(--color-primary)] font-bold py-2 px-6 rounded-full hover:bg-[var(--color-primary)] hover:text-black transition-colors w-full md:w-auto">
                        View Detailed FAQs
                    </button>
                </div>
            </div>
            
            <div class="relative h-[500px] rounded-2xl overflow-hidden border border-white/10 bg-[var(--color-brand-gray)] shadow-[0_0_30px_rgba(255,234,0,0.1)]">
                <img src="{{ asset('images/warehouse_delivery.png') }}" alt="Warehouse Operations" class="absolute inset-0 w-full h-full object-cover opacity-80 mix-blend-luminosity">
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-transparent flex flex-col justify-center p-10">
                    <h4 class="text-2xl font-bold text-[var(--color-primary)] mb-6">Simple Steps to Success:</h4>
                    <ol class="space-y-6 relative border-l-2 border-[var(--color-primary)]/30 ml-3">
                        <li class="pl-8 relative">
                            <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-[var(--color-primary)] ring-4 ring-black"></div>
                            <span class="block text-sm font-bold text-gray-300">Step 1: Create your account</span>
                        </li>
                        <li class="pl-8 relative">
                            <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-[var(--color-primary)] ring-4 ring-black"></div>
                            <span class="block text-sm font-bold text-gray-300">Step 2: List your products</span>
                        </li>
                        <li class="pl-8 relative">
                            <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-[var(--color-primary)] ring-4 ring-black"></div>
                            <span class="block text-sm font-bold text-gray-300">Step 3: Choose your fulfillment model</span>
                        </li>
                        <li class="pl-8 relative">
                            <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-[var(--color-primary)] ring-4 ring-black"></div>
                            <span class="block text-sm font-bold text-[var(--color-primary)]">And that's it! Your first customer order is just a click away.</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotional Banner -->
    <section class="py-10 px-6 md:px-12 max-w-7xl mx-auto">
        <div class="rounded-2xl bg-gradient-to-r from-orange-400 via-pink-500 to-purple-600 p-[2px]">
            <div class="bg-black rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-[80px]"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-bold bg-white/20 px-2 py-1 rounded text-white tracking-wider">NEW</span>
                        <span class="text-[var(--color-primary)] font-bold flex items-center text-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4 mr-1"><path d="M12 3a9 9 0 1 0 9 9c0-.46-.04-.92-.1-1.36a5.389 5.389 0 0 1-4.4 2.26 5.403 5.403 0 0 1-3.14-9.8c-.44-.06-.9-.1-1.36-.1z"/></svg> moon</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-400 mb-2">Global Traders Program</h3>
                    <p class="text-gray-400 max-w-md text-sm">Expand your reach internationally with zero hidden fees for your first 3 months.</p>
                </div>
                <button class="relative z-10 bg-white text-black font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition-colors shrink-0">
                    Discover More
                </button>
            </div>
        </div>
    </section>

    <!-- Shipping and Fulfillment -->
    <section class="py-20 px-6 md:px-12 max-w-7xl mx-auto border-t border-white/5">
        <div class="bg-[var(--color-brand-gray)] rounded-2xl overflow-hidden border border-white/10 flex flex-col md:flex-row">
            <div class="md:w-1/2 p-10 md:p-16 flex flex-col justify-center">
                <h2 class="text-3xl font-bold mb-4 text-[var(--color-primary)]">Shipping and Fulfillment</h2>
                <h3 class="text-xl font-bold mb-6">Flexible fulfillment options that work for you</h3>
                <p class="text-gray-400 mb-8 text-sm">We handle the logistics so you can focus on scaling your business with absolute confidence.</p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[var(--color-primary)] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span class="font-medium">Fulfilled by Moon — Built for speed</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[var(--color-primary)] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span class="font-medium">Fulfilled by Partner — Built for flexibility</span>
                    </li>
                </ul>
                <a href="#" class="text-[var(--color-primary)] hover:underline font-bold text-sm flex items-center gap-1">
                    Learn more <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
            <div class="md:w-1/2 relative min-h-[300px]">
                <img src="{{ asset('images/warehouse_delivery.png') }}" alt="Warehouse" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-[var(--color-brand-gray)] to-transparent md:to-transparent"></div>
            </div>
        </div>
    </section>

    <!-- Grow Smarter -->
    <section class="py-20 px-6 md:px-12 max-w-7xl mx-auto">
        <h2 class="text-[var(--color-primary)] font-bold mb-2">Grow Smarter</h2>
        <h3 class="text-3xl font-bold mb-10">Everything you need to scale and stay ahead</h3>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-[var(--color-brand-gray)] rounded-xl p-8 border border-white/5 hover:-translate-y-2 transition-transform duration-300">
                <h4 class="text-xl font-bold text-white mb-3">Ads that drive results</h4>
                <p class="text-sm text-gray-400">Amplify your sales and increase visibility with targeted product ads and promotional campaigns.</p>
            </div>
            <div class="bg-[var(--color-brand-gray)] rounded-xl p-8 border border-white/5 hover:-translate-y-2 transition-transform duration-300">
                <h4 class="text-xl font-bold text-white mb-3">Know your costs</h4>
                <p class="text-sm text-gray-400">Our transparent fee calculator ensures you always know your profit margins before you list an item.</p>
            </div>
            <div class="bg-[var(--color-brand-gray)] rounded-xl p-8 border border-white/5 hover:-translate-y-2 transition-transform duration-300">
                <h4 class="text-xl font-bold text-white mb-3">Scale with insights</h4>
                <p class="text-sm text-gray-400">Leverage our powerful analytics dashboard to identify trending products and optimize your inventory.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 px-6 md:px-12 max-w-7xl mx-auto border-t border-white/5">
        <h2 class="text-3xl font-bold mb-10 text-center md:text-left">Testimonials</h2>
        
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Featured Testimonial Video Style -->
            <div class="relative rounded-2xl overflow-hidden aspect-video border border-white/10 group cursor-pointer shadow-2xl">
                <img src="{{ asset('images/seller_portrait.png') }}" alt="Seller Video Thumbnail" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors flex items-center justify-center">
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black to-transparent">
                    <p class="font-bold text-lg">How TechHub scaled their moon store</p>
                </div>
            </div>

            <!-- Text Testimonial -->
            <div class="flex flex-col justify-center bg-[var(--color-brand-gray)] rounded-2xl p-10 border border-white/10 relative overflow-hidden">
                <div class="absolute -right-6 -top-6 text-9xl text-white/5 font-serif leading-none">"</div>
                <div class="text-[var(--color-primary)] flex gap-1 mb-6">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <h3 class="text-xl md:text-2xl font-bold mb-4">"TechHub chose moon's Fulfilled by Partner model — and became the region's #1 electronics seller."</h3>
                <p class="text-gray-400 text-sm mb-8">Because moon delivers on speed, reliability, and support, we've transformed the scale of our local business.</p>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/seller_portrait.png') }}" alt="Ahmed" class="w-12 h-12 rounded-full object-cover border-2 border-[var(--color-primary)]">
                    <div>
                        <p class="font-bold text-sm">Ahmed Al-Sayed</p>
                        <p class="text-xs text-[var(--color-primary)]">Founder, TechHub</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer CTA -->
    <footer class="bg-[var(--color-primary)] text-black py-20 relative overflow-hidden">
        <!-- Abstract Shapes -->
        <div class="absolute right-0 top-0 w-1/2 h-full bg-black/5 blur-3xl rounded-full transform translate-x-1/4 -translate-y-1/4 pointer-events-none"></div>
        <div class="max-w-4xl mx-auto text-center px-6 relative z-10">
            <h2 class="text-sm font-bold tracking-widest uppercase mb-4 opacity-80">Join the Community</h2>
            <h3 class="text-4xl md:text-5xl font-extrabold mb-8 tracking-tight">Ready to Sell?</h3>
            <p class="text-black/80 font-medium mb-10 max-w-xl mx-auto">Start your ecommerce journey today and tap into millions of active buyers right away.</p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <button class="bg-black text-white hover:bg-gray-800 font-bold py-4 px-10 rounded-full transition-all hover:scale-105 active:scale-95 shadow-xl w-full sm:w-auto">
                    Register Now &rarr;
                </button>
                <button class="bg-transparent border-2 border-black text-black hover:bg-black/10 font-bold py-4 px-10 rounded-full transition-all w-full sm:w-auto">
                    Contact Sales
                </button>
            </div>
        </div>
    </footer>

</body>
</html>
