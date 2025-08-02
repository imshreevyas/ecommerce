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
        'product_name', 
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
        'is_featured',
        'dimension', 
        'seo_title', 
        'seo_desc', 
        'seo_keyword',
        'product_schema',
        'tags',
        'attributes',
        'canonical_url',
        'status',
        'published_at', 
        'created_by', 
        'updated_by'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_uid', 'category_uid');
    }
}
