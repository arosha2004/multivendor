<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'vendor') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'original_price' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        // Generate random values for aesthetics matching noon.com
        $rating = rand(35, 50) / 10; // 3.5 to 5.0
        $reviewsCount = rand(50, 50000);
        $isBestSeller = rand(0, 100) > 70; // 30% chance to be best seller
        $deliveryBadge = 'GET IT NOW';

        auth()->user()->products()->create([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'image_path' => $imagePath,
            'rating' => $rating,
            'reviews_count' => $reviewsCount,
            'is_best_seller' => $isBestSeller,
            'delivery_badge' => $deliveryBadge,
        ]);

        return redirect()->route('dashboard')->with('success', 'Product added successfully.');
    }
}
