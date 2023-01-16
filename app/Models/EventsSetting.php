<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsSetting extends Model
{

    protected $fillable = [
        'locale',
        'event1_title',
        'event1_text',
        'event1_image',
        'event1_btn_text',
        'event1_btn_icon',
        'event1_btn_link',
        'event2_title',
        'event2_text',
        'event2_image',
        'event2_btn_text',
        'event2_btn_icon',
        'event2_btn_link',
    ];

    public function getEvent1Image(){
        if ($this->event1_image == null || $this->event1_image == ""){
            return asset('assets/img/cta/01.jpg');
        }
        return '/storage'.$this->event1_image;
    }
    public function getEvent2Image(){
        if ($this->event2_image == null || $this->event2_image == ""){
            return asset('assets/img/cta/02.jpg');
        }
        return '/storage'.$this->event2_image;
    }
}
