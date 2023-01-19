<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use MannikJ\Laravel\Wallet\Traits\HasWallet;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasWallet, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function getAvatar(){
        if ($this->avatar == null || $this->avatar == ""){
            return asset('admin/assets/img/avatars/1.png');
        }
        return '/storage'.$this->avatar;
    }

    public function learnings(){
        return $this->hasMany(Learning::class);
    }

    public function mobileToken()
    {
        return $this->hasOne(MobileNumber::class);
    }

    public function payments(){
        return $this->hasMany(UserPayment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function isLearning($product)
    {
        return !!Learning::where('product_id', $product->id)->where('user_id', $this->id)->first();
    }

    public function IsPhoneVerified()
    {
        return !is_null($this->phone_verified_at) ? true : false;
    }
}
