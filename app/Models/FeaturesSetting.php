<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesSetting extends Model
{

   protected $fillable = [
       'locale',
       'features_uptitle',
       'features_title',
       'features_video_image',
       'features_video_link',
       'features_item1_title',
       'features_item1_text',
       'features_item1_icon',
       'features_item2_title',
       'features_item2_text',
       'features_item2_icon',
       'features_item3_title',
       'features_item3_text',
       'features_item3_icon',
       'features_text'
   ];

    public function getVideoImage(){
        if ($this->features_video_image == null || $this->features_video_image == ""){
            return asset('assets/img/video/02.jpg');
        }
        return '/storage'.$this->features_video_image;
    }
}
