<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noon | Start Selling Today</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; background-color: #0b0b0b; color: #ffffff; }
        .noon-yellow { color: #feee00; }
        .bg-noon-yellow { background-color: #feee00; }
        .bg-noon-gray { background-color: #1a1a1a; }
        .card-overlay { background: linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.1) 100%); }
    </style>
</head>
<body class="antialiased overflow-x-hidden">

    <!-- Navigation Bar -->
    <nav class="fixed w-full z-50 py-4 px-6 md:px-12 flex justify-between items-center bg-[#0b0b0b]/90 backdrop-blur-sm border-b border-white/5">
        <div class="flex items-center gap-12">
            <!-- Logo -->
            <div class="noon-yellow font-black text-2xl tracking-tighter flex items-center">
                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round"><path d="M12 21a9 9 0 1 1 6.36-2.64"></path><circle cx="18" cy="6" r="2" fill="currentColor" stroke="none"></circle></svg>
                noon
            </div>
            
            <!-- Links -->
            <div class="hidden md:flex space-x-6 text-[13px] font-semibold text-white/90 tracking-wide">
                <a href="#" class="hover:text-[#feee00] transition-colors">Home</a>
                <a href="#" class="hover:text-[#feee00] transition-colors">Getting Started</a>
                <a href="#" class="hover:text-[#feee00] transition-colors">Shipping & Fulfilment</a>
                <a href="#" class="hover:text-[#feee00] transition-colors">Grow Smarter</a>
            </div>
        </div>

        <!-- Right Side -->
        <div class="flex items-center space-x-6 text-[13px] font-semibold text-white/90">
            <button class="flex items-center gap-2 hover:text-[#feee00] transition-colors">
                <img src="https://flagcdn.com/w20/ae.png" alt="UAE" class="w-5 h-auto rounded-[2px]">
                UAE
            </button>
            <button class="flex items-center gap-1.5 hover:text-[#feee00] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                English
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 px-6 md:px-12 max-w-[1400px] mx-auto min-h-[85vh] flex items-center">
        <!-- Background Image fading to black on the left -->
        <div class="absolute inset-0 z-[-1] flex justify-end">
            <div class="w-2/3 h-full relative">
                <img src="https://images.unsplash.com/photo-1580674285054-bed31e145f59?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-60 mix-blend-lighten" alt="Hero Background">
                <div class="absolute inset-0 bg-gradient-to-r from-[#0b0b0b] via-[#0b0b0b]/80 to-transparent"></div>
            </div>
        </div>

        <div class="w-full md:w-1/2 z-10">
            <h1 class="text-[56px] md:text-[72px] font-black leading-[1.1] tracking-tight mb-8">
                Start selling on <br> noon today!
            </h1>
            <button class="bg-noon-yellow hover:bg-[#e5d600] text-black font-bold py-3.5 px-8 rounded-full transition-colors inline-flex items-center gap-2 text-sm">
                Sign Up Now <span class="text-lg leading-none">&rarr;</span>
            </button>
        </div>
    </section>

    <!-- Why Join Us? -->
    <section class="py-16 px-6 md:px-12 max-w-[1400px] mx-auto">
        <h2 class="text-[26px] font-bold mb-8">Why Join Us?</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="relative h-[180px] rounded-2xl overflow-hidden group border border-white/10">
                <img src="https://images.unsplash.com/photo-1586528116311-ad8ed7c663be?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Reach Millions">
                <div class="absolute inset-0 card-overlay"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-center">
                    <h3 class="text-xl font-bold mb-2 noon-yellow">Reach Millions</h3>
                    <p class="text-[13px] text-gray-300 font-medium leading-relaxed max-w-[80%]">Tap into a massive audience across the region and grow your business with a trusted e-commerce platform.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="relative h-[180px] rounded-2xl overflow-hidden group border border-white/10">
                <img src="https://images.unsplash.com/photo-1509390295171-d64e9a4fba8c?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Fast Delivery">
                <div class="absolute inset-0 card-overlay"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-center">
                    <h3 class="text-xl font-bold mb-2 noon-yellow">Fast, Flexible Delivery</h3>
                    <p class="text-[13px] text-gray-300 font-medium leading-relaxed max-w-[80%]">Take advantage of our world-class logistics network and deliver quickly and reliably to your customers.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="relative h-[180px] rounded-2xl overflow-hidden group border border-white/10">
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Earn More">
                <div class="absolute inset-0 card-overlay"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-center">
                    <h3 class="text-xl font-bold mb-2 noon-yellow">Grow Fast, Earn More</h3>
                    <p class="text-[13px] text-gray-300 font-medium leading-relaxed max-w-[80%]">Boost your profit margins with competitive fees, transparent payouts, and marketing tools built to sell.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Getting Started Background Wrap -->
    <div class="bg-[#121212]">
        
        <!-- Getting Started -->
        <section class="py-24 px-6 md:px-12 max-w-[1400px] mx-auto border-t border-white/5">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                
                <!-- Left Content -->
                <div class="pr-8">
                    <h3 class="noon-yellow font-bold text-lg mb-2">Getting Started</h3>
                    <h2 class="text-4xl font-bold mb-3">Ready to start selling?</h2>
                    <p class="text-gray-400 font-medium text-[15px] mb-12">It's quick and easy — here's what you'll need</p>
                    
                    <!-- Collage (Approximation) -->
                    <div class="relative h-[400px] w-full mt-10">
                        <div class="absolute left-[10%] top-0 w-32 h-40 rounded-xl overflow-hidden border-4 border-[#121212] z-10 shadow-2xl rotate-[-2deg]">
                            <img src="https://images.unsplash.com/photo-1586528116311-ad8ed7c663be?q=80&w=400" class="w-full h-full object-cover grayscale" alt="Warehouse">
                        </div>
                        <div class="absolute left-0 top-[35%] w-40 h-52 rounded-xl overflow-hidden border-4 border-[#121212] z-20 shadow-2xl rotate-[3deg]">
                            <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=400" class="w-full h-full object-cover" alt="Sellers">
                        </div>
                        <div class="absolute left-[35%] top-[15%] w-36 h-48 rounded-xl overflow-hidden border-4 border-[#121212] z-30 shadow-2xl rotate-[-5deg]">
                            <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=400" class="w-full h-full object-cover" alt="Box">
                            <div class="absolute inset-0 bg-[#feee00] mix-blend-color"></div>
                        </div>
                        <div class="absolute left-[65%] top-[5%] w-32 h-44 rounded-xl overflow-hidden border-4 border-[#121212] z-10 shadow-2xl rotate-[4deg]">
                            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=400" class="w-full h-full object-cover grayscale" alt="Worker">
                        </div>
                        <div class="absolute left-[45%] top-[55%] w-44 h-56 rounded-xl overflow-hidden border-4 border-[#121212] z-20 shadow-2xl rotate-[-1deg]">
                            <img src="https://images.unsplash.com/photo-1542204165-65bf26472b9b?q=80&w=400" class="w-full h-full object-cover" alt="Aisle">
                        </div>
                    </div>
                </div>

                <!-- Right Content (Checklist) -->
                <div>
                    <div class="bg-black/50 border border-white/5 rounded-2xl p-10">
                        <h4 class="font-bold text-xl mb-6">Seller Setup Checklist:</h4>
                        
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-[#1a1a1a] flex items-center justify-center shrink-0 border border-white/10">
                                    <svg class="w-3 h-3 noon-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-[14px] font-medium text-gray-200">Email address and phone number</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-[#1a1a1a] flex items-center justify-center shrink-0 border border-white/10">
                                    <svg class="w-3 h-3 noon-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-[14px] font-medium text-gray-200">Commercial Registration or Trade License</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-5 h-5 rounded-full bg-[#1a1a1a] flex items-center justify-center shrink-0 border border-white/10">
                                    <svg class="w-3 h-3 noon-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <span class="text-[14px] font-medium text-gray-200">Bank details / ID / Passport / Visa details</span>
                            </li>
                        </ul>

                        <button class="bg-noon-yellow hover:bg-[#e5d600] text-black font-bold py-2.5 px-6 rounded-full transition-colors text-[13px] mb-10">
                            View the FAQs
                        </button>

                        <div class="border-t border-white/10 pt-8">
                            <p class="text-sm font-semibold mb-6">Once you have everything ready, getting started is super simple:</p>
                            
                            <ol class="space-y-4">
                                <li class="text-[14px] text-gray-300 font-medium">Step 1: Create your account</li>
                                <li class="text-[14px] text-gray-300 font-medium">Step 2: List your products</li>
                                <li class="text-[14px] text-gray-300 font-medium">Step 3: Choose your fulfillment model</li>
                                <li class="text-[14px] font-bold mt-6">And that's it! Your first customer order is just a click away.</li>
                            </ol>
                            
                            <a href="#" class="noon-yellow hover:underline font-bold text-sm inline-flex items-center gap-1 mt-4">
                                Learn more &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Dubai Traders Program Banner -->
        <section class="py-10 px-6 md:px-12 max-w-[1400px] mx-auto">
            <div class="rounded-[20px] bg-gradient-to-r from-pink-400 via-orange-300 to-yellow-200 p-8 md:p-12 relative overflow-hidden flex flex-col justify-center min-h-[220px]">
                <div class="relative z-10 flex justify-between items-center w-full">
                    <div class="max-w-2xl">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="bg-black text-white text-xs font-black px-2 py-0.5 rounded tracking-wide uppercase">Dubai</span>
                            <span class="font-black text-xl tracking-tighter text-black flex items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round"><path d="M12 21a9 9 0 1 1 6.36-2.64"></path><circle cx="18" cy="6" r="2" fill="currentColor" stroke="none"></circle></svg>
                                noon
                            </span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-black text-white mb-2 italic" style="text-shadow: 0 4px 10px rgba(0,0,0,0.1);">Dubai Traders Program</h2>
                        <p class="text-black/80 font-bold text-[15px]">Enjoy 0 startup costs & get a AED 50,000 credit.</p>
                    </div>
                    <button class="bg-white text-black font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-50 transition-colors shrink-0 text-sm">
                        Start Now
                    </button>
                </div>
                
                <!-- Floating elements abstraction -->
                <div class="absolute right-32 top-1/2 -translate-y-1/2 w-48 h-48 opacity-80 pointer-events-none hidden md:block">
                    <!-- Placeholders for the 3D phone and coins from the original design -->
                    <div class="absolute top-0 right-10 w-12 h-12 bg-white/40 rounded-full blur-md"></div>
                    <div class="absolute bottom-10 left-0 w-16 h-16 bg-pink-500/40 rounded-full blur-lg"></div>
                    <img src="https://images.unsplash.com/photo-1512428559087-560fa5ceab42?q=80&w=200&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-contain drop-shadow-2xl rounded-3xl" alt="Phone App">
                </div>
            </div>
        </section>

        <!-- Shipping and Fulfillment -->
        <section class="py-20 px-6 md:px-12 max-w-[1400px] mx-auto border-t border-white/5 border-b">
            <div class="grid md:grid-cols-2 gap-0 bg-[#161616] rounded-[24px] overflow-hidden border border-white/5">
                
                <!-- Image -->
                <div class="relative h-[300px] md:h-auto">
                    <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover" alt="Warehouse Aisle">
                </div>

                <!-- Text content -->
                <div class="p-12 md:p-16 flex flex-col justify-center">
                    <h3 class="noon-yellow font-bold text-lg mb-2">Shipping and Fulfillment</h3>
                    <h2 class="text-[28px] font-bold mb-4 leading-tight">Flexible fulfillment options that work for you</h2>
                    <p class="text-gray-400 font-medium text-[14px] mb-8">We handle the logistics so you can focus on scaling your business with absolute confidence.</p>
                    
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <div class="w-4 h-4 rounded-full bg-noon-yellow/20 flex items-center justify-center shrink-0">
                                <svg class="w-2.5 h-2.5 noon-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-[14px] font-bold text-gray-200">Fulfilled by noon — Built for speed</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-4 h-4 rounded-full bg-noon-yellow/20 flex items-center justify-center shrink-0">
                                <svg class="w-2.5 h-2.5 noon-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-[14px] font-bold text-gray-200">Fulfilled by Partner — Built for flexibility</span>
                        </li>
                    </ul>

                    <a href="#" class="noon-yellow hover:underline font-bold text-sm inline-flex items-center gap-1">
                        Learn more &rarr;
                    </a>
                </div>
            </div>
        </section>

    </div> <!-- End Gray BG wrap -->

    <!-- Grow Smarter -->
    <section class="py-20 px-6 md:px-12 max-w-[1400px] mx-auto border-b border-white/5">
        <h3 class="noon-yellow font-bold text-lg mb-1">Grow Smarter</h3>
        <h2 class="text-[32px] font-bold mb-10">Everything you need to scale and stay ahead</h2>
        
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="relative h-[220px] rounded-2xl overflow-hidden group border border-white/10">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Ads">
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-transparent"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <h4 class="text-xl font-bold mb-2">Ads that drive results</h4>
                    <p class="text-[13px] text-gray-300 font-medium leading-relaxed max-w-[90%] mb-2">Amplify your sales and increase visibility with targeted product ads and campaigns.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="relative h-[220px] rounded-2xl overflow-hidden group border border-white/10">
                <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 grayscale mix-blend-luminosity opacity-70 bg-noon-yellow" alt="Costs">
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-transparent"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <h4 class="text-xl font-bold mb-2">Know your costs</h4>
                    <p class="text-[13px] text-gray-300 font-medium leading-relaxed max-w-[90%] mb-2">Our transparent fee calculator ensures you always know your profit margins.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="relative h-[220px] rounded-2xl overflow-hidden group border border-white/10">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Insights">
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/70 to-transparent"></div>
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    <h4 class="text-xl font-bold mb-2">Scale with insights</h4>
                    <p class="text-[13px] text-gray-300 font-medium leading-relaxed max-w-[90%] mb-2">Leverage our powerful analytics dashboard to identify trending products.</p>
                </div>
            </div>
        </div>
        
        <div class="mt-8 text-right">
            <a href="#" class="noon-yellow hover:underline font-bold text-sm inline-flex items-center gap-1">
                Learn more &rarr;
            </a>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 px-6 md:px-12 max-w-[1400px] mx-auto">
        <h2 class="text-[32px] font-bold mb-12">Testimonials</h2>
        
        <div class="grid lg:grid-cols-[1fr_1fr] gap-10 mb-10">
            <!-- Featured Video Testimonial -->
            <div class="relative rounded-[24px] overflow-hidden aspect-[16/10] group border border-white/10 shadow-2xl">
                <img src="https://images.unsplash.com/photo-1556761175-5972d9344adc?q=80&w=1200" class="w-full h-full object-cover" alt="Video Thumbnail">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors"></div>
                
                <!-- Play Button overlay -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-16 h-12 bg-red-600 rounded-[12px] flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform cursor-pointer">
                        <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div>

                <!-- Title Overlay -->
                <div class="absolute top-6 left-6 right-6 flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-noon-yellow shrink-0 flex items-center justify-center shadow-sm">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round"><path d="M12 21a9 9 0 1 1 6.36-2.64"></path><circle cx="18" cy="6" r="2" fill="currentColor" stroke="none"></circle></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-base drop-shadow-md">How PAN Emirates scaled their noon store</h4>
                        <p class="text-xs text-white/80 drop-shadow-md">2 min watch</p>
                    </div>
                </div>
            </div>

            <!-- Featured Testimonial Text -->
            <div class="flex flex-col justify-center lg:pr-10">
                <div class="flex gap-1 text-noon-yellow mb-6">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <h3 class="text-2xl lg:text-3xl font-bold mb-4 leading-snug">PAN Emirates chose noon's Fulfilled by Partner (FBP) model — and became the region's #1 furniture seller.</h3>
                <p class="text-gray-400 text-[14px] mb-8 font-medium">Because noon delivers on speed, reliability, and support, we've transformed the scale of our local business.</p>
                <a href="#" class="noon-yellow hover:underline font-bold text-sm inline-flex items-center gap-1">
                    Play Video &rarr;
                </a>
            </div>
        </div>

        <!-- Portrait Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mt-16">
            <!-- Portrait 1 -->
            <div class="relative rounded-2xl overflow-hidden group aspect-[3/4] border border-white/10">
                <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Testimonial">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent p-6 flex flex-col justify-end">
                    <p class="text-[11px] font-medium text-gray-200 mb-4 line-clamp-4 leading-relaxed">"Since joining noon, our sales have multiplied by 5x in just a few months. The platform is intuitive, and the support from the seller team has been outstanding."</p>
                    <div>
                        <h4 class="font-bold text-[13px] text-white">Ahmed Abdullah</h4>
                        <p class="text-[10px] text-noon-yellow">CEO, Al Noor</p>
                    </div>
                </div>
            </div>
            <!-- Portrait 2 -->
            <div class="relative rounded-2xl overflow-hidden group aspect-[3/4] border border-white/10">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Testimonial">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent p-6 flex flex-col justify-end">
                    <p class="text-[11px] font-medium text-gray-200 mb-4 line-clamp-4 leading-relaxed">"The transition to noon was seamless. Their fulfilled by partner model allowed us to maintain control of our inventory while leveraging their massive audience."</p>
                    <div>
                        <h4 class="font-bold text-[13px] text-white">Sara Al-Futtaim</h4>
                        <p class="text-[10px] text-noon-yellow">Founder, Beauty Hub</p>
                    </div>
                </div>
            </div>
            <!-- Portrait 3 -->
            <div class="relative rounded-2xl overflow-hidden group aspect-[3/4] border border-white/10">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Testimonial">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent p-6 flex flex-col justify-end">
                    <p class="text-[11px] font-medium text-gray-200 mb-4 line-clamp-4 leading-relaxed">"Incredible growth! The analytics dashboard gives us exactly the insights we need to stock the right products at the right time."</p>
                    <div>
                        <h4 class="font-bold text-[13px] text-white">Karim Youssef</h4>
                        <p class="text-[10px] text-noon-yellow">Tech World L.L.C</p>
                    </div>
                </div>
            </div>
            <!-- Portrait 4 -->
            <div class="relative rounded-2xl overflow-hidden group aspect-[3/4] border border-white/10">
                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Testimonial">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent p-6 flex flex-col justify-end">
                    <p class="text-[11px] font-medium text-gray-200 mb-4 line-clamp-4 leading-relaxed">"The onboarding process was simple, and the seller support team was there to guide us every step of the way. Highly recommended."</p>
                    <div>
                        <h4 class="font-bold text-[13px] text-white">Fatima Al-Hashimi</h4>
                        <p class="text-[10px] text-noon-yellow">Boutique Fatima</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Need Help Box -->
        <div class="mt-20 border border-[#333] rounded-2xl p-10 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8 bg-[#0f0f0f]">
            <div class="max-w-xl">
                <h3 class="text-xl font-bold mb-3">Need Help?</h3>
                <p class="text-[14px] text-gray-400 font-medium">Reach out to Seller Support or check our guide to find answers to your questions, watch tutorial videos, or download setup documents.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 shrink-0 w-full md:w-auto">
                <button class="bg-noon-yellow hover:bg-[#e5d600] text-black font-bold py-3.5 px-8 rounded-full transition-colors text-sm w-full sm:w-auto text-center">
                    Contact Us - For Sellers
                </button>
                <button class="bg-transparent border border-gray-600 hover:border-gray-400 text-white font-bold py-3.5 px-8 rounded-full transition-colors text-sm w-full sm:w-auto text-center">
                    About The Process
                </button>
            </div>
        </div>
    </section>

    <!-- Solid Yellow Footer -->
    <footer class="bg-[#feee00] text-black pt-20 pb-16 px-6 relative">
        <div class="max-w-4xl mx-auto text-center flex flex-col items-center">
            <h3 class="text-sm font-bold tracking-widest uppercase mb-4 opacity-70">Join the Community</h3>
            <h2 class="text-4xl md:text-5xl font-black mb-6 tracking-tight">Ready to Sell?</h2>
            <p class="text-black/80 font-bold mb-10 max-w-lg mx-auto text-[15px]">Start your ecommerce journey today and tap into millions of active buyers right away.</p>
            <button class="bg-black hover:bg-gray-800 text-white font-bold py-4 px-10 rounded-full transition-all hover:scale-105 active:scale-95 shadow-xl inline-flex items-center gap-2">
                Sign up Now <span class="text-xl leading-none">&rarr;</span>
            </button>
        </div>
        
        <div class="absolute bottom-6 right-6 text-[10px] font-medium opacity-60">
            &copy; 2026 noon. All Rights Reserved.
        </div>
    </footer>

</body>
</html>
