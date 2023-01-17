<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Chapter extends Model
{
    protected $guarded = [];
    const TYPE = [
        'free' => 'رایگان',
        'cash' => 'نقدی',
        'vip'  => 'ویژه'
    ];

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id')->whereStatus(true)->oldest('sort');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
