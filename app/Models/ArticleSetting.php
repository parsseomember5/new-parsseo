<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSetting extends Model
{
    protected $fillable = [
        'locale',
        'articles_uptitle',
        'articles_title',
        'articles_count'
    ];
}
