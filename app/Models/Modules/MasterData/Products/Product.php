<?php

namespace App\Models\Modules\MasterData\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * This model represents a product in the master data.
 */
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
        'material' => 'boolean',
        'service' => 'boolean',
    ];
}
