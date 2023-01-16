<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterBoxSetting extends Model
{

    protected $fillable = [
        'locale',
        'counter_box1_icon',
        'counter_box1_number',
        'counter_box1_title',
        'counter_box1_text',
        'counter_box2_icon',
        'counter_box2_number',
        'counter_box2_title',
        'counter_box2_text',
        'counter_box3_icon',
        'counter_box3_number',
        'counter_box3_title',
        'counter_box3_text',
        'counter_box4_icon',
        'counter_box4_number',
        'counter_box4_title',
        'counter_box4_text',
    ];
}
