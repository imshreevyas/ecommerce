<?php

namespace App\Services;

class SchemaGenerator
{
    public static function product($product)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->title,
            'image' => [$product->thumbnail],
            'description' => $product->short_desc,
            'sku' => $product->sku,
            'brand' => [
                '@type' => 'Brand',
                'name' => $product->brand->name ?? 'Brand'
            ],
            'offers' => [
                '@type' => 'Offer',
                'priceCurrency' => 'USD',
                'price' => $product->selling_price,
                'availability' => 'https://schema.org/InStock',
                'url' => route('product.show', $product->slug)
            ]
        ];
    }

    public static function breadcrumb(array $items)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array_map(function ($item, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['name'],
                    'item' => $item['url']
                ];
            }, $items, array_keys($items))
        ];
    }
}
