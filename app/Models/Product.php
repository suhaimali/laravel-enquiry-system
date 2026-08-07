<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';

    protected $fillable = [
        'product_code',
        'name',
        'category',
        'brand',
        'short_description',
        'description',
        'price',
        'discount',
        'final_price',
        'stock_quantity',
        'min_stock_level',
        'unit',
        'color',
        'size',
        'material',
        'weight',
        'status',
        'featured',
        'is_available',
        'created_by',
    ];
}
