<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{

    protected $fillable = [
        'locale',
        'about_image',
        'about2_image',
        'about3_image',
        'about_video_image',
        'about_video_link',
        'about_uptitle',
        'about_title',
        'about_text',
        'about_btn_text',
        'about_btn_icon',
        'about_btn_link',
        'about_item1_title',
        'about_item1_text',
        'about_item2_title',
        'about_item2_text',
        'about_item3_title',
        'about_item3_text',
        'about2_uptitle',
        'about2_title',
        'about2_text',
        'about2_btn_text',
        'about2_btn_icon',
        'about2_btn_link',
        'about2_item1_title',
        'about2_item1_text',
        'about2_item2_title',
        'about2_item2_text',
        'about2_item3_title',
        'about2_item3_text',
        'about3_uptitle',
        'about3_title',
        'about3_text',
        'about3_btn_text',
        'about3_btn_icon',
        'about3_btn_link',
        'about3_item1_title',
        'about3_item1_text',
        'about3_item2_title',
        'about3_item2_text',
        'about3_item3_title',
        'about3_item3_text',
    ];

    public function getImage(){
        if ($this->about_image == null || $this->about_image == ""){
            return asset('assets/img/hero/hero-two-img2.png');
        }
        return '/storage'.$this->about_image;
    }
    public function getImage2(){
        if ($this->about2_image == null || $this->about2_image == ""){
            return asset('assets/img/hero/hero-two-img1.png');
        }
        return '/storage'.$this->about2_image;
    }

    public function getImage3(){
        if ($this->about3_image == null || $this->about3_image == ""){
            return asset('assets/img/hero/hero-two-img.png');
        }
        return '/storage'.$this->about3_image;
    }
    public function getVideoImage(){
        if ($this->about_video_image == null || $this->about_video_image == ""){
            return asset('assets/img/video/about-video.jpg');
        }
        return '/storage'.$this->about_video_image;
    }
}
