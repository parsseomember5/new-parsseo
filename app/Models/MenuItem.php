<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'title',
        'link',
        'menu_id',
        'parent_id',
        'order'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }

    public function parent(){
        return $this->belongsTo(MenuItem::class,'parent_id');
    }

    public function items(){
        return $this->hasMany(MenuItem::class,'parent_id');
    }
}
