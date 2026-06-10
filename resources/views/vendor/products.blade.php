<x-app-layout>
    {{-- Vendor Header --}}
    <div class="bg-white border-b border-gray-200 shadow-sm relative z-50">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left: Logo & Title -->
                <div class="flex items-center space-x-3 sm:space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-2xl sm:text-3xl font-extrabold tracking-tighter text-black lowercase leading-none hover:opacity-80 transition">emall</a>
                    <div class="hidden sm:block h-6 w-px bg-gray-200"></div>
                    <div class="hidden sm:flex items-center">
                        <span class="bg-gray-900 text-white text-xs font-bold px-3 py-1 rounded-md uppercase tracking-wider shadow-sm">
                            My Catalog
                        </span>
                    </div>
                </div>
                
                <!-- Right: Actions (desktop) -->
                <div class="hidden md:flex items-center space-x-3">
                    <!-- Dashboard Link -->
                    <a href="{{ route('dashboard') }}" class="flex bg-white hover:bg-gray-50 text-gray-700 px-3 py-2 rounded-full text-sm font-bold transition items-center space-x-2 border border-gray-200 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Add Product</span>
                    </a>

                    <!-- Switch to Buyer View -->
                    <a href="{{ route('buyer.home') }}" class="flex bg-white hover:bg-gray-50 text-gray-700 px-3 py-2 rounded-full text-sm font-bold transition items-center space-x-2 border border-gray-200 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>Buyer View</span>
                    </a>
                    
                    <div class="h-6 w-px bg-gray-200"></div>
                    
                    <!-- Profile Edit -->
                    <a href="{{ route('profile.edit') }}" class="p-2 rounded-full hover:bg-gray-100 text-gray-500 hover:text-gray-900 transition" title="Edit Profile">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </a>
                    
                    <!-- Logout -->
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
                <button id="catalog-mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition" onclick="document.getElementById('catalog-mobile-drawer').classList.toggle('hidden')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
        <!-- Mobile Drawer -->
        <div id="catalog-mobile-drawer" class="hidden md:hidden bg-white border-t border-gray-200 px-4 py-3 space-y-2 shadow-md">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-gray-50 text-sm font-semibold text-gray-700">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                <span>Add Product</span>
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

    {{-- Main Content --}}
    <div class="max-w-[1400px] mx-auto p-3 sm:p-4 md:p-8 bg-[#FCFBF4] min-h-screen border-l border-r border-gray-200">
        <div class="space-y-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Centralized Product Catalog</h2>
                <p class="text-sm text-gray-500 mt-1">A centralized view of all products, descriptions, and media uploaded by your vendor account.</p>
            </div>

            @if(session('success'))
                <div class="text-green-700 bg-green-50 border border-green-200 p-4 rounded-lg flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path></svg>
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            @if($products->isEmpty())
                <div class="text-center py-24 bg-white rounded-xl border border-gray-200">
                    <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.008 1.24l.885 1.77a2.25 2.25 0 0 0 2.007 1.24h1.98a2.25 2.25 0 0 0 2.007-1.24l.885-1.77a2.25 2.25 0 0 1 2.007-1.24h3.86m-18 0h18" />
                    </svg>
                    <h3 class="text-lg font-bold text-gray-900">No products found</h3>
                    <p class="text-sm text-gray-500 mt-1">You haven't uploaded any products yet.</p>
                    <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-gray-900 hover:bg-black text-white font-semibold py-2 px-5 rounded-lg text-sm transition">
                        Add Your First Product
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($products as $product)
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm flex flex-col hover:shadow-md transition-shadow">
                            <!-- Product Image / Banner -->
                            <div class="relative h-60 bg-gray-50 flex items-center justify-center p-4 border-b border-gray-100">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->title }}" class="max-h-full max-w-full object-contain">
                                <span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-955 text-white shadow-sm" style="background-color: #312E81;">
                                    {{ $product->category }}
                                </span>
                            </div>

                            <!-- Product Info -->
                            <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                                <div class="space-y-2">
                                    <div class="flex justify-between items-start gap-2">
                                        <h3 class="text-md font-bold text-gray-900 leading-snug line-clamp-2">{{ $product->title }}</h3>
                                        <span class="text-md font-extrabold text-indigo-700 whitespace-nowrap">LKR {{ number_format($product->price, 2) }}</span>
                                    </div>
                                    
                                    @if($product->description)
                                        <p class="text-xs text-gray-600 line-clamp-4 bg-gray-50 p-2.5 rounded border border-gray-100 whitespace-normal">{!! Str::limit(strip_tags($product->description), 150) !!}</p>
                                    @else
                                        <p class="text-xs italic text-gray-400">No description provided.</p>
                                    @endif
                                </div>

                                <!-- Gallery Thumbnail Strip -->
                                @if(!empty($product->images) && count($product->images) > 0)
                                    <div>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Gallery ({{ count($product->images) }})</p>
                                        <div class="flex items-center gap-2 overflow-x-auto pb-1">
                                            @foreach($product->images as $img)
                                                <div class="w-10 h-10 border border-gray-200 rounded overflow-hidden bg-gray-50 shrink-0 flex items-center justify-center">
                                                    <img src="{{ asset('storage/' . $img) }}" class="max-h-full max-w-full object-contain p-0.5">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Actions -->
                                <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs font-bold">
                                    <div class="flex items-center space-x-3">
                                        <button onclick="openEditDetailsModal({{ $product->id }})" class="text-indigo-650 hover:text-indigo-900 transition flex items-center space-x-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            <span>Edit Details</span>
                                        </button>
                                        <span class="text-gray-300">|</span>
                                        <button onclick="openManageImagesModal({{ $product->id }})" class="text-indigo-650 hover:text-indigo-900 transition flex items-center space-x-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            <span>Manage Images</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-655 hover:text-red-900 transition flex items-center space-x-0.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Edit Details Modal -->
    <div id="edit-details-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeEditDetailsModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-150">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-250 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900">Edit Product Details</h3>
                    <button onclick="closeEditDetailsModal()" class="text-gray-400 hover:text-gray-600 transition focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <form id="edit-details-form" action="" method="POST" class="p-6 space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div>
                        <x-input-label for="edit-title" value="Product Title" class="font-semibold" />
                        <x-text-input id="edit-title" name="title" type="text" class="mt-1.5 block w-full" required />
                    </div>

                    <div>
                        <x-input-label for="edit-category" value="Category" class="font-semibold" />
                        <select id="edit-category" name="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm mt-1.5 block w-full" required>
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
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="edit-price" value="Price (LKR)" class="font-semibold" />
                            <x-text-input id="edit-price" name="price" type="number" step="0.01" class="mt-1.5 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="edit-original_price" value="Original Price" class="font-semibold" />
                            <x-text-input id="edit-original_price" name="original_price" type="number" step="0.01" class="mt-1.5 block w-full" />
                        </div>
                    </div>

                    <div class="mb-6">
                        <x-input-label for="edit-description" value="Product Description" class="font-semibold" />
                        <input type="hidden" name="description" id="edit-description_hidden">
                        <div id="edit-quill-editor" class="mt-1.5 bg-white rounded-b-lg border-gray-300" style="min-height: 160px; height: auto;"></div>
                    </div>

                    <div class="border-t border-gray-100 pt-6 mt-4">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <h4 class="font-bold text-gray-800 text-base">Additional Features</h4>
                            </div>
                            <button type="button" onclick="addEditFeatureRow()" class="text-sm bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold py-1.5 px-3 rounded-lg border border-indigo-200 transition">
                                + Add Feature
                            </button>
                        </div>
                        <div id="edit-features-container" class="space-y-3">
                            <!-- Dynamic feature rows will be appended here -->
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end space-x-3">
                        <button type="button" onclick="closeEditDetailsModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-lg text-sm transition">Cancel</button>
                        <button type="submit" class="bg-gray-900 hover:bg-black text-white font-semibold px-4 py-2 rounded-lg text-sm transition">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Manage Images Modal -->
    <div id="manage-images-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeManageImagesModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full border border-gray-150">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-250 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900" id="modal-title-text">Manage Product Images</h3>
                    <button onclick="closeManageImagesModal()" class="text-gray-400 hover:text-gray-600 transition focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                
                <div class="p-6 space-y-8 bg-[#FCFBF4]">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Column 1: Cover Image -->
                        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                            <div>
                                <h4 class="text-md font-bold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-indigo-650" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Cover Image
                                </h4>
                                <p class="text-xs text-gray-505 mb-4">Update the main display image of the product.</p>
                                <div class="border border-gray-150 rounded-lg p-2 bg-gray-50 flex items-center justify-center h-48 mb-4">
                                    <img id="modal-cover-preview" src="" alt="Current Cover" class="max-h-full max-w-full object-contain">
                                </div>
                            </div>

                            <form id="modal-cover-form" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <label class="cursor-pointer bg-[#eef2ff] hover:bg-[#e0e7ff] text-[#4f46e5] px-4 py-2 rounded-lg text-sm font-semibold transition border border-transparent shadow-sm mr-3 shrink-0">
                                            Choose Cover
                                            <input type="file" name="image" class="hidden" onchange="updateFileName(this, 'modal-cover-filename')" required>
                                        </label>
                                        <span id="modal-cover-filename" class="text-xs text-gray-550 truncate">No file chosen</span>
                                    </div>
                                    <button type="submit" class="w-full bg-gray-900 text-white font-bold py-2 rounded-lg text-xs hover:bg-black transition uppercase tracking-wider">
                                        Update Cover Image
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Column 2: Gallery Images -->
                        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
                            <div>
                                <h4 class="text-md font-bold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-indigo-650" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Gallery Images
                                </h4>
                                <p class="text-xs text-gray-550 mb-4">View, remove, or append additional images to the product.</p>
                                <div id="modal-gallery-container" class="grid grid-cols-3 gap-2 h-48 overflow-y-auto mb-4 border border-gray-150 rounded-lg p-2 bg-gray-50 align-content-start"></div>
                            </div>

                            <form id="modal-gallery-form" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <label class="cursor-pointer bg-[#eef2ff] hover:bg-[#e0e7ff] text-[#4f46e5] px-4 py-2 rounded-lg text-sm font-semibold transition border border-transparent shadow-sm mr-3 shrink-0">
                                            Choose Images
                                            <input type="file" name="additional_images[]" multiple class="hidden" onchange="updateFileNames(this, 'modal-gallery-filenames')" required>
                                        </label>
                                        <span id="modal-gallery-filenames" class="text-xs text-gray-550 truncate">No files chosen</span>
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
        var quillEdit = new Quill('#edit-quill-editor', {
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
                        image: editImageHandler
                    }
                }
            }
        });

        function editImageHandler() {
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
                            var range = quillEdit.getSelection(true);
                            quillEdit.insertEmbed(range.index, 'image', result.url);
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

        document.getElementById('edit-details-form').addEventListener('submit', function(e) {
            var html = quillEdit.root.innerHTML;
            if(html === '<p><br></p>') html = '';
            document.getElementById('edit-description_hidden').value = html;
        });
        
        const productsData = @json($products->keyBy('id'));

        function openEditDetailsModal(productId) {
            const product = productsData[productId];
            if (!product) return;

            document.getElementById('edit-details-form').action = `/products/${productId}`;
            document.getElementById('edit-title').value = product.title;
            document.getElementById('edit-category').value = product.category;
            document.getElementById('edit-price').value = product.price;
            document.getElementById('edit-original_price').value = product.original_price || '';
            
            quillEdit.root.innerHTML = product.description || '';
            document.getElementById('edit-description_hidden').value = product.description || '';

            const featuresContainer = document.getElementById('edit-features-container');
            featuresContainer.innerHTML = '';
            if (product.features && product.features.length > 0) {
                product.features.forEach(feature => {
                    addEditFeatureRow(feature.name, feature.options.join(', '));
                });
            }

            document.getElementById('edit-details-modal').classList.remove('hidden');
        }

        // Keep modal scroll position track in query session if needed
        function closeEditDetailsModal() {
            document.getElementById('edit-details-modal').classList.add('hidden');
        }

        function openManageImagesModal(productId) {
            const product = productsData[productId];
            if (!product) return;

            document.getElementById('modal-title-text').innerText = `Manage Images - ${product.title}`;
            document.getElementById('modal-cover-form').action = `/products/${productId}/cover`;
            document.getElementById('modal-cover-preview').src = `/storage/${product.image_path}`;
            document.getElementById('modal-cover-filename').innerText = "No file chosen";

            document.getElementById('modal-gallery-form').action = `/products/${productId}/images`;
            document.getElementById('modal-gallery-filenames').innerText = "No files chosen";

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

        function addEditFeatureRow(name = '', options = '') {
            const container = document.getElementById('edit-features-container');
            const row = document.createElement('div');
            row.className = 'flex items-start space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-200';
            
            // Escape quotes in values to prevent HTML injection issues
            const safeName = name.replace(/"/g, '&quot;');
            const safeOptions = options.replace(/"/g, '&quot;');
            
            row.innerHTML = `
                <div class="flex-1">
                    <input type="text" name="feature_names[]" value="${safeName}" placeholder="Feature Name (e.g. Internal Memory)" class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded shadow-sm mb-2" required>
                    <input type="text" name="feature_options[]" value="${safeOptions}" placeholder="Options (comma separated, e.g. 1 TB, 2 TB)" class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded shadow-sm" required>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 p-2 focus:outline-none bg-white rounded border border-gray-200 shadow-sm mt-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                </button>
            `;
            container.appendChild(row);
        }
    </script>
</x-app-layout>
