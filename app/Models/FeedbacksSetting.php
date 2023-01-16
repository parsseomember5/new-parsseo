<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbacksSetting extends Model
{
    protected $fillable = [
        'locale',
        'feedbacks_uptitle',
        'feedbacks_title',
        'feedbacks_count',
    ];
}
