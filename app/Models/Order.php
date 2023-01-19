<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $hidden = ['res_number'];
    protected $with = ['items', 'user'];
    protected $casts = [
        'status' => 'boolean'
    ];

    const TERMINAL = [
        'zarinpal' => 'زرین پال',
        'wallet' => 'کیف پول'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->order_number = rand(100000000, 100000000-1);
        });
    }

    public function getRouteKeyName()
    {
        return 'order_number';
    }

    protected $fillable = [
        'user_id',
        'discount_id',
        'order_number',
        'status',
        'price',
        'terminal',
        'notes',
        'total_price',
        'res_number',
        'discount_price',
        'count'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
