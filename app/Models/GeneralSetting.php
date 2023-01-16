<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{

    protected $fillable = [
        'locale',
        'header_logo',
        'header_mobile_logo',
        'header_address',
        'header_email',
        'header_btn_text',
        'header_btn_icon',
        'header_btn_link',
        'twitter',
        'youtube',
        'instagram',
        'linkedin',
        'footer_logo',
        'footer_under_logo_text',
        'footer_list1_title',
        'footer_list2_title',
        'footer_list3_title',
        'footer_list4_title',
        'footer_phone',
        'footer_email',
        'footer_address',
        'footer_copyright',
        'footer_box_small_text',
        'footer_box_large_text',
        'footer_box_btn_text',
        'footer_box_btn_icon',
        'footer_box_btn_link',
        'footer_image',
        'home_canonical',
        'main_nav_title',
        'home_title',
        'home_h1',
        'home_meta_description',
        'call_button_number',
        'call_button_text',
        'whatsapp_button_number',
        'popup_title',
        'popup_description',
        'popup_image',
        'footer_logos',
        'footer_scripts',
    ];


    public function getHeaderLogo(){
        if ($this->header_logo == null || $this->header_logo == ""){
            return asset('assets/img/logo.png');
        }
        return '/storage'.$this->header_logo;
    }

    public function getHeaderMobileLogo(){
        if ($this->header_mobile_logo == null || $this->header_mobile_logo == ""){
            return asset('assets/img/logo-white.png');
        }
        return '/storage'.$this->header_mobile_logo;
    }


    public function getFooterLogo(){
        if ($this->footer_logo == null || $this->footer_logo == ""){
            return asset('assets/img/logo-white.png');
        }
        return '/storage'.$this->footer_logo;
    }

    public function getFooterImage(){
        if ($this->footer_image == null || $this->footer_image == ""){
            return asset('assets/img/footer-bg.jpg');
        }
        return '/storage'.$this->footer_image;
    }

    public function getPopupImage(){
        if ($this->popup_image == null || $this->popup_image == ""){
            return asset('assets/img/hero/hero-two-img2.png');
        }
        return '/storage'.$this->popup_image;
    }
}
