<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'name',
        'locale',
        'translation_id',
        'title',
        'text',
        'stars',
        'image'
    ];

    public function getImage(){
        if ($this->image == null || $this->image == ""){
            return asset('admin/assets/img/avatars/1.png');
        }
        return '/storage'.$this->image;
    }

    public function translation(){
        return $this->hasOne(Feedback::class,'translation_id');
    }
}
