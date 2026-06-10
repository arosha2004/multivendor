<x-app-layout>
    <style>
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <!-- Top Yellow Header mimicking emall -->
    <div class="bg-[#FEE000] w-full relative z-50 shadow-sm" style="background-color: #FEE000;">
        <div class="max-w-[1400px] mx-auto px-3 sm:px-6 flex items-center justify-between py-3">
            <div class="flex items-center space-x-3 shrink-0">
                <!-- emall Logo -->
                <a href="{{ route('dashboard') }}" class="text-2xl sm:text-3xl font-extrabold tracking-tighter text-black lowercase leading-none hover:opacity-85 transition">emall</a>
                <!-- Location -->
                <div class="hidden md:flex items-center text-sm font-semibold text-gray-900 cursor-pointer space-x-1">
                    <svg class="w-4 h-4 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span class="text-xs sm:text-sm">Other • LK</span>
                </div>
            </div>

            <!-- Top Right Nav -->
            <div class="flex items-center space-x-4 text-sm font-semibold text-gray-900 shrink-0">
                <a href="{{ route('dashboard') }}" class="hidden sm:flex items-center cursor-pointer hover:text-gray-700 transition space-x-1.5">
                    <span>Continue Shopping</span>
                </a>
                <!-- Mobile: back + hamburger -->
                <a href="{{ route('dashboard') }}" class="sm:hidden flex items-center cursor-pointer text-gray-800 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-[1400px] mx-auto p-3 sm:p-4 md:p-8 bg-[#FCFBF4] min-h-screen border-l border-r border-gray-200">
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-gray-850">Shopping Cart</h2>
        
        @if(session('success'))
            <div class="mb-6 text-green-700 bg-green-50 border border-green-200 p-4 rounded-lg flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path></svg>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        @endif

        @if(empty($cart))
            <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-gray-200">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Your cart is empty</h3>
                <p class="text-gray-500 mb-6">Looks like you haven't added anything to your cart yet.</p>
                <a href="{{ route('dashboard') }}" class="inline-block bg-[#FEE000] text-black font-bold py-3 px-8 rounded-full hover:bg-[#E5C900] transition-colors shadow-sm">
                    Start Shopping
                </a>
            </div>
        @else
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Cart Items -->
                <div class="lg:w-2/3 space-y-4">
                    @php 
                        $total = 0; 
                        $totalItems = 0;
                    @endphp
                    @foreach($cart as $id => $details)
                        @php 
                            $total += $details['price'] * $details['quantity']; 
                            $totalItems += $details['quantity'];
                        @endphp
                        <div class="bg-white p-4 rounded-md border border-gray-200 flex flex-col sm:flex-row gap-4 sm:gap-6">
                            <!-- Image -->
                            <a href="{{ route('products.show', $id) }}" class="w-32 h-32 sm:w-36 sm:h-36 shrink-0 bg-[#F4F4F4] rounded flex items-center justify-center p-3">
                                <img src="{{ asset('storage/' . $details['image_path']) }}" alt="{{ $details['title'] }}" class="max-w-full max-h-full object-contain mix-blend-multiply">
                            </a>
                            
                            <!-- Content -->
                            <div class="flex-1 flex flex-col min-w-0">
                                <!-- Title and Price -->
                                <div class="flex justify-between items-start gap-4">
                                    <a href="{{ route('products.show', $id) }}" class="text-[15px] font-bold text-[#404553] leading-snug hover:text-blue-600 transition-colors">{{ $details['title'] }}</a>
                                    <div class="text-right shrink-0">
                                        <div class="flex items-baseline space-x-1">
                                            <span class="text-[13px] font-extrabold text-[#404553]">LKR</span>
                                            <span class="text-lg font-extrabold text-[#404553]">{{ number_format($details['price'], 2) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delivery Info -->
                                <div class="mt-2 space-y-0.5">
                                    <p class="text-[13px] text-[#404553]">Get it <span class="text-[#38AE04] font-bold">Tomorrow</span></p>
                                    <p class="text-[13px] text-[#7E859B]">Order in 4 hrs 1 mins</p>
                                </div>

                                <!-- Shipping & Seller -->
                                <div class="mt-3 space-y-1">
                                    <div class="flex items-center space-x-2 text-[12px] text-[#7E859B]">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"></path></svg>
                                        <span>Free Shipping</span>
                                    </div>
                                    <div class="flex items-center space-x-2 text-[12px] text-[#7E859B]">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72L4.318 3.44A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72m-13.5 8.65h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .415.336.75.75.75z"></path></svg>
                                        <span>Sold by <span class="text-blue-500">noon</span></span>
                                    </div>
                                </div>

                                <!-- Coupons -->
                                <div class="mt-4 flex gap-2">
                                    <div class="border border-[#38AE04] border-dashed rounded bg-green-50/30 px-2 py-0.5 flex items-center space-x-1 cursor-pointer hover:bg-green-50 transition">
                                        <svg class="w-3.5 h-3.5 text-[#38AE04] fill-current" viewBox="0 0 24 24"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"></path></svg>
                                        <span class="text-[#38AE04] text-[11px] font-bold">Extra 15% off</span>
                                        <svg class="w-3 h-3 text-[#38AE04]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path></svg>
                                    </div>
                                    <div class="border border-[#38AE04] border-dashed rounded bg-green-50/30 px-2 py-0.5 flex items-center space-x-1 cursor-pointer hover:bg-green-50 transition">
                                        <svg class="w-3.5 h-3.5 text-[#38AE04] fill-current" viewBox="0 0 24 24"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"></path></svg>
                                        <span class="text-[#38AE04] text-[11px] font-bold">Extra 10% off</span>
                                        <svg class="w-3 h-3 text-[#38AE04]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path></svg>
                                    </div>
                                </div>

                        <div class="mt-4 flex flex-wrap items-center gap-2 justify-between">
                                    <!-- Quantity -->
                                    <div class="flex items-center border border-[#E2E5F1] rounded">
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="h-8">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ max(0, $details['quantity'] - 1) }}">
                                            @if($details['quantity'] <= 1)
                                                <button type="button" onclick="document.getElementById('remove-form-{{ $id }}').submit()" class="w-8 h-full flex items-center justify-center text-[#7E859B] hover:text-gray-900 transition border-r border-[#E2E5F1] bg-white">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            @else
                                                <button type="submit" class="w-8 h-full flex items-center justify-center text-[#404553] hover:text-gray-900 transition font-medium text-lg border-r border-[#E2E5F1] bg-white">−</button>
                                            @endif
                                        </form>
                                        
                                        <span class="w-10 text-center text-[13px] font-bold text-[#404553]">{{ $details['quantity'] }}</span>
                                        
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="h-8">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $details['quantity'] + 1 }}">
                                            <button type="submit" class="w-8 h-full flex items-center justify-center text-[#404553] hover:text-gray-900 transition font-medium text-lg border-l border-[#E2E5F1] bg-white">+</button>
                                        </form>
                                    </div>

                                    <!-- Right Actions -->
                                    <div class="flex flex-wrap items-center gap-2">
                                        <button class="flex items-center space-x-1.5 px-3 py-1.5 border border-[#E2E5F1] rounded text-[#404553] text-[12px] font-medium hover:bg-gray-50 transition">
                                            <svg class="w-3.5 h-3.5 text-[#7E859B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path></svg>
                                            <span>Move to Wishlist</span>
                                        </button>
                                        
                                        <form action="{{ route('cart.remove', $id) }}" method="POST" id="remove-form-{{ $id }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex items-center space-x-1.5 px-3 py-1.5 border border-[#E2E5F1] rounded text-[#404553] text-[12px] font-medium hover:bg-gray-50 transition">
                                                <svg class="w-3.5 h-3.5 text-[#7E859B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                <span>Remove</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right Side Info -->
                <div class="lg:w-1/3 flex flex-col gap-4">
                    
                    <!-- Coupon Block -->
                    <div class="bg-white p-4 rounded-md border border-gray-200 shadow-sm">
                        <div class="flex space-x-2 mb-3">
                            <input type="text" placeholder="Coupon Code" class="flex-1 border border-gray-200 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            <button class="bg-[#3866DF] text-white text-sm font-bold px-5 py-2 rounded hover:bg-blue-700 transition">APPLY</button>
                        </div>
                        <a href="#" class="flex items-center justify-between text-[#3866DF] text-[13px] font-medium hover:underline">
                            <div class="flex items-center space-x-1.5">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"></path></svg>
                                <span>View Available Offers</span>
                            </div>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path></svg>
                        </a>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-white p-5 rounded-md border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-bold text-[#404553] mb-4">Order Summary <span class="text-[13px] text-[#7E859B] font-normal">({{ $totalItems }} items)</span></h3>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex justify-between text-[13px] text-[#404553]">
                                <span>Subtotal</span>
                                <span class="font-bold">LKR {{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-[13px] text-[#404553]">
                                <span>Shipping Fee</span>
                                <div class="flex items-center space-x-1.5">
                                    <span class="text-[#7E859B] line-through">LKR 11.00</span>
                                    <span class="font-bold text-[#38AE04]">FREE</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-end border-t border-gray-100 pt-4 mb-5">
                            <div>
                                <span class="font-bold text-[15px] text-[#404553]">Total</span>
                                <span class="text-xs text-[#7E859B] ml-1">Incl. VAT</span>
                            </div>
                            <div class="text-lg font-extrabold text-[#404553]">LKR {{ number_format($total, 2) }}</div>
                        </div>
                        
                        <button class="w-full bg-[#3866DF] text-white text-[15px] font-bold py-3.5 rounded hover:bg-blue-700 transition-colors shadow-sm tracking-wide">
                            CHECKOUT
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
