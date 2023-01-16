<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingContactUs extends Model
{
    protected $fillable = [
        'locale',
        'page_title',
        'uptitle',
        'title',
        'description',
        'address',
        'support',
        'email',
        'map',
        'form_title',
        'form_description'
    ];
}
