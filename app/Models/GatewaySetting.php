<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GatewaySetting extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'description',
        'default_gateway',
        'zarinpal_merchant'
    ];

    const GATEWAYS = [
      'zarinpal' => 'زرین پال'
    ];

}
