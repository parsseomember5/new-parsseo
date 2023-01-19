<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    protected $guarded = [];
    protected $casts = ['spotplayer_license' => 'json'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function daysLeft()
    {
        return ($this->support_at >= now()) ? Carbon::parse()->diffInDays(Carbon::parse($this->support_at)) : 0;
    }
}
