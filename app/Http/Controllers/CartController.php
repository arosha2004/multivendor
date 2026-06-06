<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'image_path' => $product->image_path,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        if($id && $request->quantity) {
            $cart = session()->get('cart');
            
            if(isset($cart[$id])) {
                $cart[$id]['quantity'] = max(1, (int)$request->quantity); // ensure at least 1
                session()->put('cart', $cart);
            }
            
            return redirect()->back()->with('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request, $id)
    {
        if($id) {
            $cart = session()->get('cart');
            
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            
            return redirect()->back()->with('success', 'Product removed successfully');
        }
    }
}
