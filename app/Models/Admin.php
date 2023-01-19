<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use SoftDeletes;

	protected $guard = "admin";

	protected $fillable = [
		'name',
        'email',
        'password',
        'mobile',
        'avatar',
        'bio',
        'instagram',
        'telegram',
        'twitter',
        'facebook',
        'linkedin',
        'dribbble'
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	public function getAvatar(){
		if ($this->avatar == null || $this->avatar == ""){
			return asset('admin/assets/img/avatars/1.png');
		}
		return '/storage'.$this->avatar;
	}

    public function posts(){
        return $this->hasMany(Post::class,'author_id');
    }

    public function ticketReplies(){
        return $this->hasMany(TicketReply::class);
    }

    public function products(){
        return $this->hasMany(Product::class,'author_id');
    }

    public function teacherProducts(){
        return $this->hasMany(Product::class,'admin_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
