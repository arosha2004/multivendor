<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'vendor_id',
        'title',
        'price',
        'original_price',
        'image_path',
        'category',
        'rating',
        'reviews_count',
        'is_best_seller',
        'delivery_badge',
        'description',
        'images',
        'features',
    ];

    protected $casts = [
        'images' => 'array',
        'features' => 'array',
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
