<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
            'description' => 'nullable|string',
            'additional_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        $additionalImages = [];
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $additionalImages[] = $file->store('products', 'public');
            }
        }

        // Generate random values for aesthetics matching noon.com
        $rating = rand(35, 50) / 10; // 3.5 to 5.0
        $reviewsCount = rand(50, 50000);
        $isBestSeller = rand(0, 100) > 70; // 30% chance to be best seller
        $deliveryBadge = 'GET IT NOW';

        $features = [];
        if ($request->has('feature_names') && $request->has('feature_options')) {
            $names = $request->input('feature_names');
            $options = $request->input('feature_options');
            if (is_array($names) && is_array($options)) {
                foreach ($names as $index => $name) {
                    if (!empty($name) && !empty($options[$index])) {
                        $opts = array_map('trim', explode(',', $options[$index]));
                        $opts = array_filter($opts, fn($value) => !is_null($value) && $value !== '');
                        if (!empty($opts)) {
                            $features[] = [
                                'name' => $name,
                                'options' => array_values($opts)
                            ];
                        }
                    }
                }
            }
        }

        auth()->user()->products()->create([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'description' => $request->description,
            'image_path' => $imagePath,
            'images' => $additionalImages,
            'rating' => $rating,
            'reviews_count' => $reviewsCount,
            'is_best_seller' => $isBestSeller,
            'delivery_badge' => $deliveryBadge,
            'features' => $features,
        ]);

        return redirect()->route('dashboard')->with('success', 'Product added successfully.');
    }

    public function show(Product $product)
    {
        $product->load('vendor');
        return view('products.show', compact('product'));
    }

    public function updateCover(Request $request, Product $product)
    {
        if (auth()->user()->id !== $product->vendor_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Delete old cover image
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        // Store new cover image
        $imagePath = $request->file('image')->store('products', 'public');

        $product->update([
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Cover image updated successfully.');
    }

    public function addImages(Request $request, Product $product)
    {
        if (auth()->user()->id !== $product->vendor_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'additional_images' => 'required|array',
            'additional_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $currentImages = $product->images ?? [];
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $currentImages[] = $file->store('products', 'public');
            }
        }

        $product->update([
            'images' => $currentImages,
        ]);

        return redirect()->back()->with('success', 'Additional images uploaded successfully.');
    }

    public function deleteImage(Request $request, Product $product)
    {
        if (auth()->user()->id !== $product->vendor_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'image' => 'required|string',
        ]);

        $imageToDelete = $request->image;
        $currentImages = $product->images ?? [];

        if (($key = array_search($imageToDelete, $currentImages)) !== false) {
            unset($currentImages[$key]);

            if (Storage::disk('public')->exists($imageToDelete)) {
                Storage::disk('public')->delete($imageToDelete);
            }

            $product->update([
                'images' => array_values($currentImages),
            ]);
        }

        return redirect()->back()->with('success', 'Image removed successfully.');
    }

    public function destroy(Product $product)
    {
        if (auth()->user()->id !== $product->vendor_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        if (!empty($product->images)) {
            foreach ($product->images as $img) {
                if (Storage::disk('public')->exists($img)) {
                    Storage::disk('public')->delete($img);
                }
            }
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function update(Request $request, Product $product)
    {
        if (auth()->user()->id !== $product->vendor_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'original_price' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        $features = [];
        if ($request->has('feature_names') && $request->has('feature_options')) {
            $names = $request->input('feature_names');
            $options = $request->input('feature_options');
            if (is_array($names) && is_array($options)) {
                foreach ($names as $index => $name) {
                    if (!empty($name) && !empty($options[$index])) {
                        $opts = array_map('trim', explode(',', $options[$index]));
                        $opts = array_filter($opts, fn($value) => !is_null($value) && $value !== '');
                        if (!empty($opts)) {
                            $features[] = [
                                'name' => $name,
                                'options' => array_values($opts)
                            ];
                        }
                    }
                }
            }
        }

        $product->update([
            'title' => $request->title,
            'category' => $request->category,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'description' => $request->description,
            'features' => $features,
        ]);

        return redirect()->back()->with('success', 'Product details updated successfully.');
    }

    public function vendorIndex()
    {
        if (auth()->user()->role !== 'vendor') {
            abort(403, 'Unauthorized action.');
        }
        $products = auth()->user()->products()->latest()->get();
        return view('vendor.products', compact('products'));
    }

    public function vendorStore($id)
    {
        $vendor = \App\Models\User::findOrFail($id);
        $products = $vendor->products()->latest()->get();
        return view('vendor.store', compact('vendor', 'products'));
    }
}
