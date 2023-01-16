<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    protected $guarded = [];

    const POPUP_BY_TIME  = 1;
    const POPUP_BY_CLOSE = 2;
    const POPUP_BY_BOTH  = 3;

    const POPUP_IN_DESKTOP        = 1;
    const POPUP_IN_MOBILE         = 2;
    const POPUP_IN_BOTH_PLATFORMS = 3;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    const TYPE = [
        'link'       => 'لینک',
        'newsletter' => 'خبرنامه',
        'email'      => 'ارسال ایمیل',
    ];

}
