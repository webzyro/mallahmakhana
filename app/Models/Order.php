<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'pincode',
        'total_amount',
        'status',
        'payment_method',
        'payment_status'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function booted()
    {
        static::created(function ($order) {
            $order->order_number = '#1000' . $order->id;  
            $order->save();
        });
    }
}
