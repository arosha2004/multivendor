<x-app-layout>
    @if(auth()->check() && auth()->user()->role === 'vendor' && !isset($force_buyer_view))
        {{-- Custom Vendor Navbar --}}
        <div class="bg-white border-b border-gray-200 shadow-sm relative z-50">
            <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Left: Logo & Title -->
                    <div class="flex items-center space-x-3 sm:space-x-6">
                        <a href="{{ route('dashboard') }}" class="text-2xl sm:text-3xl font-extrabold tracking-tighter text-black lowercase leading-none hover:opacity-80 transition">emall</a>
                        <div class="hidden sm:block h-6 w-px bg-gray-200"></div>
                        <div class="hidden sm:flex items-center">
                            <span class="bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-md uppercase tracking-wider shadow-sm">
                                Vendor Dashboard
                            </span>
                        </div>
                    </div>
                    
                    <!-- Right: Actions (desktop) -->
                    <div class="hidden md:flex items-center space-x-3">
                        <!-- My Catalog -->
                        <a href="{{ route('vendor.products') }}" class="flex bg-white hover:bg-gray-50 text-gray-700 px-3 py-2 rounded-full text-sm font-bold transition items-center space-x-2 border border-gray-200 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75c.621 0 1.125.504 1.125 1.125v1.875c0 .621-.504 1.125-1.125 1.125H5.625A1.125 1.125 0 0 1 4.5 6.75V5.625c0-.621.504-1.125 1.125-1.125Z" />
                            </svg>
                            <span>My Catalog</span>
                        </a>
                        <!-- Switch to Buyer View -->
                        <a href="{{ route('buyer.home') }}" class="flex bg-white hover:bg-gray-50 text-gray-700 px-3 py-2 rounded-full text-sm font-bold transition items-center space-x-2 border border-gray-200 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span>Buyer View</span>
                        </a>
                        <div class="h-6 w-px bg-gray-200"></div>
                        <a href="{{ route('profile.edit') }}" class="p-2 rounded-full hover:bg-gray-100 text-gray-500 hover:text-gray-900 transition" title="Edit Profile">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="p-2 rounded-full hover:bg-red-50 text-gray-500 hover:text-red-600 transition" title="Log Out">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Mobile: Hamburger -->
                    <button id="vendor-mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition" onclick="document.getElementById('vendor-mobile-drawer').classList.toggle('hidden')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Drawer -->
            <div id="vendor-mobile-drawer" class="hidden md:hidden bg-white border-t border-gray-200 px-4 py-3 space-y-2 shadow-md">
                <a href="{{ route('vendor.products') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75c.621 0 1.125.504 1.125 1.125v1.875c0 .621-.504 1.125-1.125 1.125H5.625A1.125 1.125 0 0 1 4.5 6.75V5.625c0-.621.504-1.125 1.125-1.125Z" /></svg>
                    <span>My Catalog</span>
                </a>
                <a href="{{ route('buyer.home') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                    <span>Buyer View</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                    <span>Edit Profile</span>
                </a>
                <div class="border-t border-gray-100 pt-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-red-50 text-sm font-semibold text-red-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" /></svg>
                            <span>Log Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- VENDOR VIEW CONTENT --}}
        <div class="max-w-[1400px] mx-auto p-3 sm:p-4 md:p-8 bg-[#FCFBF4] min-h-screen border-l border-r border-gray-200">
            <div class="space-y-6 sm:space-y-8">
                <!-- Add Product Form -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-250">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-650" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Add New Product
                        </h3>
                        @if(session('success') && !request()->session()->has('modal_open'))
                            <div class="mb-6 text-green-700 bg-green-50 border border-green-200 p-4 rounded-lg flex items-center shadow-sm">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path></svg>
                                <span class="font-semibold">{{ session('success') }}</span>
                            </div>
                        @endif
                        <form id="add-product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                                <div>
                                    <x-input-label for="title" value="Product Title" class="font-semibold text-gray-700" />
                                    <x-text-input id="title" name="title" type="text" class="mt-1.5 block w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm border-gray-300" required />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="category" value="Category" class="font-semibold text-gray-700" />
                                    <select id="category" name="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm mt-1.5 block w-full" required>
                                        <option value="">Select a category</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Beauty & Fragrance">Beauty & Fragrance</option>
                                        <option value="Home & Kitchen">Home & Kitchen</option>
                                        <option value="Grocery">Grocery</option>
                                        <option value="Men's Fashion">Men's Fashion</option>
                                        <option value="Women's Fashion">Women's Fashion</option>
                                        <option value="Baby">Baby</option>
                                        <option value="Toys">Toys</option>
                                        <option value="Kids' Fashion">Kids' Fashion</option>
                                        <option value="Sports & Outdoors">Sports & Outdoors</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="price" value="Price (AED)" class="font-semibold text-gray-700" />
                                    <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1.5 block w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm border-gray-300" required />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="original_price" value="Original Price (Optional)" class="font-semibold text-gray-700" />
                                    <x-text-input id="original_price" name="original_price" type="number" step="0.01" class="mt-1.5 block w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm border-gray-300" />
                                    <x-input-error :messages="$errors->get('original_price')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="image" value="Cover Image" class="font-semibold text-gray-700" />
                                    <div class="mt-1.5 flex items-center">
                                        <label class="cursor-pointer bg-[#eef2ff] hover:bg-[#e0e7ff] text-[#4f46e5] px-4 py-2 rounded-lg text-sm font-semibold transition border border-transparent shadow-sm mr-3 shrink-0">
                                            Choose File
                                            <input type="file" id="image" name="image" class="hidden" onchange="updateFileName(this, 'add-cover-filename')" required>
                                        </label>
                                        <span id="add-cover-filename" class="text-sm text-gray-500 truncate">No file chosen</span>
                                    </div>
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="additional_images" value="Additional Images (Optional)" class="font-semibold text-gray-700" />
                                    <div class="mt-1.5 flex items-center">
                                        <label class="cursor-pointer bg-[#eef2ff] hover:bg-[#e0e7ff] text-[#4f46e5] px-4 py-2 rounded-lg text-sm font-semibold transition border border-transparent shadow-sm mr-3 shrink-0">
                                            Choose Files
                                            <input type="file" id="additional_images" name="additional_images[]" multiple class="hidden" onchange="updateFileNames(this, 'add-additional-filenames')">
                                        </label>
                                        <span id="add-additional-filenames" class="text-sm text-gray-500 truncate">No file chosen</span>
                                    </div>
                                    <x-input-error :messages="$errors->get('additional_images')" class="mt-2" />
                                </div>
                                <div class="md:col-span-2 mb-6">
                                    <x-input-label for="description" value="Product Description" class="font-semibold text-gray-700" />
                                    <input type="hidden" name="description" id="description_hidden">
                                    <div id="quill-editor" class="mt-1.5 bg-white rounded-b-lg border-gray-300" style="min-height: 160px; height: auto;"></div>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                <div class="md:col-span-2 border-t border-gray-100 pt-6 mt-4">
                                    <div class="flex items-center justify-between mb-3">
                                        <div>
                                            <h4 class="font-bold text-gray-800 text-base">Additional Features</h4>
                                            <p class="text-xs text-gray-500">Add dynamic options like "Internal Memory: 1TB, 2TB" or "Model Name: iPhone 17 Pro"</p>
                                        </div>
                                        <button type="button" onclick="addFeatureRow()" class="text-sm bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold py-1.5 px-3 rounded-lg border border-indigo-200 transition">
                                            + Add Feature
                                        </button>
                                    </div>
                                    <div id="features-container" class="space-y-3">
                                        <!-- Dynamic feature rows will be appended here -->
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="bg-gray-900 text-white font-bold py-2.5 px-6 rounded-lg text-sm hover:bg-black transition uppercase tracking-wider shadow-md">
                                    Add Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Product List -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-250">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-650" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75c.621 0 1.125.504 1.125 1.125v1.875c0 .621-.504 1.125-1.125 1.125H5.625A1.125 1.125 0 0 1 4.5 6.75V5.625c0-.621.504-1.125 1.125-1.125Z" />
                            </svg>
                            Your Products
                        </h3>
                        @if(session('success') && (request()->session()->has('modal_open') || request()->session()->get('modal_open') === true))
                            <div class="mb-6 text-green-700 bg-green-50 border border-green-200 p-4 rounded-lg flex items-center shadow-sm">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path></svg>
                                <span class="font-semibold">{{ session('success') }}</span>
                            </div>
                        @endif
                        @if($products->isEmpty())
                            <div class="text-center py-12 text-gray-500 border border-dashed border-gray-200 rounded-lg">
                                <p class="text-md font-semibold">You haven't added any products yet.</p>
                                <p class="text-sm mt-1 text-gray-400">Add a product above to get started.</p>
                            </div>
                        @else
                            <div class="overflow-x-auto -mx-3 sm:mx-0 rounded-lg border border-gray-150">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Image</th>
                                            <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Title</th>
                                            <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Category</th>
                                            <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Price</th>
                                            <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date Added</th>
                                            <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-150">
                                        @foreach($products as $product)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->title }}" class="h-12 w-12 object-cover rounded-lg border border-gray-100 shadow-sm">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                    <a href="{{ route('products.show', $product) }}" class="hover:text-indigo-650 transition">{{ $product->title }}</a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                                        {{ $product->category }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">AED {{ number_format($product->price, 2) }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $product->created_at->format('M d, Y') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex items-center space-x-3">
                                                        <button onclick="openManageImagesModal({{ $product->id }})" class="text-indigo-650 hover:text-indigo-900 transition flex items-center space-x-1 font-bold">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                                                            <span>Manage Images</span>
                                                        </button>
                                                        
                                                        <span class="text-gray-300">|</span>

                                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-650 hover:text-red-900 transition font-bold flex items-center space-x-1">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                                                <span>Delete</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
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

        <!-- Manage Images Modal -->
        <div id="manage-images-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeManageImagesModal()"></div>
                
                <!-- Center modal content -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                
                <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full border border-gray-150">
                    <!-- Modal Header -->
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-250 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900" id="modal-title-text">Manage Product Images</h3>
                        <button onclick="closeManageImagesModal()" class="text-gray-400 hover:text-gray-600 transition focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="p-6 space-y-8 bg-[#FCFBF4]">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Column 1: Cover Image (Separate Management) -->
                            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                                <div>
                                    <h4 class="text-md font-bold text-gray-800 mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-indigo-650" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        Cover Image
                                    </h4>
                                    <p class="text-xs text-gray-505 mb-4">Update the main display image of the product.</p>
                                    
                                    <!-- Current Cover Image Preview -->
                                    <div class="border border-gray-150 rounded-lg p-2 bg-gray-50 flex items-center justify-center h-48 mb-4">
                                        <img id="modal-cover-preview" src="" alt="Current Cover" class="max-h-full max-w-full object-contain">
                                    </div>
                                </div>

                                <!-- Update Cover Image Form -->
                                <form id="modal-cover-form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <label class="cursor-pointer bg-[#eef2ff] hover:bg-[#e0e7ff] text-[#4f46e5] px-4 py-2 rounded-lg text-sm font-semibold transition border border-transparent shadow-sm mr-3 shrink-0">
                                                Choose Cover
                                                <input type="file" name="image" class="hidden" onchange="updateFileName(this, 'modal-cover-filename')" required>
                                            </label>
                                            <span id="modal-cover-filename" class="text-xs text-gray-505 truncate">No file chosen</span>
                                        </div>
                                        <button type="submit" class="w-full bg-gray-900 text-white font-bold py-2 rounded-lg text-xs hover:bg-black transition uppercase tracking-wider">
                                            Update Cover Image
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Column 2: Additional Images (Separate Management) -->
                            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                                <div>
                                    <h4 class="text-md font-bold text-gray-800 mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-indigo-650" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        Gallery Images
                                    </h4>
                                    <p class="text-xs text-gray-550 mb-4">View, remove, or append additional images to the product.</p>

                                    <!-- Grid of current additional images with remove overlay -->
                                    <div id="modal-gallery-container" class="grid grid-cols-3 gap-2 h-48 overflow-y-auto mb-4 border border-gray-150 rounded-lg p-2 bg-gray-50 align-content-start">
                                        <!-- Dynamically populated -->
                                    </div>
                                </div>

                                <!-- Add Images Form -->
                                <form id="modal-gallery-form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <label class="cursor-pointer bg-[#eef2ff] hover:bg-[#e0e7ff] text-[#4f46e5] px-4 py-2 rounded-lg text-sm font-semibold transition border border-transparent shadow-sm mr-3 shrink-0">
                                                Choose Images
                                                <input type="file" name="additional_images[]" multiple class="hidden" onchange="updateFileNames(this, 'modal-gallery-filenames')" required>
                                            </label>
                                            <span id="modal-gallery-filenames" class="text-xs text-gray-505 truncate">No files chosen</span>
                                        </div>
                                        <button type="submit" class="w-full bg-gray-900 text-white font-bold py-2 rounded-lg text-xs hover:bg-black transition uppercase tracking-wider">
                                            Add Gallery Images
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var quill = new Quill('#quill-editor', {
                theme: 'snow',
                modules: {
                    toolbar: {
                        container: [
                            [{ 'header': [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            ['link', 'image']
                        ],
                        handlers: {
                            image: imageHandler
                        }
                    }
                }
            });

            function imageHandler() {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();

                input.onchange = function() {
                    var file = input.files[0];
                    if (file) {
                        var formData = new FormData();
                        formData.append('image', file);
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

                        fetch('{{ route("products.upload_image") }}', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.url) {
                                var range = quill.getSelection(true);
                                quill.insertEmbed(range.index, 'image', result.url);
                            } else {
                                alert('Upload failed');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Upload failed');
                        });
                    }
                };
            }

            document.getElementById('add-product-form').addEventListener('submit', function(e) {
                var html = quill.root.innerHTML;
                if(html === '<p><br></p>') html = '';
                document.getElementById('description_hidden').value = html;
            });
            
            const productsData = @json($products->keyBy('id'));

            function openManageImagesModal(productId) {
                const product = productsData[productId];
                if (!product) return;

                // Set title
                document.getElementById('modal-title-text').innerText = `Manage Images - ${product.title}`;

                // Set cover form action and current cover preview
                document.getElementById('modal-cover-form').action = `/products/${productId}/cover`;
                document.getElementById('modal-cover-preview').src = `/storage/${product.image_path}`;
                document.getElementById('modal-cover-filename').innerText = "No file chosen";

                // Set gallery form action and file label
                document.getElementById('modal-gallery-form').action = `/products/${productId}/images`;
                document.getElementById('modal-gallery-filenames').innerText = "No files chosen";

                // Populate gallery images
                const container = document.getElementById('modal-gallery-container');
                container.innerHTML = '';

                const images = product.images || [];
                if (images.length === 0) {
                    container.innerHTML = `
                        <div class="col-span-3 flex flex-col items-center justify-center text-center text-gray-400 py-10">
                            <svg class="w-8 h-8 mb-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs">No gallery images</span>
                        </div>
                    `;
                } else {
                    images.forEach(img => {
                        const item = document.createElement('div');
                        item.className = 'relative aspect-square border border-gray-200 rounded-lg overflow-hidden bg-white group flex items-center justify-center';
                        item.innerHTML = `
                            <img src="/storage/${img}" class="max-h-full max-w-full object-contain p-1">
                            <!-- Delete Form overlay -->
                            <form action="/products/${productId}/images" method="POST" onsubmit="return confirm('Remove this image?')" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="image" value="${img}">
                                <button type="submit" class="bg-red-600 hover:bg-red-750 text-white rounded-full p-1.5 shadow transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        `;
                        container.appendChild(item);
                    });
                }

                // Show modal
                document.getElementById('manage-images-modal').classList.remove('hidden');
            }

            function closeManageImagesModal() {
                document.getElementById('manage-images-modal').classList.add('hidden');
            }

            function updateFileName(input, targetId) {
                const file = input.files[0];
                document.getElementById(targetId).innerText = file ? file.name : "No file chosen";
            }

            function updateFileNames(input, targetId) {
                const files = input.files;
                document.getElementById(targetId).innerText = files.length > 0 
                    ? `${files.length} file(s) selected` 
                    : "No file chosen";
            }

            function addFeatureRow() {
                const container = document.getElementById('features-container');
                const row = document.createElement('div');
                row.className = 'flex items-start space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-200';
                row.innerHTML = `
                    <div class="flex-1">
                        <input type="text" name="feature_names[]" placeholder="Feature Name (e.g. Internal Memory)" class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded shadow-sm mb-2" required>
                        <input type="text" name="feature_options[]" placeholder="Options (comma separated, e.g. 1 TB, 2 TB)" class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded shadow-sm" required>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 p-2 focus:outline-none bg-white rounded border border-gray-200 shadow-sm mt-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                `;
                container.appendChild(row);
            }
        </script>
    @else
        {{-- BUYER VIEW --}}
        
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
                <div class="flex items-center space-x-2 sm:space-x-5 shrink-0">
                    <!-- emall Logo -->
                    <a href="{{ route('dashboard') }}" class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tighter text-black lowercase leading-none hover:opacity-85 transition">emall</a>
                    <!-- Location -->
                    <div class="hidden md:flex items-center text-sm font-semibold text-gray-900 cursor-pointer space-x-1">
                        <svg class="w-4 h-4 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <span class="text-xs sm:text-sm">Other • LK</span>
                        <svg class="w-3.5 h-3.5 text-gray-650" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 min-w-0 max-w-[650px] mx-2 sm:mx-4 lg:mx-8">
                    <div class="w-full bg-white rounded-full flex items-center px-3 py-2 border border-transparent focus-within:border-gray-200 overflow-hidden">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-500 mr-2 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1110.5 2.5a7.5 7.5 0 0110.602 10.602z"></path>
                        </svg>
                        <input type="text" placeholder="Search..." class="w-full bg-transparent border-none focus:border-none focus:ring-0 focus:ring-offset-0 focus:outline-none p-0 text-gray-900 placeholder-[#5A738E] text-sm font-normal shadow-none focus:shadow-none" style="border: none !important; outline: none !important; box-shadow: none !important;">
                    </div>
                </div>

                <!-- Mobile: Cart icon + hamburger -->
                <div class="flex items-center space-x-2 lg:hidden shrink-0">
                    <a href="{{ route('cart.index') }}" class="relative p-1.5">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="absolute -top-0.5 -right-0.5 bg-red-500 text-white text-[8px] font-bold px-1 py-0.5 rounded-full leading-none min-w-[14px] text-center border border-yellow-300">
                                {{ array_reduce(session('cart'), function($carry, $item) { return $carry + $item['quantity']; }, 0) }}
                            </span>
                        @endif
                    </a>
                    <button id="buyer-mobile-menu-btn" onclick="document.getElementById('buyer-mobile-drawer').classList.toggle('hidden')" class="p-1.5 rounded-lg text-gray-800 hover:bg-yellow-400 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>

                <!-- Top Right Nav (desktop) -->
                <div class="hidden lg:flex items-center space-x-5 text-sm font-semibold text-gray-900 shrink-0">
                    @guest
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('login') }}" class="flex items-center cursor-pointer hover:text-gray-700 transition space-x-1.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg> 
                                <span>Log in</span>
                            </a>
                            <span class="text-gray-300">|</span>
                            <a href="{{ route('register') }}" class="hover:text-orange-600 transition font-bold text-[#e65c00]"><span>Sign Up</span></a>
                        </div>
                    @else
                        <a href="{{ route('profile.edit') }}" class="flex items-center cursor-pointer hover:text-gray-700 transition space-x-1.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg> 
                            <span class="truncate max-w-[120px]">{{ Auth::user()->name }}</span>
                        </a>
                    @endguest
                    <a href="{{ route('orders.index') }}" class="flex items-center cursor-pointer hover:text-gray-700 transition space-x-1.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg> 
                        <span>Orders</span>
                    </a>
                    <div class="flex items-center cursor-pointer hover:text-gray-700 transition space-x-1.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg> 
                        <span>Wishlist</span>
                    </div>
                    <a href="{{ route('cart.index') }}" class="flex items-center cursor-pointer hover:text-gray-700 transition space-x-1.5 relative">
                        <div class="relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
                    @auth
                    @if(auth()->user()->role === 'vendor')
                        <a href="{{ route('dashboard') }}" class="flex items-center cursor-pointer text-[#e65c00] hover:text-orange-700 transition font-semibold border border-[#e65c00] rounded-full px-3 py-1">Vendor Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="flex items-center cursor-pointer text-[#e65c00] hover:text-red-700 transition font-semibold">Log out</button>
                    </form>
                    @endauth
                </div>
            </div>
            <!-- Mobile Drawer -->
            <div id="buyer-mobile-drawer" class="hidden lg:hidden bg-[#FEE000] border-t border-yellow-400 px-4 py-3 space-y-1 shadow-md">
                @guest
                    <a href="{{ route('login') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-black/5 hover:bg-black/10 text-sm font-bold text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                        <span>Log in</span>
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-black/5 hover:bg-black/10 text-sm font-bold text-[#e65c00]">
                        <span>Sign Up</span>
                    </a>
                @else
                    <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-black/5 hover:bg-black/10 text-sm font-bold text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <a href="{{ route('orders.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-black/5 hover:bg-black/10 text-sm font-bold text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" /></svg>
                        <span>Orders</span>
                    </a>
                    @if(auth()->user()->role === 'vendor')
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-black/5 hover:bg-black/10 text-sm font-bold text-[#e65c00]">
                            <span>Vendor Dashboard</span>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-lg bg-black/5 hover:bg-black/10 text-sm font-bold text-[#e65c00]">
                            <span>Log out</span>
                        </button>
                    </form>
                @endguest
            </div>
        </div>

        <!-- Categories Bar -->
        <div class="bg-white border-b border-gray-200 w-full relative z-40">
            <div class="max-w-[1400px] mx-auto px-4 sm:px-6 flex items-center justify-between">
                <!-- Left Section: Category list with arrows -->
                <div class="flex items-center flex-1 min-w-0 relative">
                    <!-- Left Chevron -->
                    <button onclick="scrollCategories(-200)" class="text-gray-400 hover:text-gray-600 px-1 border-r border-gray-200 pr-2 mr-3 shrink-0 py-3">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
                    </button>
                    
                    <!-- Category links -->
                    <div id="categoryScroll" class="flex items-center space-x-6 text-sm font-semibold text-gray-800 overflow-x-auto scrollbar-none py-3">
                        <a href="#" class="hover:text-blue-600 transition">Electronics</a>
                        <a href="#" class="hover:text-blue-600 transition">Beauty & Fragrance</a>
                        <a href="#" class="hover:text-blue-600 transition">Home & Kitchen</a>
                        <a href="#" class="hover:text-blue-600 transition">Grocery</a>
                        <a href="#" class="hover:text-blue-600 transition">Men's Fashion</a>
                        <a href="#" class="hover:text-blue-600 transition">Women's Fashion</a>
                        <a href="#" class="hover:text-blue-600 transition">Baby</a>
                        <a href="#" class="hover:text-blue-600 transition">Toys</a>
                        <a href="#" class="hover:text-blue-600 transition">Kids' Fashion</a>
                        <a href="#" class="hover:text-blue-600 transition flex items-center pr-4">Sports & Outdoors</a>
                    </div>

                    <!-- Right Chevron -->
                    <button onclick="scrollCategories(200)" class="text-gray-400 hover:text-gray-600 px-1 border-l border-gray-200 pl-2 ml-3 shrink-0 py-3">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
                    </button>
                </div>

                <!-- Right Section: Free Delivery Badge -->
                <div class="hidden lg:flex items-center shrink-0 ml-4 py-1.5">
                    <div class="flex items-center border border-red-500 rounded-full px-3 py-1 bg-gradient-to-r from-yellow-50 to-red-50 cursor-pointer">
                        <span class="text-sm font-bold text-gray-800 mr-2">Get <span class="font-extrabold text-black">Free Delivery</span> with emall</span>
                        <span class="bg-[#F57C00] text-white text-[11px] font-black italic px-2 py-0.5 rounded-full shadow-sm">one</span>
                        <svg class="w-3 h-3 ml-1 text-red-505" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function scrollCategories(amount) {
                const container = document.getElementById('categoryScroll');
                if (container) {
                    container.scrollBy({ left: amount, behavior: 'smooth' });
                }
            }
        </script>

        <!-- Main Content -->
        <div class="max-w-[1400px] mx-auto p-3 sm:p-4 md:p-8 bg-[#FCFBF4] min-h-screen border-l border-r border-gray-200">
            @if(session('success'))
                <div class="mb-6 text-green-700 bg-green-50 border border-green-200 p-4 rounded-lg flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path></svg>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            @endif
            <h2 class="text-xl md:text-2xl font-bold mb-6 text-gray-850">Recommended for you</h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:gap-3">
                @foreach($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="block no-underline">
                        <div class="bg-white rounded-lg p-3 hover:shadow-xl transition-all duration-300 relative flex flex-col group border border-gray-200 cursor-pointer hover:-translate-y-1">
                            <!-- Best Seller Tag -->
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
                                        <div class="bg-[#243BB9] text-white text-[11px] font-bold px-2 py-1.5 rounded inline-flex w-full items-center justify-between tracking-wider shadow-sm group-hover:bg-[#1C2C8C] transition-colors mb-2">
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
                    </a>
                @endforeach
            </div>
            
            @if($products->isEmpty())
                <div class="text-center py-28 text-gray-500 bg-white rounded-lg mt-4 border border-gray-200 flex flex-col justify-center items-center w-full">
                    <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                    <p class="text-xl font-bold text-gray-900 mb-1">No products available yet</p>
                    <p class="text-sm text-gray-500">Check back later for exciting offers!</p>
                </div>
            @endif
        </div>
    @endif
</x-app-layout>
