<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $casts = ['status' => 'boolean'];
    protected $fillable = [
        'user_id',
        'order_id',
        'wallet_transaction_id',
        'amount',
        'status',
        'ref_id',
        'gateway'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
