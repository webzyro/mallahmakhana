<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'flavor',
        'weight',
        'original_price',
        'discounted_price',
        'stock',
        'is_default'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
