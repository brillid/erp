<?php

namespace App\Models\MasterData\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'itemcode',
        'barcode',
        'name',
        'description',
        'sku',
        'purchase_price',
        'wholesale_price',
        'retail_price',
        'serial_number',
        'unit_of_measure',
        'tax_tariff',
        'product_group',
        'brand',
        'active',
        'material',
        'service',
    ];

    // Define the attributes that should be cast to native types
    protected $casts = [
        'active' => 'boolean',
        'material' => 'boolean',
        'service' => 'boolean',
    ];
}
