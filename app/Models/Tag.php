<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $guarded    = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function($query) {
            $query->slug = Str::slug($query->fa_title);
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function path(): string
    {
        return "/tags/$this->slug";
    }

    public function courses()
    {
        return $this->morphedByMany(Product::class, 'tag_able', 'tag_ables')->using(TagAble::class)->whereKind('course')->whereStatus(true);
    }

    public function files()
    {
        return $this->morphedByMany(Product::class, 'tag_able', 'tag_ables')->using(TagAble::class)->whereKind('file')->whereStatus(true);
    }

    public function articles()
    {
        return $this->morphedByMany(Post::class, 'tag_able', 'tag_ables')->using(TagAble::class)->whereStatus(true);
    }
}
