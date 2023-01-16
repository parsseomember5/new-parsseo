<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingWebdesign extends Model
{
    protected $table = 'landing_webdesign';

    protected $fillable =[
        'locale',
        'nav_title',
        'h1_hidden',
        'cta_image',
        'cta_uptitle',
        'cta_title',
        'cta_text',
        'cta_btn1_text',
        'cta_btn1_icon',
        'cta_btn1_link',
        'cta_btn2_text',
        'cta_btn2_icon',
        'cta_btn2_link',
        'video',
        'video_poster',
        'faq_title',
        'faq',
        'summary',
        'details',
        'article_btn_text',
        'article_btn_icon',
        'article_btn_link',
    ];

    protected $casts =[
        'faq' => 'array'
    ];


    public function getCtaImage(){
        if ($this->cta_image == null || $this->cta_image == ""){
            return asset('assets/img/seo_landing.png');
        }
        return '/storage'.$this->cta_image;
    }

    public function getVideo(){
        if ($this->video == null || $this->video == ""){
            return "no video file";
        }
        return '/storage'.$this->video;
    }

    public function getVideoPoster(){
        if ($this->video_poster == null || $this->video_poster == ""){
            return asset('assets/img/video/02.jpg');
        }
        return '/storage'.$this->video_poster;
    }
}
