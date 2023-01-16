<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
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

}
