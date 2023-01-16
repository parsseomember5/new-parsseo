<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Portfolio extends Model implements Viewable
{
    use Sluggable,InteractsWithViews, SoftDeletes;


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true,
                'onUpdate' => false,
                'includeTrashed' => true
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'portfolio_category_id',
        'locale',
        'translation_id',
        'title',
        'name',
        'slug',
        'short_description',
        'body',
        'image',
        'meta_description',
        'featured',
        'box1_title',
        'box1_value',
        'box2_title',
        'box2_value',
        'box3_title',
        'box3_value',
        'scroll_image',
        'website',
        'features',
        'description',
        'canonical',
        'order'
    ];

    protected $casts = [
        'image' => 'array',
        'scroll_image' => 'array',
        'features' => 'array',
    ];


    public function getImage($size = 'original'){
        if ($this->image == null || $this->image == ""){
            return asset('images/default.jpg');
        }
        return '/storage'.$this->image[$size];
    }
    public function getScrollImage($size = 'original'){
        if ($this->scroll_image == null || $this->scroll_image == ""){
            return asset('images/default.jpg');
        }
        return '/storage'.$this->scroll_image[$size];
    }

    public function getFeatures(){
        return explode(',',$this->features);
    }

    public function translation(){
        return $this->hasOne(Portfolio::class,'translation_id');
    }

    public function categories(){
        return $this->belongsToMany(PortfolioCategory::class,'portfolio_category','portfolio_id','category_id');
    }
}
