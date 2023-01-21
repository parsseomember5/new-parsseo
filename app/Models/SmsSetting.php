<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsSetting extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'default',
        'kavenegar_token', 'kavenegar_pattern'
    ];

    const GATEWAYS = [
        'kavenegar' => 'کاوه نگار',
    ];
}
