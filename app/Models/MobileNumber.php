<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileNumber extends Model
{
    protected $fillable = [
        'user_id',
        'auth_code',
        'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
