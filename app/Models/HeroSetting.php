<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSetting extends Model
{
    protected $fillable = [
        'locale',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'hero_btn_text',
        'hero_btn_icon',
        'hero_btn_link',
        'hero_play_video_link',
        'hero_box_title',
        'hero_box_text',
        'hero_box_btn_text',
        'hero_box_btn_icon',
        'hero_box_btn_link',
    ];

    public function getHeroImage(){
        if ($this->hero_image == null || $this->hero_image == ""){
            return asset('assets/img/hero/hero-two-img.png');
        }
        return '/storage'.$this->hero_image;
    }
}
