<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Post extends Model implements Viewable
{
    use Sluggable, HasTags,InteractsWithViews, SoftDeletes;


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
        'locale',
        'translation_id',
        'author_id',
        'title',
        'excerpt',
        'body',
        'image',
        'slug',
        'meta_description',
        'canonical',
        'status',
        'featured',
        'order'
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

    public function categories(){
        return $this->belongsToMany(PostCategory::class,'post_category','post_id','category_id');
    }

    public function author(){
        return $this->belongsTo(Admin::class,'author_id');
    }

    public function translation(){
        return $this->hasOne(Post::class,'translation_id');
    }

    public function getRelatedPosts($count = 4){
        return $this->category->posts->where('id','!=',$this->id)
            ->where('status','published')->take($count);
    }

}
