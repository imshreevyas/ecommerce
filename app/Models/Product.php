<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_uid', 'category_uid', 'title', 'slug', 'description', 'short_desc',
        'mrp', 'discount', 'selling_price', 'available_qty', 'sku',
        'image', 'additional_images', 'stock_status', 'is_featured',
        'weight', 'seo_title', 'seo_desc', 'seo_keyword', 'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_uid', 'category_uid');
        // product.category_uid → category.category_uid
    }
}
