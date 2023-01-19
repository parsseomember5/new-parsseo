<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap(Comment::MorphMap);

class Comment extends Model
{
    protected $with = ['replies', 'user'];

    protected $guarded = [];

    const MorphMap = [
        'products' => Product::class,
        'comments' => Comment::class,
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getType()
    {
        if ($this->commentable_type == 'articles') {
            return 'مقاله';
        }
        elseif ($this->commentable_type == 'products') {
            return 'محصولات';
        }
        elseif ($this->commentable_type == 'chapters') {
            return 'قسمت';
        }
        else {
            return 'پاسخ';
        }
    }

    public function getItem()
    {
        $parent = null;

        if ($this->commentable instanceof Comment) {
            $parent = Comment::where('id', $this->commentable_id)->first();
        }

        return $parent
            ? "<a href='".route('comments.edit', $this->commentable_id)."'>کامنت</a>"
            : $this->commentable->title;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies($checkStatus = true)
    {
        if ($checkStatus) {
            return $this->morphMany(Comment::class, 'commentable')->where('status', true);
        }


        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->hasMany(Commentlike::class);
    }

    public function getLikedByAuthUserAttribute(): array
    {
        $like = null;
        if (auth()->check()) {
            $like = $this->likes->where('user_id', auth()->user()->id)->first();
        }

        if ($like) {
            return [
                'status' => true,
                'type'   => $like->type,
            ];
        }
        return [
            'status' => false,
            'type'   => null,
        ];
    }
}
