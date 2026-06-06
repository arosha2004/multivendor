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
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 flex items-center justify-between py-3.5">
            <div class="flex items-center space-x-5 shrink-0">
                <a href="{{ route('dashboard') }}" class="text-3xl sm:text-4xl font-extrabold tracking-tighter text-black lowercase leading-none hover:opacity-85 transition">emall</a>
                <div class="hidden md:flex items-center text-sm font-semibold text-gray-900 cursor-pointer space-x-1">
                    <span class="text-xs sm:text-sm">Store: {{ $vendor->name }}</span>
                </div>
            </div>

            <div class="hidden lg:flex items-center space-x-6 text-sm font-semibold text-gray-900 shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center cursor-pointer hover:text-gray-700 transition space-x-1.5">
                    <span>Back to Home</span>
                </a>
                
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
                    <span>Cart</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-[1400px] mx-auto p-4 md:p-8 bg-[#FCFBF4] min-h-screen border-l border-r border-gray-200">
        
        <div class="mb-8 flex items-center space-x-4">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center text-white font-black text-3xl shadow">
                {{ strtoupper(substr($vendor->name, 0, 1)) }}
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-850">{{ $vendor->name }}'s Store</h1>
                <p class="text-gray-500 text-sm">Showing all {{ $products->count() }} products from this seller</p>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 text-green-700 bg-green-50 border border-green-200 p-4 rounded-lg flex items-center shadow-sm">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path></svg>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        @endif
        
        @if($products->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <p class="text-md font-semibold">This vendor doesn't have any products yet.</p>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
                @foreach($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="block no-underline">
                        <div class="bg-white rounded-lg p-3 hover:shadow-xl transition-all duration-300 relative flex flex-col group border border-gray-200 cursor-pointer hover:-translate-y-1">
                            @if($product->is_best_seller)
                                <div class="absolute top-2 left-2 bg-[#0E7153] text-white text-[10px] font-bold px-1.5 py-0.5 rounded z-10 uppercase shadow-sm">
                                    Best Seller
                                </div>
                            @endif

                            <!-- Add to Cart Icon -->
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="absolute top-2 right-2 z-20">
                                @csrf
                                <button type="submit" onclick="event.preventDefault(); event.stopPropagation(); this.closest('form').submit();" class="bg-white rounded-full w-8 h-8 flex items-center justify-center shadow border border-gray-100 cursor-pointer hover:bg-gray-50 text-gray-500 hover:text-[#3866DF] transition-colors focus:outline-none" title="Add to Cart">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </form>

                            <div class="relative pt-[100%] w-full mb-3 bg-white rounded flex items-center justify-center">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->title }}" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain p-2 transition-transform duration-500 group-hover:scale-105">
                            </div>

                            <div class="flex-1 flex flex-col">
                                <h3 class="text-sm text-gray-800 line-clamp-2 leading-tight mb-2 min-h-[2.5rem] group-hover:text-[#243BB9] transition-colors">
                                    {{ $product->title }}
                                </h3>
                                
                                <div class="mt-auto">
                                    <div class="flex items-baseline space-x-1 mb-1">
                                        <span class="text-xs text-gray-500 font-semibold">AED</span>
                                        <span class="text-lg font-extrabold text-gray-900">{{ number_format($product->price, 2) }}</span>
                                    </div>

                                    @if($product->original_price && $product->original_price > $product->price)
                                        @php $disc = round((($product->original_price - $product->price) / $product->original_price) * 100); @endphp
                                        <div class="flex items-center space-x-2 text-xs">
                                            <span class="text-gray-400 line-through">AED {{ number_format($product->original_price, 2) }}</span>
                                            <span class="text-[#1FA628] font-bold">{{ $disc }}% Off</span>
                                        </div>
                                    @else
                                        <div class="h-4"></div>
                                    @endif

                                    <div class="flex items-center mt-2.5">
                                        <div class="flex items-center">
                                            <span class="text-xs font-bold text-gray-700 mr-1">{{ number_format($product->rating, 1) }}</span>
                                            <svg class="w-3.5 h-3.5 text-[#1FA628] fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        </div>
                                        <span class="text-gray-400 text-xs ml-1.5">({{ $product->reviews_count > 1000 ? round($product->reviews_count/1000, 1).'K' : $product->reviews_count }})</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
