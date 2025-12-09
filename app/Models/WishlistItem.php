<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WishlistItem extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'variant_id',
        'flavor',
        'weight'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function variant(){
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
