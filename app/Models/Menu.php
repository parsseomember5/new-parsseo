<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'location',
        'locale'
    ];

    public function items(){
        return $this->hasMany(MenuItem::class)->orderByDesc('order');
    }
}
