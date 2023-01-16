<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingAboutUs extends Model
{
    protected $fillable = [
        'locale',
        'page_title',
        'uptitle',
        'title',
        'description',
        'items',
        'image',
        'features_uptitle',
        'features_title',
        'features_box1_icon',
        'features_box1_title',
        'features_box1_text',
        'features_box2_icon',
        'features_box2_title',
        'features_box2_text',
        'features_box3_icon',
        'features_box3_title',
        'features_box3_text',
        'team_uptitle',
        'team_title',
        'feedback_uptitle',
        'feedback_title',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function getImage(){
        if ($this->image == null || $this->image == ""){
            return asset('assets/img/about/about-one.jpg');
        }
        return '/storage'.$this->image;
    }

    public function getItems(){
        return explode(',',$this->items);
    }
}
