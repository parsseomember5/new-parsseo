<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $casts   = [
        'products' => 'array'
    ];

    const TYPE = [
        'noCapacity' => 'بدون ظرفیت',
        'Capacity'   => 'با ظرفیت'
    ];
}
