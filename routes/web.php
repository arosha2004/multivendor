<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    $products = Product::latest()->get();
    return view('dashboard', compact('products'));
});

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
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::patch('/products/{product}/cover', [ProductController::class, 'updateCover'])->name('products.update-cover');
    Route::post('/products/{product}/images', [ProductController::class, 'addImages'])->name('products.add-images');
    Route::delete('/products/{product}/images', [ProductController::class, 'deleteImage'])->name('products.delete-image');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/vendor/products', [ProductController::class, 'vendorIndex'])->name('vendor.products');
});

require __DIR__.'/auth.php';
