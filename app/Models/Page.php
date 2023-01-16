<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model implements Viewable
{
    use InteractsWithViews, Sluggable ,SoftDeletes;

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
        'title',
        'slug',
        'image',
        'body',
        'status',
        'video_link',
        'meta_description',
        'canonical'
    ];

    protected $casts = [
        'image' => 'array'
    ];

    public function getImage($size = 'original'){

        if ($this->image == null || $this->image == ""){
            return asset('images/default.jpg');
        }
        return '/storage'.$this->image[$size];
    }
}
