<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use Sluggable;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'image',
        'slug',
        'featured',
        'meta_description',
        'description',
        'canonical'
    ];

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

    public function getImage(){
        if ($this->image){
            return '/storage' . $this->image;
        }
        return asset('images/default.jpg');
    }

    public function posts(){
        return $this->belongsToMany(Post::class,'post_category','category_id','post_id');
    }
}
