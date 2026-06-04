<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display the user's orders page.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        
        // Fetch a few real products from the database to inject into the mock orders list
        $dbProducts = Product::limit(3)->get();
        
        $mockOrders = [];
        if ($dbProducts->isNotEmpty()) {
            foreach ($dbProducts as $index => $prod) {
                $status = $index === 0 ? 'Delivered' : ($index === 1 ? 'Processing' : 'Returned');
                $daysAgo = ($index + 1) * 3;
                $mockOrders[] = [
                    'order_number' => 'noon-' . (48293849 + $index),
                    'placed_at' => now()->subDays($daysAgo)->format('M d, Y'),
                    'total' => 'AED ' . number_format($prod->price, 2),
                    'payment_method' => $index === 0 ? 'Visa •••• 4242' : 'Cash on Delivery',
                    'status' => $status,
                    'delivery_date' => $status === 'Delivered' ? now()->subDays($daysAgo - 2)->format('M d, Y') : null,
                    'items' => [
                        [
                            'title' => $prod->title,
                            'price' => 'AED ' . number_format($prod->price, 2),
                            'qty' => 1,
                            'image_url' => asset('storage/' . $prod->image_path),
                            'product_id' => $prod->id,
                        ]
                    ]
                ];
            }
        } else {
            // Fallback mock orders if DB has no products
            $mockOrders = [
                [
                    'order_number' => 'noon-93849182',
                    'placed_at' => now()->subDays(5)->format('M d, Y'),
                    'total' => 'AED 249.00',
                    'payment_method' => 'Visa •••• 4242',
                    'status' => 'Delivered',
                    'delivery_date' => now()->subDays(3)->format('M d, Y'),
                    'items' => [
                        [
                            'title' => 'Sony WH-1000XM4 Wireless Noise Cancelling Headphones',
                            'price' => 'AED 249.00',
                            'qty' => 1,
                            'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&auto=format&fit=crop&q=60',
                            'product_id' => '#',
                        ]
                    ]
                ],
                [
                    'order_number' => 'noon-82740192',
                    'placed_at' => now()->subDays(12)->format('M d, Y'),
                    'total' => 'AED 125.00',
                    'payment_method' => 'Cash on Delivery',
                    'status' => 'Returned',
                    'delivery_date' => now()->subDays(10)->format('M d, Y'),
                    'items' => [
                        [
                            'title' => 'Electric French Press Coffee Maker - 1L',
                            'price' => 'AED 125.00',
                            'qty' => 1,
                            'image_url' => 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=200&auto=format&fit=crop&q=60',
                            'product_id' => '#',
                        ]
                    ]
                ]
            ];
        }

        return view('orders', compact('user', 'mockOrders'));
    }
}
