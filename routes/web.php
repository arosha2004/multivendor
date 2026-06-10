<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    $products = Product::latest()->get();
    return view('dashboard', compact('products'));
});

// Buyer homepage — always shows the buyer-facing storefront, even for vendors
Route::get('/buyer-home', function () {
    $products = Product::latest()->get();
    return view('dashboard', [
        'products' => $products,
        'force_buyer_view' => true
    ]);
})->middleware('auth')->name('buyer.home');

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'vendor') {
        $products = $user->products()->latest()->get();
        return view('dashboard', compact('products'));
    } else {
        $products = Product::latest()->get();
        return view('dashboard', compact('products'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::post('/products/upload-image', [ProductController::class, 'uploadImage'])->name('products.upload_image');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/vendor/{id}/store', [ProductController::class, 'vendorStore'])->name('vendor.store');
    Route::patch('/products/{product}/cover', [ProductController::class, 'updateCover'])->name('products.update-cover');
    Route::post('/products/{product}/images', [ProductController::class, 'addImages'])->name('products.add-images');
    Route::delete('/products/{product}/images', [ProductController::class, 'deleteImage'])->name('products.delete-image');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/vendor/products', [ProductController::class, 'vendorIndex'])->name('vendor.products');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

require __DIR__.'/auth.php';

