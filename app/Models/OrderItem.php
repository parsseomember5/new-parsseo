<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $with = ['product'];
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'total_price',
        'discount_price',
        'count',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
