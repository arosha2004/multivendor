<x-app-layout>
    @if(auth()->user()->role === 'vendor')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Vendor Dashboard') }}
            </h2>
        </x-slot>
    @endif

    @if(auth()->user()->role === 'vendor')
        {{-- VENDOR VIEW --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <!-- Add Product Form -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-4">Add New Product</h3>
                        @if(session('success'))
                            <div class="mb-4 text-green-600 bg-green-100 p-3 rounded">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="title" value="Product Title" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="price" value="Price (AED)" />
                                    <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="original_price" value="Original Price (Optional)" />
                                    <x-text-input id="original_price" name="original_price" type="number" step="0.01" class="mt-1 block w-full" />
                                    <x-input-error :messages="$errors->get('original_price')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="image" value="Product Image" />
                                    <input id="image" name="image" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required />
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-primary-button>Add Product</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Product List -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-4">Your Products</h3>
                        @if($products->isEmpty())
                            <p class="text-gray-500">You haven't added any products yet.</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Added</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($products as $product)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->title }}" class="h-10 w-10 object-cover rounded">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->title }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">AED {{ number_format($product->price, 2) }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->created_at->format('M d, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @else
        {{-- BUYER VIEW --}}
        
        <!-- Top Yellow Header mimicking noon.com -->
        <div class="bg-[#FEEA00] py-3 px-4 flex items-center justify-between shadow-sm relative z-50">
            <div class="flex items-center space-x-4">
                <div class="text-2xl md:text-3xl font-black italic tracking-tighter text-black">noon</div>
                <div class="hidden md:flex items-center text-sm font-bold bg-yellow-400 px-3 py-1.5 rounded-md border border-yellow-500 cursor-pointer hover:bg-yellow-500 transition">
                    <svg class="w-4 h-4 mr-1 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Other - Dubai
                </div>
            </div>
            <div class="flex-1 max-w-3xl mx-4">
                <div class="relative">
                    <input type="text" placeholder="Search for products..." class="w-full rounded-md border-0 py-2.5 px-4 text-gray-900 shadow-sm focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="hidden lg:flex items-center space-x-6 text-sm font-semibold text-black">
                <div class="cursor-pointer font-bold">العربية</div>
                <div class="flex items-center cursor-pointer hover:text-gray-700 transition"><svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> {{ explode(' ', Auth::user()->name)[0] }}</div>
                <div class="flex items-center cursor-pointer hover:text-gray-700 transition"><svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> Cart</div>
                <!-- Logout form for Buyer view -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center cursor-pointer text-red-600 hover:text-red-800 transition">Log out</button>
                </form>
            </div>
        </div>

        <!-- Categories Bar -->
        <div class="bg-white border-b border-gray-200 overflow-x-auto whitespace-nowrap px-4 py-3 flex items-center space-x-6 text-sm font-bold text-gray-700 shadow-sm relative z-40">
            <a href="#" class="hover:text-blue-600 transition">Electronics</a>
            <a href="#" class="hover:text-blue-600 transition">Beauty & Fragrance</a>
            <a href="#" class="hover:text-blue-600 transition">Home & Kitchen</a>
            <a href="#" class="text-blue-600 border-b-[3px] border-blue-600 pb-[10px] mt-[13px] relative -top-[2px]">Grocery</a>
            <a href="#" class="hover:text-blue-600 transition">Men's Fashion</a>
            <a href="#" class="hover:text-blue-600 transition">Women's Fashion</a>
            <a href="#" class="hover:text-blue-600 transition">Baby</a>
            <a href="#" class="hover:text-blue-600 transition">Toys</a>
            <a href="#" class="hover:text-blue-600 transition">Sports & Outdoors</a>
        </div>

        <!-- Main Content -->
        <div class="max-w-[1400px] mx-auto p-4 md:p-6 bg-gray-50 min-h-screen">
            <h2 class="text-xl md:text-2xl font-bold mb-4 text-gray-800">Recommended for you</h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg p-3 hover:shadow-xl transition-all duration-300 relative flex flex-col group border border-gray-200 cursor-pointer hover:-translate-y-1">
                        <!-- Best Seller Tag -->
                        @if($product->is_best_seller)
                            <div class="absolute top-2 left-2 bg-[#0E7153] text-white text-[10px] font-bold px-1.5 py-0.5 rounded z-10 uppercase shadow-sm">
                                Best Seller
                            </div>
                        @endif

                        <!-- Wishlist Icon -->
                        <div class="absolute top-2 right-2 bg-white rounded-full p-1.5 shadow border border-gray-100 opacity-0 group-hover:opacity-100 transition-opacity z-10 cursor-pointer hover:bg-gray-50 text-gray-400 hover:text-red-500">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>

                        <!-- Image -->
                        <div class="relative pt-[100%] w-full mb-3 bg-white rounded flex items-center justify-center">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->title }}" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain p-2 transition-transform duration-500 group-hover:scale-105">
                        </div>

                        <!-- Details -->
                        <div class="flex flex-col flex-1">
                            <h3 class="text-xs text-gray-700 line-clamp-2 min-h-[32px] mb-1 group-hover:text-blue-600 transition-colors">{{ $product->title }}</h3>
                            
                            <div class="flex items-center mb-1 space-x-1">
                                <div class="flex items-center text-[#1FA628]">
                                    <span class="text-xs font-bold">{{ $product->rating }}</span>
                                    <svg class="w-3 h-3 ml-0.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                </div>
                                <span class="text-xs text-gray-400">({{ $product->reviews_count > 1000 ? round($product->reviews_count/1000, 1).'K' : $product->reviews_count }})</span>
                            </div>

                            <div class="flex items-baseline mb-0.5">
                                <span class="text-xs font-semibold mr-1">AED</span>
                                <span class="text-lg font-bold text-gray-900">{{ number_format($product->price, 2) }}</span>
                            </div>

                            @if($product->original_price && $product->original_price > $product->price)
                                @php
                                    $discount = round((($product->original_price - $product->price) / $product->original_price) * 100);
                                @endphp
                                <div class="flex items-center text-[10px] space-x-1 mb-2">
                                    <span class="text-gray-400 line-through">{{ number_format($product->original_price, 2) }}</span>
                                    <span class="text-[#1FA628] font-bold">{{ $discount }}% OFF</span>
                                </div>
                            @else
                                <div class="h-[15px] mb-2"></div>
                            @endif
                            
                            <div class="mt-auto pt-2">
                                @if($product->delivery_badge)
                                    <div class="bg-[#243BB9] text-white text-[11px] font-bold px-2 py-1.5 rounded inline-flex w-full items-center justify-between tracking-wider shadow-sm group-hover:bg-[#1C2C8C] transition-colors">
                                        <div class="flex items-center">
                                            <svg class="w-3.5 h-3.5 mr-1 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"><path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"></path></svg>
                                            <span class="italic">{{ $product->delivery_badge }}</span>
                                        </div>
                                        <svg class="w-4 h-4 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if($products->isEmpty())
                <div class="text-center py-16 text-gray-500 bg-white rounded-lg mt-4 shadow-sm border border-gray-100">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <p class="text-xl font-semibold text-gray-900">No products available yet</p>
                    <p class="text-sm mt-1">Check back later for exciting offers!</p>
                </div>
            @endif
        </div>
    @endif
</x-app-layout>
