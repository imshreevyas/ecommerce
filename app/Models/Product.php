<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_uid', 
        'category_uid', 
        'title', 
        'slug', 
        'description', 
        'short_desc',
        'mrp', 
        'discount', 
        'selling_price', 
        'available_qty', 
        'sku',
        'thumbnail', 
        'gallery', 
        'seo_title', 
        'seo_desc', 
        'seo_keyword',
        'product_schema',
        'tags',
        'canonical_url',
        'status',
        'published_at', 
        'created_by', 
        'updated_by',
        'deleted_at'
    ];

    // In Product.php model
    protected $casts = [
        'gallery' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_uid', 'category_uid');
    }
}
