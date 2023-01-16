<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = [
        'title',
        'link',
        'url',
        'order'
    ];


    public function getImage(){
        if ($this->url){
            return '/storage' . $this->url;
        }
        return asset('assets/img/partners/01.png');
    }
}
